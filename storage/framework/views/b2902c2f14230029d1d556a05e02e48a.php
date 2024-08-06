<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>System Setting</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $__env->make('admin.layouts._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <!-- Form Start -->
                            <form action="<?php echo e(route('update_system_setting')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Website Name</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->website_name); ?>" name="website_name">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control" name="logo">
                                        <?php if(!empty($getRecord->getLogo())): ?>
                                        <img src="<?php echo e($getRecord->getLogo()); ?>" alt="" style="width: 200px">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Fevicon</label>
                                        <input type="file" class="form-control" name="fevicon">
                                        <?php if(!empty($getRecord->getFevicon())): ?>
                                        <img src="<?php echo e($getRecord->getFevicon()); ?>" alt="" style="width: 50px">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Footer Description</label>
                                       <textarea class="form-control" name="footer_description"><?php echo e($getRecord->footer_description); ?></textarea>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Footer Payment Icon</label>
                                        <input type="file" class="form-control" name="footer_payment_icon">
                                        <?php if(!empty($getRecord->getFooterPayment())): ?>
                                        <img src="<?php echo e($getRecord->getFooterPayment()); ?>" alt="" style="width: 200px">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <hr />
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Address</label>
                                       <textarea class="form-control" name="address"><?php echo e($getRecord->address); ?></textarea>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->phone); ?>" name="phone">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Phone 2</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->phone_two); ?>" name="phone_two">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Submit Contact Email</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->submit_email); ?>" name="submit_email">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->email); ?>" name="email">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email 2</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->email_two); ?>" name="email_two">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Working Hour</label>
                                       <textarea class="form-control"  name="working_hour"> <?php echo e($getRecord->working_hour); ?></textarea>
                                    </div>
                                </div>
                                <hr/>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->facebook_link); ?>" name="facebook_link">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Twitter Link</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->twitter_link); ?>" name="twitter_link">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Instagram Link</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->instagram_link); ?>" name="instagram_link">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Youtube Link</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->youtube_link); ?>" name="youtube_link">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pinterest Link</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->pinterest_link); ?>" name="pinterest_link">
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/setting/system_setting.blade.php ENDPATH**/ ?>