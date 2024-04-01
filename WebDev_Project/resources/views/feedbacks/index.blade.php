@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Feedbacks</div>

                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('feedbacks.create') }}" class="btn btn-sm btn-primary mb-3">Create Feedback</a>

                            @forelse ($feedbacks as $feedback)
                                <div class="list-group-item">
                                    <h5 class="mb-1">{{ $feedback->username }}</h5>
                                    <p class="mb-1">{{ $feedback->comment }}</p>
                                    <div>
                                        @if ($feedback->images)
                                            @foreach (explode(',', $feedback->images) as $image)
                                                <img src="{{ asset($image) }}" alt="Feedback Image" class="img-thumbnail" style="max-width: 150px;">
                                            @endforeach
                                        @else
                                            <p>No images uploaded.</p>
                                        @endif
                                    </div>
                                    <div>
                                        @if($feedback->deleted_at)
                                            <form action="{{ route('feedbacks.restore', $feedback->id) }}" method="GET" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to restore this feedback?')">Restore</button>
                                            </form>
                                        @else
                                            <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this feedback?')">Delete</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('feedbacks.edit', $feedback->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    </div>
                                </div>
                            @empty
                                <p>No feedbacks found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
