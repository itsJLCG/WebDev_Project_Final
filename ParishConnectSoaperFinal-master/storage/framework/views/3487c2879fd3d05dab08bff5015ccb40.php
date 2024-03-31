<?php $__env->startSection('content'); ?>
<div class="panel-header">
<div class="header text-center">
      <h2 class="title">Liturgical Activities</h2>
      <p class="category">Approved/Pending Liturgical Activities
      </p>
</div>
    </div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Your Activities
                </div>
                <div class="card-body">
                    <?php if(!is_null($data) && count($data) > 0): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Host</th>
                                    <th>Description</th>
                                    <th>Date and Time</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($application->ActivityType); ?></td>
                                        <td><?php echo e($application->ActivityName); ?></td>
                                        <td><?php echo e($application->ActivityHost); ?></td>
                                        <td><?php echo e($application->ActivityDescription); ?></td>
                                        <td><?php echo e($application->ActivityDateTime); ?></td>
                                        <td><?php echo e($application->created_at); ?></td>
                                        <td><?php echo e($application->activityStatus); ?></td>
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
    'namePage' => 'Liturgical Activities Created',
    'class' => 'sidebar-mini',
    'activePage' => 'liturgicalActivitiesScheduling',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/show/event.blade.php ENDPATH**/ ?>