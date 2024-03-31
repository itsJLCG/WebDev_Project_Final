<?php $__env->startSection('content'); ?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Apply Now
                </div>
                <div class="card-body" style="font-size: 25px;">
                    <form action="<?php echo e(route('application.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="ApplicationType">Ministry Application Type</label>
                            <select name="ApplicationType" id="ApplicationType" class="form-control" required>
                                <option value="">Select Application Type</option>
                                <option value="Choir">Choir</option>
                                <option value="Sacristan">Sacristan</option>
                                <option value="Ushers/Greeters">Ushers/Greeters</option>
                                <option value="Facility Maintenance">Facility Maintenance</option>
                                <option value="Musician">Musician</option>
                                <option value="Event Coordinator">Event Coordinator</option>
                                <option value="Office Support">Office Support</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Sex">Sex</label>
                            <select name="Sex" id="Sex" class="form-control" required>
                                <option value="">Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Age">Age</label>
                            <input type="text" name="Age" id="Age" class="form-control" required>
                        </div>
                            <div class="mb-3">
                                <label for="ContactNumber">Contact Number</label>
                                <input type="text" name="ContactNumber" id="ContactNumber" class="form-control" required>
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Ministry Application',
    'class' => 'sidebar-mini',
    'activePage' => 'application',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnect_FinalSystem\resources\views/pages/application.blade.php ENDPATH**/ ?>