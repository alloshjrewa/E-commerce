<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sub Category List
                    </div>
                    <div class="col-sm-6" style="text-align: right ">
                        <a href='<?php echo e(url('admin/category/create')); ?>' class="btn btn-primary">Add New
                            Category</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <?php echo $__env->make('admin.layouts._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Category List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>KeyWords</th>
                                            <th>Created_By</th>
                                            <th>Created_Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($value->id); ?></td>
                                                <td><?php echo e($value->name); ?></td>
                                                <td><?php echo e($value->slug); ?></td>
                                                <td><?php echo e($value->title); ?></td>
                                                <td><?php echo e($value->description); ?></td>
                                                <td><?php echo e($value->keywords); ?></td>
                                                <td><?php echo e($value->created_by_name); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?></td>
                                                <td><?php echo e($value->status == 0 ? 'inActive' : 'Active'); ?></td>
                                                <td>
                                                    <a href='<?php echo e(url('admin/category/edit/' . $value->id)); ?>'
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href='<?php echo e(url('admin/category/delete/' . $value->id)); ?>'
                                                        class="btn btn-danger btn-sm">Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/category/index.blade.php ENDPATH**/ ?>