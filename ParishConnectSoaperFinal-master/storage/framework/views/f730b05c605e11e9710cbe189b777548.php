<?php $__env->startSection('content'); ?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Bible Study Materials (Online)
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php $__currentLoopData = $bibleStudyMaterials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body" style="height: 300px;">
                                        <h5 class="card-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo e($material->ResourceTitle); ?></h5>
                                        <img src="<?php echo e(asset('assets/img/' . $material->ResourceImage)); ?>" class="card-img-top" style="height: 150px; object-fit: cover;" alt="<?php echo e($material->ResourceTitle); ?>"></img>
                                        <a href="<?php echo e($material->ResourceLink); ?>" class="btn btn-primary" target="_blank">View Material</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Resources',
    'class' => 'sidebar-mini',
    'activePage' => 'resources',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/pages/resources.blade.php ENDPATH**/ ?>