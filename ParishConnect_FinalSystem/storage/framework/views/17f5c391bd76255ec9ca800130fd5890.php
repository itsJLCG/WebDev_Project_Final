<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
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
    <h2 class="text-center">Parish Connect   <?php echo e($date); ?></h2>

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
                <h2 class="text-center"><?php echo e($title); ?></h2>

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
                        <?php $__currentLoopData = $leaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td><?php echo e($leader->name); ?></td>
                           <td><?php echo e($leader->baranggay); ?></td>
                           <td><?php echo e($leader->city); ?></td>
                           <td><?php echo e($leader->position); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php $__currentLoopData = $massSched; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sched): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td><?php echo e($sched->MassDay); ?></td>
                           <td><?php echo e($sched->MassTimeSchedule); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xamppss\laravel\ParishConnect_FinalSystem\resources\views/generate-product-pdf.blade.php ENDPATH**/ ?>