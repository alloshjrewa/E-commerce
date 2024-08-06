<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Edit Profile</h1>
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
                            <form action="<?php echo e(url('user/edit-profile')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <label>First Name *</label>
                                                <input type="text" name="first_name" value="<?php echo e($getRecord->name); ?>" class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" name="last_name" value="<?php echo e($getRecord->last_name); ?>" class="form-control" required>
                                            </div>

                                        </div>
                                        <label>Email </label>
                                        <input type="email" name="email" value="<?php echo e($getRecord->email); ?>" class="form-control" readonly>

                                        <label>Company Name (Optional)</label>
                                        <input type="text" name="company_name" value="<?php echo e($getRecord->company_name); ?>" class="form-control">

                                        <label>Country *</label>
                                        <input type="text" name="country" value="<?php echo e($getRecord->country); ?>" class="form-control" required>

                                        <label>Street address *</label>
                                        <input type="text" name="address_one" value="<?php echo e($getRecord->address_one); ?>" class="form-control" placeholder="House number and Street name" required>
                                        <input type="text" name="address_two" value="<?php echo e($getRecord->address_two); ?>" class="form-control" placeholder="Appartments, suite, unit etc ..." >

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Town / City *</label>
                                                <input type="text" name="city" value="<?php echo e($getRecord->city); ?>" class="form-control" required>
                                            </div>


                                            <div class="col-sm-6">
                                                <label>State *</label>
                                                <input type="text" name="state" value="<?php echo e($getRecord->state); ?>" class="form-control" required>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Postalcode / ZIP *</label>
                                                <input type="text" name="postalcode" value="<?php echo e($getRecord->postalcode); ?>"  class="form-control" required>
                                            </div>


                                            <div class="col-sm-6">
                                                <label>Phone *</label>
                                                <input type="tel" name="phone"  value="<?php echo e($getRecord->phone); ?>" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-lg">
                                    Submit
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/user/edit_profile.blade.php ENDPATH**/ ?>