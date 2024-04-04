<!-- resources/views/comment.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Comment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" required autofocus></textarea>

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment_image" class="col-md-4 col-form-label text-md-right">{{ __('Comment Images') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="comment_image" class="@error('comment_image') is-invalid @enderror" name="comment_image[]" multiple>

                                @error('comment_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Comment') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Display comments table -->
            <div class="card mt-4">
                <div class="card-header">{{ __('My Comments') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Comment</th>
                                <th>Images</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    @if($comment->commentImage)
                                        @foreach(explode(',', $comment->commentImage) as $image)
                                            <img src="{{ asset('storage/images/' . $image) }}" alt="Comment Image" style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
