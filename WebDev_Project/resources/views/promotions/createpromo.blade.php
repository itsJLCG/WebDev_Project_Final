@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Add Promo</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Promotions') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Message</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id}}</td>
                                <td>{{ $post->product_name }}</td>
                                <td>{{ $post->message_text }}</td>
                                <td>{{ $post->image }}</td>
                                <td>
                                    @if ($post->image)
                                        @foreach (explode(',', $post->image) as $image)
                                            <img src="{{ asset('storage/images/' . trim($image)) }}" alt="Post Image" style="max-width: 100px; margin-right: 5px;">
                                        @endforeach
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    @if($post->deleted_at == null)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @else
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('posts.restore', $post->id) }}" method="GET">
                                        @csrf

                                        <button type="submit" class="btn btn-primary">Restore</button>
                                    </form>
                                    @endif
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
