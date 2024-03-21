@extends('layouts.app', [
    'namePage' => 'Events',
    'activePage' => 'eventOutside',
    'backgroundImage' => asset('assets') . "/img/ParishConnect_Register.jpg",
])

@section('content')
<div class="content">
    <div class="container-fluid"> <!-- Add container fluid -->
        <div class="row">
            @foreach($events as $event)
            <div class="col-lg-4">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">{{ $event->EventDate }}</h5>
                  <h4 class="card-title">{{ $event->EventTitle }}</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('assets/img/' . $event->EventImage) }}" alt="{{ $event->EventTitle }}" class="img-fluid">
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('styles') <!-- Add custom styles -->
<style>
    .container-fluid .card { /* Limit card width */
        max-width: 300px; /* Adjust the maximum width as needed */
        margin: 0 auto; /* Center the cards */
    }
</style>
@endpush
