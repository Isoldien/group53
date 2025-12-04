<?php

namespace App\Http\Controllers;

use stdClass;

class ProductController extends Controller
{
    public function show()
    {
        // 🔹 Fake product data just for testing UI
        $product           = new stdClass();
        $product->name     = 'Test Product';
        $product->price    = 19.99;
        $product->image_path = 'images/placeholder1.png';
        $product->short_description = 'This is a short test description for the product.';
        $product->description       = 'This is a longer test description to show in the FULL DESCRIPTION section.';
        $product->highlights        = ['Feature 1', 'Feature 2', 'Feature 3'];
        $product->stock             = 5;

        // 🔹 Fake reviews – you can remove or adjust later
        $review1              = new stdClass();
        $review1->user_name   = 'Lulu';
        $review1->rating      = 5;
        $review1->title       = 'Amazing!';
        $review1->body        = 'My dog absolutely loves this.';
        $review1->created_at  = now();

        $reviews = [$review1];

        return view('product_detail', [
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }
}
