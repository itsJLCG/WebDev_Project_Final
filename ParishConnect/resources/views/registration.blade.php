@extends('layout')
@section('styles')
  <style>
    body {
      background-image: url('/images/output-onlinepngtools_lr.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .registration-box {
      background-color: #ffffff; /* White background */
      padding: 20px; /* Add padding to create space between the content and the container */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
    }
  </style>
@endsection
@section('title', 'Registration')
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
        <div class="registration-box mx-auto mt-3" style="width: 500px;">
            <div class="header">
                <img src="images/ParishConnectLogo.png">
                <h1>ParishConnect</h1>
            </div>
            <form action="{{route('registration.post')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
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
