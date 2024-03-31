<?php $__env->startSection('content'); ?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
            <?php if(isset($massSchedules) && $massSchedules->isNotEmpty()): ?>
                <?php
                    $groupedSchedules = $massSchedules->groupBy('MassDay');
                ?>

                <?php $__currentLoopData = $groupedSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day => $schedules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
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
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mass Livestream</h4>
            </div>
            <div class="card-body">
                <div class="livestream-content">
                    <a href="https://www.facebook.com/InangmgaDukhaParish/live_videos" target="_blank" class="livestream-link">Watch Livestream (Click Here!)</a>
                </div>
                <img src="<?php echo e(asset('assets/img/LivestreamImage.jpg')); ?>" alt="Livestream Image" class="livestream-image">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Mass Schedule / Livestreaming',
    'class' => 'sidebar-mini',
    'activePage' => 'massSchedule',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/pages/massSchedule.blade.php ENDPATH**/ ?>