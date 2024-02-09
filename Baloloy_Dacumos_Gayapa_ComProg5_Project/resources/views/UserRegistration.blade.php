@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>User Registration</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-3">
                <label for="FirstName">First Name:</label>
                <input type="text" class="form-control" name="FirstName" required>
            </div>

            <div class="form-group mt-3">
                <label for="LastName">Last Name:</label>
                <input type="text" class="form-control" name="LastName" required>
            </div>

            <div class="form-group mt-3">
                <label for="Address">Address:</label>
                <input type="text" class="form-control" name="Address" required>
            </div>

            <div class="form-group mt-3">
                <label for="ContactNumber">Contact Number:</label>
                <input type="text" class="form-control" name="ContactNumber" required>
            </div>

            <div class="form-group mt-3">
                <label for="Passcode">Passcode:</label>
                <input type="password" class="form-control" name="Passcode" required>
            </div>

            <div class="form-group mt-3">
                <label for="UserImage">User Image:</label>
                <input type="file" class="form-control-file" name="UserImage" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
