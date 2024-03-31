<?php $__env->startSection('content'); ?>
<div class="panel-header">
<div class="header text-center">
      <h2 class="title">Applications</h2>
      <p class="category">Approved/Pending Applications
      </p>
</div>
    
    </div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Your Applications
                </div>
                <div class="card-body">
                    <?php if(!is_null($data) && count($data) > 0): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Application Type</th>
                                    <th>Sex</th>
                                    <th>Age</th>
                                    <th>Contact Number</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($application->applicationtype); ?></td>
                                        <td><?php echo e($application->sex); ?></td>
                                        <td><?php echo e($application->age); ?></td>
                                        <td><?php echo e($application->contactnumber); ?></td>
                                        <td><?php echo e($application->created_at); ?></td>
                                        <td><?php echo e($application->applicationStatus); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p>No applications found.</p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initGoogleMaps();
    });
</script>
<?php $__env->stopPush(); ?>




<!-- <div>
<ul>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($i->applicationtype); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div> -->

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Application',
    'class' => 'sidebar-mini',
    'activePage' => 'events',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/show/application.blade.php ENDPATH**/ ?>