<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>

                <div class="card-body">
                    <div class="profile-picture">
                        @if ($user->user_image)
                            <img src="{{ asset('storage/profile_images/' . $user->user_image) }}" alt="Profile Image" class="img-fluid mb-3" style="max-width: 100px;">
                        @else
                            <p>No profile image</p>
                        @endif
                    </div>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <!-- You can add other profile details here, excluding the password -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
