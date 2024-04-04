@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Feedback</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('feedbacks.update', $feedback->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ $feedback->username }}" required>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="">Select rating</option>
                                    @php
                                        $labels = [
                                            1 => 'Very Unsatisfied',
                                            2 => 'Unsatisfied',
                                            3 => 'Neutral',
                                            4 => 'Satisfied',
                                            5 => 'Very Satisfied',
                                        ];
                                    @endphp
                                    @foreach ($labels as $value => $label)
                                        <option value="{{ $value }}" {{ $feedback->rating == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="images">Images:</label>
                                <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                            </div>
                            <div class="form-group">
                                <label>Current Images:</label>
                                @if ($feedback->images)
                                    @foreach (explode(',', $feedback->images) as $image)
                                        <img src="{{ asset($image) }}" alt="Feedback Image" class="img-thumbnail" style="max-width: 150px;">
                                    @endforeach
                                @else
                                    <p>No images uploaded.</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
