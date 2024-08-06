<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Partner List
                    </div>
                    <div class="col-sm-6" style="text-align: right ">
                        <a href='<?php echo e(url('admin/partner/create')); ?>' class="btn btn-primary">Add New
                            Partner</a>
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
                                <h3 class="card-title">Partner List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Link</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($value->id); ?></td>
                                                <td>
                                                    <?php if(!empty($value->getImage())): ?>
                                                        <img src="<?php echo e($value->getImage()); ?>" style="height: 50px" alt="">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($value->link); ?></td>
                                                <td><?php echo e($value->status == 0 ? 'inActive' : 'Active'); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?></td>
                                                <td>
                                                    <a href='<?php echo e(url('admin/partner/edit/' . $value->id)); ?>'
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href='<?php echo e(url('admin/partner/delete/' . $value->id)); ?>'
                                                        class="btn btn-danger btn-sm">Delete
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                <div style="padding: 10px;float: right;">
                                    <?php echo $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links(); ?>

                                </div>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/partner/index.blade.php ENDPATH**/ ?>