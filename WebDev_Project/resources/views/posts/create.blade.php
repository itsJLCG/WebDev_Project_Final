@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="message_text">Message</label>
                            <textarea name="message_text" id="message_text" class="form-control" required></textarea>
                        </div>


                        <div class="form-group">
                            <label for="images">Images</label>
                            <input id="images" type="file" class="form-control" name="images[]" accept="image/*" multiple required>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
