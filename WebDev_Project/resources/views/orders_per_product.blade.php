@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($data as $item)
    <canvas id="orderChart{{$loop->index}}" width="400" height="200"></canvas>
    <br>
    @endforeach
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @foreach($data as $item)
        var ctx{{$loop->index}} = document.getElementById('orderChart{{$loop->index}}').getContext('2d');
        var orderChart{{$loop->index}} = new Chart(ctx{{$loop->index}}, {
            type: 'line',
            data: {
                labels: {!! json_encode($item['order_counts']->keys()) !!},
                datasets: [{
                    label: 'Number of Orders for {{$item["product_name"]}}',
                    data: {!! json_encode($item['order_counts']->values()) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            displayFormats: {
                                hour: 'MMM D hA'
                            }
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Number of Orders'
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
        @endforeach
    });
</script>
@endsection
