@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tracking Status') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Payment ID</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trackings as $tracking)
                            <tr>
                                <td>{{ $tracking->id_tracking }}</td>
                                <td>{{ $tracking->id_payment }}</td>
                                <td>
                                    <form method="POST" action="{{ route('update_tracking', ['id' => $tracking->id_tracking]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <select name="trackingStatus" onchange="this.form.submit()">
                                            <option value="To Pack" {{ $tracking->trackingStatus == 'To Pack' ? 'selected' : '' }}>To Pack</option>
                                            <option value="To Be Shipped" {{ $tracking->trackingStatus == 'To Be Shipped' ? 'selected' : '' }}>To Be Shipped</option>
                                            <option value="Successful" {{ $tracking->trackingStatus == 'Successful' ? 'selected' : '' }}>Successful</option>
                                        </select>
                                    </form>
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
