<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-md-11 mx-auto"> <!-- Wrap the content within a container with maximum width -->
            <?php if(isset($massSchedules) && $massSchedules->isNotEmpty()): ?>
                <?php
                    $groupedSchedules = $massSchedules->groupBy('MassDay');
                ?>

                <?php $__currentLoopData = $groupedSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day => $schedules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-4"> <!-- Add margin bottom to create space between cards -->
                        <div class="card-header">
                            <h4 class="card-title"><?php echo e($day); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $massSchedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($massSchedule->MassTimeSchedule); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p>No Mass Schedule available</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Mass Schedule',
    'activePage' => 'massScheduleOutside',
    'backgroundImage' => asset('assets') . "/img/ParishConnect_Register.jpg",
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnect_FinalSystem\resources\views/auth/massScheduleOutside.blade.php ENDPATH**/ ?>