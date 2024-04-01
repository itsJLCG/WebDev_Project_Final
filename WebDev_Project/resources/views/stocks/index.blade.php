<!-- resources/views/stocks/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Stocks</div>
                <div class="card-body">
                    <!-- Add button for displaying bar graph -->
                    <div class="mb-3">
                        <a href="{{ route('stocks.graph') }}" class="btn btn-success">View Stock Graph</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                            <tr>
                                <td>{{ $stock->id_stock }}</td>
                                <td>{{ $stock->product->product_name }}</td>
                                <td>{{ $stock->product->product_description }}</td>
                                <td>{{ $stock->product->product_price }}</td>
                                <td>{{ $stock->stockQuantity }}</td>
                                <td>
                                    <a href="{{ route('stocks.edit', $stock->id_stock) }}" class="btn btn-primary">Edit</a>
                                    <!-- Add delete button if needed -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
