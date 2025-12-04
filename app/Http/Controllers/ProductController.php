<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate($perPage = 15, $columns = ['product_name','description','price','image_url','pet_type','brand'], $pageName = 'products_all');

        return view("shoplisting");
    }

   

   

    /**
     * Display the specified resource.
     */
    public function showProductsUnderCategory(int $category_id)
    {
        $productsOfCategory = Product::where('category_id',$category_id)->paginate($perPage = 15, $columns = ['product_name','description','price','image_url','pet_type','brand'], $pageName = 'products_of_category');

        return view("products_category",['productsOfCategory' => $productsOfCategory]);
    }



    
    public function showProductDetails(Product $product){

        return view("product_detail",['product' => $product]);
    }
   
}
