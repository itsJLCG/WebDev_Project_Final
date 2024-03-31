@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">User Management</h2>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-success">Create User</a>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->user_image)
                                <!-- Display user image -->
                                <img src="{{ asset('/storage/images/' . $user->user_image) }}" style="width: 50px; height: 50px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if($user->deleted_at==null)
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            @else
                                <form action="{{ route('users.restore', $user->id) }}" method="GET" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to restore this user?')">Restore</button>
                                </form>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
