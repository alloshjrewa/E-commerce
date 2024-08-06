<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(url('public/assets/plugins/summernote/summernote-bs4.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Page</h1>
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
                            <form action="<?php echo e(route('page.update', [$getRecord->id])); ?>" method="post"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" required
                                            value="<?php echo e($getRecord->name); ?>" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="slug" required
                                            value="<?php echo e($getRecord->slug); ?>" placeholder="Enter Slug">
                                    </div>

                                    <div class="form-group">
                                        <label>Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="title" required
                                            value="<?php echo e($getRecord->title); ?>" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <?php if(!empty($getRecord->getImage())): ?>
                                        <img style="width:200px" src="<?php echo e($getRecord->getImage()); ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control editor" name="description"><?php echo e($getRecord->description); ?>

                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>KeyWords </label>
                                        <input type="text" class="form-control" name="keywords"
                                            value="<?php echo e($getRecord->keywords); ?>" placeholder="Enter keywords">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
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
<script src="<?php echo e(url('public/assets/plugins/summernote/summernote-bs4.min.js')); ?>"></script>

<script type="text/javascript">
    //summernote editor
    $('.editor').summernote({
        height : 200
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/page/edit.blade.php ENDPATH**/ ?>