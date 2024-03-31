<!-- resources/views/posts/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Promotions</h1>
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div id="carouselExampleIndicators{{ $post->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach (explode(',', $post->image) as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/images/' . trim($image)) }}" class="d-block w-100" alt="Post Image">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{ $post->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{ $post->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->product_name }}</h5>
                            <p class="card-text">{{ $post->message_text }}</p>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
