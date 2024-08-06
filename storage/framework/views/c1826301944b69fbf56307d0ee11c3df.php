<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Add New Brand</h1>
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
                            <form action="<?php echo e(route('brand.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Brand Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" required
                                            value="<?php echo e(old('name')); ?>" placeholder="Enter Brand Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="slug" required
                                            value="<?php echo e(old('slug')); ?>" placeholder="Enter Slug For URL">
                                        <div style="color: red"> <?php echo e($errors->first('slug')); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="<?php echo e(old('title')); ?>" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter Description"><?php echo e(old('description')); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>KeyWords</label>
                                        <input type="text" class="form-control" name="keywords"
                                            value="<?php echo e(old('keywords')); ?>" placeholder="Enter KeyWords">
                                    </div>

                                    <div class="form-group">
                                        <label>Status <span style="color: red">*</span></label>
                                        <select class="form-control" name="status">
                                            <option <?php echo e(old('status') == 0 ? 'selected' : ''); ?> value="0">inActive
                                            </option>
                                            <option <?php echo e(old('status') == 1 ? 'selected' : ''); ?> value="1">Active
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/brand/create.blade.php ENDPATH**/ ?>