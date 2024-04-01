@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Create New User</h2>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user_image">Profile Picture</label>
                    <input type="file" name="user_image[]" class="form-control-file" multiple>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>user</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="accountStatus">Account Status</label>
                    <select name="accountStatus" id="accountStatus" class="form-control">
                        <option value="Activated" {{ old('accountStatus') == 'Activated' ? 'selected' : '' }}>Activated</option>
                        <option value="Deactivated" {{ old('accountStatus') == 'Deactivated' ? 'selected' : '' }}>Deactivated</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        </div>
    </div>
</div>
@endsection
