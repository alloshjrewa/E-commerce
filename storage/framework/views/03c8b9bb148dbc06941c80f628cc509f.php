<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Change Password</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br/>
                <div class="row">

                <?php echo $__env->make('user._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <?php echo $__env->make('layouts._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <form action="<?php echo e(url('user/change-password')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <label>Old Password *</label>
                                <input type="text" name="old_password" class="form-control" required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>New Password *</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Confirm Password *</label>
                                        <input type="password" name="cpassword" class="form-control" required>
                                    </div>        </div>
                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-lg">
                                    Update Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/user/change_password.blade.php ENDPATH**/ ?>