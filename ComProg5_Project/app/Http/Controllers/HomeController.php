<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function createProduct()
    {
        $product = new Product();
        $product->Product_Name = 'Sample Product';
        $product->Product_Price = 19.99;
        $product->save();

        return "Product created successfully!";
    }

    public function submitProduct(Request $request)
    {
        $product = new Product();
        $product->Product_Name = $request->input('product_name');
        $product->Product_Price = $request->input('product_price');
        $product->save();

        return redirect('/')->with('status', 'Product created successfully!');
    }
}
