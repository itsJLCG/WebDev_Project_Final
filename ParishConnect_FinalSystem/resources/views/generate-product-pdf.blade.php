<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        h2 {
            color: #007bff;
        }

        table {
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .services-section {
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>
<body>
    <h2 class="text-center">Parish Connect   {{ $date }}</h2>

    <div class="services-section">
                    <h3>Services Offered</h3>
                    <ul>
                        <li>Eucharistic Mass</li>
                        <li>Weddings</li>
                        <li>Prayers</li>
                        <li>Communions</li>
                        <li>Baptism</li>
                        <li>Prayers</li>
                    </ul>
                </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">{{ $title }}</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Baranggay</th>
                            <th>City</th>
                            <th>Position</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaders as $leader)
                        <tr>
                           <td>{{ $leader->name }}</td>
                           <td>{{ $leader->baranggay }}</td>
                           <td>{{ $leader->city }}</td>
                           <td>{{ $leader->position }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Mass Schedules</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mass Day</th>
                            <th>Mass Time Schedule</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($massSched as $sched)
                        <tr>
                           <td>{{ $sched->MassDay }}</td>
                           <td>{{ $sched->MassTimeSchedule }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
