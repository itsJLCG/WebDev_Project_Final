<?php $__env->startSection('content'); ?>
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-tasks h-100 d-flex flex-column">
          <div class="card-header">
            <h5 class="card-header">MONEY OFFERINGS</h5>
          </div>
          <div class="card-body" style="font-size: 25px;">
            <form action="<?php echo e(route('donation.stores')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="CashAmount">Cash/E-Cash Amount</label>
                <input type="text" class="form-control" id="CashAmount" name="CashAmount">
              </div>
              <div class="form-group">
                <label for="ModeOfDonation">Mode of Cash Payment</label><br>
                <input type="radio" id="ModeOfDonation" name="ModeOfDonation" value="Gcash">
                <label for="ModeOfDonation">GCash</label><br>
                <input type="radio" id="ModeOfDonation" name="ModeOfDonation" value="Bank">
                <label for="ModeOfDonation">Bank Transfer</label><br>
                <input type="radio" id="ModeOfDonation" name="ModeOfDonation" value="Others">
                <label for="ModeOfDonation">Others</label>
              </div>
              <div class="form-group">
                <label for="MoneyDateOffered">Date Offered (Money)</label>
                <input type="date" class="form-control" id="MoneyDateOffered" name="MoneyDateOffered">
              </div>
              <div class="form-group">
                <div class="form-group">
                    <label>Proof of Offerings Cash/E-Cash</label><br>
                    <div>
                        <label for="ProofOfDonationCash" class="btn btn-primary" id="upload_proof_button">Upload File</label>
                        <input type="file" class="d-none" id="ProofOfDonationCash" name="ProofOfDonationCash">
                    </div>
                </div>
            </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card card-tasks h-100 d-flex flex-column">
          <div class="card-header">
            <h5 class="card-header">IN-KIND OFFERINGS</h5>
          </div>
          <div class="card-body" style="font-size: 25px;">
            <form action="<?php echo e(route('donation.store')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="DescriptionDonation">Description of Offering</label>
                <input type="text" class="form-control" id="DescriptionDonation" name="DescriptionDonation">
              </div>
              <div class="form-group">
                <label for="InkindDateOffered">Date Offered (InKind)</label>
                <input type="date" class="form-control" id="InkindDateOffered" name="InkindDateOffered">
              </div>
              <div class="form-group">
                <div class="form-group">
                    <label>Proof of Offerings In-Kind</label><br>
                    <div>
                        <label for="ProofOfDonationInKind" class="btn btn-primary" id="upload_proof_button">Upload File</label>
                        <input type="file" class="d-none" id="ProofOfDonationInKind" name="ProofOfDonationInKind">
                    </div>
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Offerings',
    'class' => 'sidebar-mini',
    'activePage' => 'donation',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/pages/donation.blade.php ENDPATH**/ ?>