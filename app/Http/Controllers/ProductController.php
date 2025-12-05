<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        $product = Product::findOrFail($id);
        return view("product_details", compact('product'));
    }

    public function home()
    {
        $featuredProducts = Product::where('is_active', 1)->inRandomOrder()->take(3)->get();
        $categories = \App\Models\Category::take(3)->get(); // Taking 3 to match the design layout
        return view('homepage', compact('featuredProducts', 'categories'));
    }
}
