<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Slider</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <!-- Form Start -->
                            <form action="<?php echo e(route('slider.update', [$getRecord->id])); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            value="<?php echo e($getRecord->title); ?>" placeholder="Enter Slider Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <?php if(!empty($getRecord->getImage())): ?>
                                            <img src="<?php echo e($getRecord->getImage()); ?>" style="height: 100px" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Button Name </label>
                                        <input type="text" class="form-control" name="button_name"
                                            value="<?php echo e($getRecord->button_name); ?>" placeholder="Enter Button Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Button Link </label>
                                        <input type="text" class="form-control" name="button_link"
                                            value="<?php echo e($getRecord->button_link); ?>" placeholder="Enter Button Link">
                                    </div>


                                    <div class="form-group">
                                        <label>Status <span style="color: red">*</span></label>
                                        <select class="form-control" name="status">
                                            <option <?php echo e($getRecord->status == 0 ? 'selected' : ''); ?> value="0">inActive
                                            </option>
                                            <option <?php echo e($getRecord->status  == 1 ? 'selected' : ''); ?> value="1">Active
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/slider/edit.blade.php ENDPATH**/ ?>