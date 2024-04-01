<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="user_image">{{ __('Profile Image') }}</label>
                            <input id="user_image" type="file" class="form-control-file" name="user_image">
                        </div>

                        <!-- Add other account update fields as needed -->

                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Profile') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
