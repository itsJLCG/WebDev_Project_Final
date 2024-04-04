@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">User Profile</h2>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>
            <div class="form-group">
                <label for="user_image">Profile Picture(s)</label><br>
                    @if($user->user_image)
                        @foreach(explode(',', $user->user_image) as $imagePath)
                            <img src="{{ asset($imagePath) }}" style="width: 50px; height: 50px;">
                        @endforeach
                    @else
                        No Profile Picture
                    @endif
            </div>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
