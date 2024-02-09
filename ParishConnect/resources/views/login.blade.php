@extends('layout')
@section('title', 'Login')
@section('styles')
  <style>
    body {
      background-image: url('/images/PC.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .login-box {
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      padding: 20px; /* Add padding to create space between the content and the box */
      border-radius: 10px; /* Rounded corners */
    }
  </style>
@endsection
@section('content')
    <div class="container">
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <div class="login-box mx-auto mt-3" style="max-width: 500px;">
            <form action="{{route('login.post')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
