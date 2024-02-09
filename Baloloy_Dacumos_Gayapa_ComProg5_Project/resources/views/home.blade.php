@extends('layout')

@section('title', 'Home Page')

@section('header', 'Welcome to My Website')

@section('content')
    <p>This is the home page content.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit....</p>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
</head>
<body>
    <h1>Product Form</h1>

    <!-- Display any success or error messages here -->
    @if(session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <!-- Product Form -->
    <form method="post" action="{{ url('/submit-product') }}">
        @csrf
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" id="product_name" required>

        <br>

        <label for="product_price">Product Price:</label>
        <input type="number" name="product_price" id="product_price" step="0.01" required>

        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>