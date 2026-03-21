<?php

namespace App\Http\Controllers;
use App\Events\MessageEvent;
use App\Events\StockEvent;
use App\Models\AdminMessage;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Controller that handles displaying product listings, filtering, and individual product details.
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $terms = explode(' ', $search);

            $query->where(function($q) use ($terms) {
                foreach ($terms as $term) {
                    $term = trim($term);
                    if (!empty($term)) {
                        $q->where(function($subQ) use ($term) {
                            $subQ->where('product_name', 'like', "%{$term}%")
                                 ->orWhere('description', 'like', "%{$term}%")
                                 ->orWhere('brand', 'like', "%{$term}%")
                                 ->orWhereHas('category', function($catQ) use ($term) {
                                     $catQ->where('category_name', 'like', "%{$term}%");
                                 });
                        });
                    }
                }
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('category_name', $request->input('category'));
            });
        }

        // Pet Type Filter
        if ($request->filled('pet_type')) {
            $query->where('pet_type', $request->input('pet_type'));
        }

        // Price Filter
        if ($request->filled('price_range')) {
            switch ($request->input('price_range')) {
                case 'low':
                    $query->whereBetween('price', [5, 10]);
                    break;
                case 'medium':
                    $query->whereBetween('price', [10, 20]);
                    break;
                case 'high':
                    $query->where('price', '>', 20);
                    break;
            }
        }

        $products = $query->where('is_active', 1)->paginate(12)->withQueryString();
        $categories = \App\Models\Category::all();
        $petTypes = Product::select('pet_type')->distinct()->whereNotNull('pet_type')->pluck('pet_type');

        return view("shoplisting", compact('products', 'categories', 'petTypes'));
    }





    /**
     * Display the specified resource.
     */
    public function showProductsUnderCategory(int $category_id)
    {
        $productsOfCategory = Product::where('category_id',$category_id)->paginate($perPage = 15, $columns = ['product_name','description','price','image_url','pet_type','brand'], $pageName = 'products_of_category');

        return view("products_category",['productsOfCategory' => $productsOfCategory]);
    }




    public function show($id)
    {
        $product = Product::with('reviews.user')->findOrFail($id);
        return view("product_details", compact('product'));
    }

    public function home()
    {
        $featuredProducts = Product::where('is_active', 1)->inRandomOrder()->take(6)->get();
        $categories = \App\Models\Category::all();
        return view('homepage', compact('featuredProducts', 'categories'));
    }


    //admin functionality goes here

    public function index_admin(Request $request){
        $query = Product::query()->with("category");

        if($request->filled('search')){
            $search = $request->input('search');
           $query->where("product_name", "like", "%{$search}%")
           ->orWhere("brand", "like", "%{$search}%");
        }
        if($request->filled('category')){
          $query->where("category_id","=", request()->input('category'));
        }
        if($request->filled("stock_status"))
        {
            if($request->input('stock_status') === "low")
            {
                $query->whereBetween("stock_quantity",[1,10]);
            }
            elseif($request->input('stock_status') === "out")
            {
                $query->where("stock_quantity","=",0);
            }
        }

        $products = $query->paginate(15);
        $categories = Category::all();


        return view("admin.inventory.index", compact('products','categories'));
    }

    public function edit_product($id){
        try {
            $product = Product::findOrFail($id);
            return view("admin.inventory.edit", compact('product'));
        }
        catch (\Exception $exception){

            return redirect()->route("allInventory")->with("error", "an error occurred during processing");
        }
    }
    public function update_product(Request $request){

        try {
            DB::transaction(function () use ($request) {
                $product = DB::table('products')->where('product_id', $request->product_id)->lockForUpdate()->first();
                if ($product) {
                    $request->validate([
                     "product_name" => "required|string|max:150",
                     "description" => "required|string",
                     "price" => "required|numeric",
                     "stock_quantity" => "required|integer",
                     "image_url" => "nullable|url",
                     "brand" => "required|string|max:100",
                     "pet_type" => "required|string|max:60",
                     "is_active" => "required|int",


                    ]);

                    $productId = $request->input('product_id');
                    DB::table('products')->where('product_id', "=", $productId)->update([
                        'product_name' => $request->input('product_name'),
                        'description' => $request->input('description'),
                        'price' => $request->input('price'),
                        'stock_quantity' => $request->input('stock_quantity'),
                        'image_url' => $request->input('image_url'),
                        'brand' => $request->input('brand'),
                        'pet_type' => $request->input('pet_type'),
                        'is_active' => $request->input('is_active'),


                    ]);

                    if($request->input("stock_quantity") <= 10 && $product->stock_quantity > 10){
                        $noOutOfStock = DB::table('products')->where("stock_quantity", "=", 0)->count();
                        $noOfLowStock = DB::table('products')->whereBetween('stock_quantity', [1, 10])->count();
                        event(new StockEvent($noOfLowStock,$noOutOfStock));
                    }
                    elseif($request->input("stock_quantity") > 10 && $product->stock_quantity <= 10){
                        $noOutOfStock = DB::table('products')->where("stock_quantity", "=", 0)->count();
                        $noOfLowStock = DB::table('products')->whereBetween('stock_quantity', [1, 10])->count();
                        event(new StockEvent($noOfLowStock,$noOutOfStock));
                    }


                } else
                    throw new \Exception("Product does not exist");
            });
            return redirect()->route("allInventory")->with('success', "successfully updated product");
        } catch (\Throwable $e) {
            return redirect()->route("allInventory")->with("error", "sorry an error occurred");
        }

    }
}
