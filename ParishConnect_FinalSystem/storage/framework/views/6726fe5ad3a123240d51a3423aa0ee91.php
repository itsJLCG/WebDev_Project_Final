<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid"> <!-- Add container fluid -->
        <div class="row">
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category"><?php echo e($event->EventDate); ?></h5>
                  <h4 class="card-title"><?php echo e($event->EventTitle); ?></h4>
                </div>
                <div class="card-body">
                    <img src="<?php echo e(asset('assets/img/' . $event->EventImage)); ?>" alt="<?php echo e($event->EventTitle); ?>" class="img-fluid">
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?> <!-- Add custom styles -->
<style>
    .container-fluid .card { /* Limit card width */
        max-width: 300px; /* Adjust the maximum width as needed */
        margin: 0 auto; /* Center the cards */
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Events',
    'activePage' => 'eventOutside',
    'backgroundImage' => asset('assets') . "/img/ParishConnect_Register.jpg",
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnect_FinalSystem\resources\views/auth/eventOutside.blade.php ENDPATH**/ ?>