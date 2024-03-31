<?php $__env->startSection('content'); ?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Financial Report (In Kind)
                </div>
                <div class="card-body d-flex flex-wrap">
                    <?php $__currentLoopData = $donationsInKind; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donationIK): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body" style="height: 300px;">
                                <h5 class="card-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Description Of Donation: <span><?php echo e($donationIK->DescriptionDonation); ?></span></h5>
                                <h5 class="card-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Date Offered (InKind): <span><?php echo e($donationIK->InkindDateOffered); ?></span></h5>
                                <img src="<?php echo e(asset('assets/img/' . $donationIK->ProofOfDonationInKind)); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
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
    'activePage' => 'financialreport2',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/pages/financialreport2.blade.php ENDPATH**/ ?>