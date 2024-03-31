<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-header"><?php echo e(__('USERS')); ?></div>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('users', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1454751040-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <div class="container">
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\CRUDuser.blade.php ENDPATH**/ ?>