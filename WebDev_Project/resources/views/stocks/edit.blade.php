@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Stock') }}</div>
                <div class="card-body">
                    <form action="{{ route('stocks.update', $stock->id_stock) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Form fields for editing stock details -->
                        <div class="form-group">
                            <label for="stockQuantity">Stock Quantity:</label>
                            <input type="number" name="stockQuantity" id="stockQuantity" class="form-control" value="{{ $stock->stockQuantity }}">
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Update Stock</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
