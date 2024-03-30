@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', ['id' => $product->id_product]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}">
                        </div>

                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <textarea name="product_description" id="product_description" class="form-control">{{ $product->product_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="product_price">Product Price</label>
                            <input type="text" name="product_price" id="product_price" class="form-control" value="{{ $product->product_price }}">
                        </div>

                        <div class="form-group">
                            <label for="product_images">Product Images</label>
                            <input id="product_images" type="file" class="form-control @error('product_images.*') is-invalid @enderror" name="product_images[]" accept="image/*" multiple autocomplete="product_images">
                            @error('product_images.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
