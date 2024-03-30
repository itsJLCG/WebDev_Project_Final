@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <textarea name="product_description" id="product_description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="product_price">Product Price</label>
                            <input type="text" name="product_price" id="product_price" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="product_images">Product Images</label>
                            <input id="product_images" type="file" class="form-control" name="product_images[]" accept="image/*" multiple required>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
