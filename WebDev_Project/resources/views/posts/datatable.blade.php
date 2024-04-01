@extends('layouts.master')
@section('content')
    <div class="row">

        <div class="container">
            <h2>Post List</h2>
            <div>
                <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Create Post</a>
            </div>
            {{$dataTable->table()}}
        </div>
    </div>
    {{$dataTable->scripts()}}
@endsection
