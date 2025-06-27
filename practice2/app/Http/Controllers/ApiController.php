<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ApiController extends Controller
{
    public function getProduct(Request $request, $gtin)
    {
        $product = Product::where('gtin', $gtin)->first();
        if($product === null){
            return response()->json([
                'success' => false,
                'error' => 'Product not found'
            ], 404);
        }
        if($product->product_images!==null && isset($product->product_images[0]))
            $product->show_image = $product->product_images[0]->image_url;
        else
            $product->show_image = "default.png";

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }
}
