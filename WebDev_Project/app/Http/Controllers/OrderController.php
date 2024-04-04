<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Import the Cart model
use App\Models\Product;
use App\Models\Order;
use App\Models\Stock;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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

    public function checkout(Request $request)
{
    $userId = Auth::id();
    $userEmail = Auth::user()->email;

    // Fetch cart items for the user
    $cartItems = Cart::where('id_user', $userId)->get();

    // Check if order quantities exceed stock quantities
    foreach ($cartItems as $cartItem) {
        $stock = Stock::where('id_product', $cartItem->id_product)->first();

        if (!$stock || $cartItem->orderQuantity > $stock->stockQuantity) {
            // If stock not found or order quantity exceeds stock quantity, return with a message
            return redirect()->route('cart.show')->with('message', 'Order quantity exceeds our stock for product: ' . $cartItem->id_product);
        }
    }

    // Create a new order if all stock checks pass
    $order = new Order();
    $order->id_user = $userId;
    $order->save();

    // Retrieve the generated id_order
    $orderId = $order->id_order;

    // Proceed with creating order details and updating stock
    foreach ($cartItems as $cartItem) {
        // Create order detail
        $orderDetail = new OrderDetail();
        $orderDetail->id_order = $orderId;
        $orderDetail->id_product = $cartItem->id_product;
        $orderDetail->orderQuantity = $cartItem->orderQuantity;
        $orderDetail->save();

        // Update stock quantity
        $stock->stockQuantity -= $cartItem->orderQuantity;
        $stock->save();
    }

    $orderDetailId = $orderDetail->id;

    // Create Payment record and associate it with the OrderDetail
    $payment = new Payment();
    $payment->id_orderDetail = $orderDetailId;
    $payment->save();

    $paymentID = $payment->id;

    $tracking = new Tracking();
    $tracking->id_payment = $paymentID; // Assuming the foreign key in Tracking model for Payment ID is payment_id
    $tracking->trackingStatus = "To Pack"; // Default tracking status
    $tracking->save();

    // Clear the cart after successful checkout
    Cart::where('id_user', $userId)->delete();

    Mail::send('emails.orderCreated', [], function($message) use ($userEmail) {
        $message->to($userEmail)->subject('Order Created Subject');
    });

    // Redirect to cart page after successful checkout
    return redirect()->route('cart.show')->with('message', 'Order placed successfully!');
}


public function showOrders()
{
    // Get the ID of the logged-in user
    $userId = Auth::id();

    // Fetch orders associated with the logged-in user along with their details
    $orders = Order::select(
        'orders.id_order',
        'orders.id_user',
        'orderDetails.id_orderDetail',
        'orderDetails.id_product',
        'orderDetails.orderQuantity',
        'payments.id_payment',
        'trackings.id_tracking',
        'trackings.trackingStatus'
    )
    ->join('orderDetails', 'orders.id_order', '=', 'orderDetails.id_order')
    ->join('payments', 'orderDetails.id_orderDetail', '=', 'payments.id_orderDetail')
    ->join('trackings', 'payments.id_payment', '=', 'trackings.id_payment')
    ->where('orders.id_user', $userId)
    ->get();

    // Store id_tracking in session
    $idTracking = $orders->pluck('id_tracking')->first(); // Assuming there is only one tracking ID per order
    session(['id_tracking' => $idTracking]);

    // Pass the orders data to the view
    return view('orders', compact('orders'));
}

public function showChart()
{
    $orders = DB::table('orderDetails')
                ->join('products', 'orderDetails.id_product', '=', 'products.id_product')
                ->select('products.product_name', DB::raw('SUM(orderDetails.OrderQuantity) as total_quantity'))
                ->groupBy('products.product_name')
                ->get();

    $labels = $orders->pluck('product_name');
    $quantities = $orders->pluck('total_quantity');

    return view('orders.graph', compact('labels', 'quantities'));
}

}
