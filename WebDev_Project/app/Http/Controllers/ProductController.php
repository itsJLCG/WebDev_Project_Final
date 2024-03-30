<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function index() {

        return view('index');
    }

    public function store(Request $request)
    {

        $productId = $request->id;

        $product   =   Product::updateOrCreate(
                    [
                     'id_product' => $productId
                    ],
                    [
                    'product_name' => $request->product_name,
                    'product_description' => $request->product_description,
                    'product_price' => $request->product_price,
                    'product_image' => $request->product_image
                    ]);

        return Response()->json($product);
    }

}
