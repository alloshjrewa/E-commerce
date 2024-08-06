<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact Us
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <?php echo $__env->make('admin.layouts._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form method="get" action="">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Us Search</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" name="id" placeholder="ID" class="form-control" value="<?php echo e(Request::get('id')); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo e(Request::get('name')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo e(Request::get('email')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" placeholder="Phone" class="form-control" value="<?php echo e(Request::get('phone')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" name="subject" placeholder="Subject" class="form-control" value="<?php echo e(Request::get('subject')); ?>">
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button  class="btn "style="background: #0084D1;color:#fff">Search</button>
                                            <a href ="<?php echo e(url('admin/contact-us')); ?>" class="btn" style="background: #5CC6FF;color:#fff">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Contact Us</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Login Name</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($value->id); ?></td>
                                                <td><?php echo e(!empty($value->getUser) ? $value->getUser->name : ''); ?></td>
                                                <td><?php echo e($value->name); ?></td>
                                                <td><?php echo e($value->email); ?></td>
                                                <td><?php echo e($value->phone); ?></td>
                                                <td><?php echo e($value->subject); ?></td>
                                                <td><?php echo e($value->message); ?></td>
                                                <td><?php echo e($value->created_at); ?></td>

                                                <td>
                                                    <a href='<?php echo e(url('admin/contact-us/delete/' . $value->id)); ?>'
                                                        class="btn btn-danger btn-sm">Delete</a>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/contact_us/list.blade.php ENDPATH**/ ?>