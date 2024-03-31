<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-signup text-center">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo e(__('Register')); ?></h4>
                        </div>
                        <div class="card-body ">
                            <form method="POST" action="<?php echo e(route('register.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <!-- Name input -->
                                <div class="input-group <?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </div>
                                    </div>
                                    <input class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                                    <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <!-- Email input -->
                                <div class="input-group <?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons ui-1_email-85"></i>
                                        </div>
                                    </div>
                                    <input class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Email')); ?>" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                </div>
                                <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <!-- Password input -->
                                <div class="input-group <?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons objects_key-25"></i>
                                        </div>
                                    </div>
                                    <input class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" type="password" name="password" required>
                                    <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <!-- Confirm password input -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons objects_key-25"></i>
                                        </div>
                                    </div>
                                    <input class="form-control" placeholder="<?php echo e(__('Confirm Password')); ?>" type="password" name="password_confirmation" required>
                                </div>
                                <!-- User image input -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons media-2_sound-wave"></i>
                                        </div>
                                    </div>
                                    <label class="form-control" style="text-align: left;" for="user_image">Upload Image Profile</label>
                                    <input class="d-none" type="file" id="user_image" name="user_image">
                                </div>
                                <!-- Valid ID input -->
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons files_single-copy-04"></i>
                                        </div>
                                    </div>
                                    <label class="form-control" style="text-align: left;" for="valid_id">Provide Valid ID</label>
                                    <input class="d-none" type="file" id="valid_id" name="valid_id">
                                </div>
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary btn-round btn-lg"><?php echo e(__('Get Started')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/ParishConnect_Register.jpg",
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/auth/register.blade.php ENDPATH**/ ?>