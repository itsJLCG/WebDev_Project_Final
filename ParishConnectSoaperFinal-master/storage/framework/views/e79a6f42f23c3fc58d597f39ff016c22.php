<?php $__env->startSection('content'); ?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Financial Report (Money)
                </div>
                <div class="card-body d-flex flex-wrap">
                    <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body" style="height: 300px;">
                                <h5 class="card-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Cash Amount: <span><?php echo e($donation->CashAmount); ?></span></h5>
                                <h5 class="card-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Mode of Donation: <span><?php echo e($donation->ModeOfDonation); ?></span></h5>
                                <h5 class="card-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Date Offered (Money): <span><?php echo e($donation->MoneyDateOffered); ?></span></h5>
                                <img src="<?php echo e(asset('assets/img/' . $donation->ProofOfDonationCash)); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Resources',
    'class' => 'sidebar-mini',
    'activePage' => 'financialreport',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/pages/financialreport.blade.php ENDPATH**/ ?>