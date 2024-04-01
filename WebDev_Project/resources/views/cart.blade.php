@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cart</h1>

    <!-- Display success message if present in the session -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display error message if present in the session -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(isset($message))
        <p>{{ $message }}</p>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Order Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->id_product }}</td>
                    <td>{{ $cartItem->product->product_name }}</td>
                    <td>{{ $cartItem->product->product_price }}</td>
                    <td>
                        <!-- Input box for editing order quantity -->
                        <form action="{{ route('cart.update', $cartItem->id_cart) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="orderQuantity" value="{{ $cartItem->orderQuantity }}" min="1">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </td>
                    @php
                        $subtotal = $cartItem->product->product_price * $cartItem->orderQuantity;
                        $total += $subtotal;
                    @endphp
                    <td>{{ $subtotal }}</td>
                    <td>
                        <!-- Delete action form -->
                        <form action="{{ route('cart.delete', $cartItem->id_cart) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12 offset-md-10">
            @if ($total > 0)
                <p style="color: red; font-weight: bold;"><strong>Total:</strong> {{ $total }}</p>
            @else
                <p>No items in the cart</p>
            @endif
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        </div>
    </div>
</div>
@endsection
