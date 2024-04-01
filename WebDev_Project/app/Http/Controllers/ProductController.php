<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->get();
        return view('CRUDproduct', compact('products'));
    }


    public function destroy($id_product)
    {
        $product = Product::findOrFail($id_product);

        // Delete the product
        $product->delete();

        return redirect('/CRUDproductIndex')->with('status', 'Product deleted successfully!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        // Handle selected images
        if ($request->hasFile('product_images')) {
            $productImages = [];
            foreach ($request->file('product_images') as $image) {
                // Move each image to the public/images directory
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('storage/images'), $imageName);
                $productImages[] = $imageName;
            }
            // Store the list of image filenames as a comma-separated string
            $product->product_image = implode(',', $productImages);
        }

        // Update other fields
        $product->update($request->except('product_images'));

        return redirect('/CRUDproductIndex')->with('status', 'Product updated successfully.');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image files
        ]);

        // Create a new product instance
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;

        // Handle selected images
        if ($request->hasFile('product_images')) {
            $productImages = [];
            foreach ($request->file('product_images') as $image) {
                // Move each image to the public/images directory
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('storage/images'), $imageName);
                $productImages[] = $imageName;
            }
            // Store the list of image filenames as a comma-separated string
            $product->product_image = implode(',', $productImages);
        }

        // Save the product
        $product->save();

        // Create a record in the stocks table with stockQuantity of 50 for the newly created product
        \App\Models\Stock::create([
            'id_product' => $product->id_product,
            'stockQuantity' => 50,
        ]);

        // Redirect back to the index page with a success message
        return redirect('/CRUDproductIndex')->with('status', 'Product created successfully.');
    }

    public function indexOrder()
    {
        $products = Product::all();

        return view('home', ['products'=>$products]);
    }

    public function restore($id_product)
    {
        $products = Product::withTrashed()->where('id_product', $id_product)->first();
        $products->restore();
        return redirect()->route('products')->with('success', 'Product restored successfully.');
    }

}
