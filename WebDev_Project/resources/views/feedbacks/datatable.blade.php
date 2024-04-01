@extends('layouts.master')
@section('content')
    <div class="row">

        <div class="container">
            <h2>Feedback List</h2>
            <div>
                <a href="{{ route('feedbacks.create') }}" class="btn btn-success mb-3">Create Feedback</a>
            </div>
            {{$dataTable->table()}}
        </div>
    </div>
    {{$dataTable->scripts()}}
@endsection
