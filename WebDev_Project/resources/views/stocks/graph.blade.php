@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5"> <!-- Adjust the column width as needed -->
            <div class="card">
                <div class="card-body">
                    <canvas id="stockChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('stockChart').getContext('2d');

    // Transforming stock data into appropriate arrays
    var labels = {!! $stocks->pluck('product_name')->toJson() !!};
    var data = {!! $stocks->pluck('stockQuantity')->toJson() !!};

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Stock Quantity',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection
