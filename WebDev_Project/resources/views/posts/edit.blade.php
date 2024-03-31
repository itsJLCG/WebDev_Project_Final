@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $post->product_name }}">
                        </div>

                        <div class="form-group">
                            <label for="message_text">Message</label>
                            <textarea name="message_text" id="message_text" class="form-control">{{ $post->message_text }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="images">Post Images</label>
                            <input id="images" type="file" class="form-control @error('images.*') is-invalid @enderror" name="images[]" accept="image/*" multiple autocomplete="images">
                            @error('images.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
