@extends('layouts.master')
@section('content')
    <div class="row">

        <div class="container">
            <h2>Product Creation</h2>
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Create User</a>
            </div>
            {{$dataTable->table()}}
        </div>
    </div>
    {{$dataTable->scripts()}}
@endsection
