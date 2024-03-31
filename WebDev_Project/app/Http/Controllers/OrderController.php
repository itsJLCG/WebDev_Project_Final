<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Import the Cart model
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Find if there is an existing cart entry for the user and product
        $existingCart = Cart::where('id_user', auth()->user()->id)
                            ->where('id_product', $request->product_id)
                            ->first();

        if ($existingCart) {
            // Update the order quantity if the cart entry already exists
            $existingCart->update([
                'orderQuantity' => $existingCart->orderQuantity + $request->orderQuantity,
            ]);
        } else {
            // Insert a new cart entry if it doesn't already exist
            Cart::create([
                'id_user' => auth()->user()->id,
                'id_product' => $request->product_id,
                'orderQuantity' => $request->orderQuantity,
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    public function storeAll(Request $request)
{
    // Initialize an array to store valid order quantities
    $validOrders = [];

    // Loop through each product submitted for ordering
    foreach ($request->products as $productId => $product) {
        // Check if order quantity is greater than 0
        if ($product['orderQuantity'] > 0) {
            // Add the product ID and order quantity to the validOrders array
            $validOrders[$productId] = $product['orderQuantity'];
        }
    }

    // Loop through valid orders and process them
    foreach ($validOrders as $productId => $orderQuantity) {
        // Find if there is an existing cart entry for the user and product
        $existingCart = Cart::where('id_user', auth()->user()->id)
                            ->where('id_product', $productId)
                            ->first();

        if ($existingCart) {
            // Update the order quantity if the cart entry already exists
            $existingCart->update([
                'orderQuantity' => $existingCart->orderQuantity + $orderQuantity,
            ]);
        } else {
            // Insert a new cart entry if it doesn't already exist
            Cart::create([
                'id_user' => auth()->user()->id,
                'id_product' => $productId,
                'orderQuantity' => $orderQuantity,
            ]);
        }
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Orders placed successfully!');
}

    public function showCart()
    {
        $user = auth()->user();
        $cartItems = Cart::with('product')->where('id_user', $user->id)->get();
        return view('cart', compact('cartItems'));
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $newOrderQuantity = $request->orderQuantity;

        // Check if the new order quantity exceeds the available stock quantity
        if ($newOrderQuantity <= $cartItem->product->stock->stockQuantity) {
            $cartItem->update([
                'orderQuantity' => $newOrderQuantity
            ]);
            return redirect()->route('cart.show')->with('success', 'Order quantity updated successfully.');
        } else {
            // Return back with a notification if the order quantity exceeds the available stock
            return redirect()->back()->with('error', 'Order quantity exceeds available stock.');
        }
    }


    // Delete item from cart
    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return redirect()->route('cart.show')->with('success', 'Item removed from cart successfully.');
    }

    public function index()
    {
        $products = Product::with('stock')->get();
        return view('home', compact('products'));
    }

}
