@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header">{{ __('USERS') }}</div>
            <livewire:users/>
            <div class="container">
            </div>
        </div>
@endsection
