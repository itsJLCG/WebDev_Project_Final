<?php $__env->startSection('content'); ?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    
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
    'namePage' => 'Livestreaming',
    'class' => 'sidebar-mini',
    'activePage' => 'massSchedule',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnect_FinalSystem\resources\views/pages/massSchedule.blade.php ENDPATH**/ ?>