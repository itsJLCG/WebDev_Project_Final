@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">{{ __('Pending Orders') }}</div>
                        <div class="card-body">
                            @php
                                $pendingOrders = $orders->whereIn('trackingStatus', ['To Pack', 'To Be Shipped'])->reverse();
                            @endphp

                            @if ($pendingOrders->isEmpty())
                                <p>No pending orders found.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>User ID</th>
                                                <th>Order Detail ID</th>
                                                <th>Product ID</th>
                                                <th>Order Quantity</th>
                                                <th>Payment ID</th>
                                                <th>Tracking ID</th>
                                                <th>Tracking Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendingOrders as $order)
                                                <tr>
                                                    <td>{{ $order->id_order }}</td>
                                                    <td>{{ $order->id_user }}</td>
                                                    <td>{{ $order->id_orderDetail }}</td>
                                                    <td>{{ $order->id_product }}</td>
                                                    <td>{{ $order->orderQuantity }}</td>
                                                    <td>{{ $order->id_payment }}</td>
                                                    <td>{{ $order->id_tracking }}</td>
                                                    <td>{{ $order->trackingStatus }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">{{ __('Successful Orders') }}</div>
                        <div class="card-body">
                            @php
                                $successfulOrders = $orders->where('trackingStatus', 'Successful');
                            @endphp

                            @if ($successfulOrders->isEmpty())
                                <p>No successful orders found.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>User ID</th>
                                                <th>Order Detail ID</th>
                                                <th>Product ID</th>
                                                <th>Order Quantity</th>
                                                <th>Payment ID</th>
                                                <th>Tracking ID</th>
                                                <th>Tracking Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($successfulOrders as $order)
                                                <tr>
                                                    <td>{{ $order->id_order }}</td>
                                                    <td>{{ $order->id_user }}</td>
                                                    <td>{{ $order->id_orderDetail }}</td>
                                                    <td>{{ $order->id_product }}</td>
                                                    <td>{{ $order->orderQuantity }}</td>
                                                    <td>{{ $order->id_payment }}</td>
                                                    <td>{{ $order->id_tracking }}</td>
                                                    <td>{{ $order->trackingStatus }}</td>
                                                    <td>
                                                        <form method="GET" action="{{ route('comment.index', ['id_tracking' => $order->id_tracking]) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Comment</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
