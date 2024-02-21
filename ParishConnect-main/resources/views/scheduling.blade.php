@extends('layout')
@section('title', "Scheduling")
@section('styles')
    <style>
        .registration-box {
      background-color: #ffffff; /* White background */
      padding: 20px; /* Add padding to create space between the content and the container */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
    }
    </style>
@endsection
@section('content')
<div class="container">
        <div class="mt-5for">
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
        <div class="registration-box mx-auto mt-3" style="width: 1000px;">
            <div class="header">
                <h1>Schedule Form</h1>
            </div>
            <form action="{{route('schedule.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="event_name">Event Name</label>
                    <input type="text" name="event_name" id="event_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="event_host">Event Host</label>
                    <input type="text" name="event_host" id="event_host" class="form-control" required>                            
                </div>
                <div class="mb-3">
                    <label for="description">Event Description</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>                           
                </div>
                <div class="mb-3">
                    <label for="event_datetime">Event Date and Time</label>
                    <input type="datetime-local" name="event_datetime" id="event_datetime" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
@endsection