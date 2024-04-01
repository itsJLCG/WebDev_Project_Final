<!-- resources/views/orders.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    <h1>Orders</h1>

    @if ($orders->isEmpty())
        <p>No orders found.</p>
    @else
        <ul>
            @foreach ($orders as $order)
                <li>
                    Order ID: {{ $order->id_order }} |
                    User ID: {{ $order->id_user }} |
                    Order Detail ID: {{ $order->id_orderDetail }} |
                    Product ID: {{ $order->id_product }} |
                    Order Quantity: {{ $order->orderQuantity }} |
                    Payment ID: {{ $order->id_payment }} |
                    Tracking ID: {{ $order->id_tracking }} |
                    Tracking Status: {{ $order->trackingStatus }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
