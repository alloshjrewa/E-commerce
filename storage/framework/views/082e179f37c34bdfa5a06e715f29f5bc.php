<?php $__env->startSection('style'); ?>
<style type="text/css">
.form-group{
    margin-bottom:2px;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Order Detail</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>ID : <span style="font-weight: normal"><?php echo e($getRecord->id); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Name : <span style="font-weight: normal"><?php echo e($getRecord->first_name); ?> <?php echo e($getRecord->last_name); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Name : <span style="font-weight: normal"><?php echo e($getRecord->company_name); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Country : <span style="font-weight: normal"><?php echo e($getRecord->country); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Address : <span style="font-weight: normal"><?php echo e($getRecord->address_one); ?> , <?php echo e($getRecord->address_two); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>City : <span style="font-weight: normal"><?php echo e($getRecord->city); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>State : <span style="font-weight: normal"><?php echo e($getRecord->state); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Postcode : <span style="font-weight: normal"><?php echo e($getRecord->postalcode); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone : <span style="font-weight: normal"><?php echo e($getRecord->phone); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Email : <span style="font-weight: normal"><?php echo e($getRecord->email); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Discount Code : <span style="font-weight: normal"><?php echo e($getRecord->discount_code); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Discount Amount($) : <span style="font-weight: normal"><?php echo e(number_format($getRecord->discount_amount,2)); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Shipping Name : <span style="font-weight: normal"><?php echo e($getRecord->getShipping->name); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Shipping Amount($) : <span style="font-weight: normal"><?php echo e(number_format($getRecord->shipping_amount,2)); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Amount($) : <span style="font-weight: normal"><?php echo e(number_format($getRecord->total_amount,2)); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Method :<span style="text-transform:Capitalize;font-weight: normal"><?php echo e($getRecord->payment_method); ?> </span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Status : <span style="font-weight: normal"><?php echo e($getRecord->status); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Note :<span style="font-weight: normal"><?php echo e($getRecord->note); ?> </span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Created Date : <span style="font-weight: normal"><?php echo e(date('d-m-Y h:i A', strtotime($getRecord->created_at))); ?></span></label>
                                    </div>

                                </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0" style="overflow: auto">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Color Name</th>
                                        <th>Size Name</th>
                                        <th>Size Amount ($)</th>
                                        <th>Total Amount ($)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $getRecord->getItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $getProductImage = $item->getProduct->getSingleImage($item->getProduct->id);
                                        ?>
                                    <tr>
                                        <td><img style="width:75px;height: 75px" src="<?php echo e($getProductImage->getUploadedImage()); ?>"></td>
                                        <td><a target="_blank" href="<?php echo e(url($item->getProduct->slug)); ?>"><?php echo e($item->getProduct->title); ?></a></td>
                                        <td><?php echo e($item->quantity); ?></td>
                                        <td><?php echo e($item->price); ?></td>
                                        <td><?php echo e($item->color_name); ?></td>
                                        <td><?php echo e($item->size_name); ?></td>
                                        <td><?php echo e(number_format($item->size_price,2)); ?></td>
                                        <td><?php echo e(number_format($item->total_price,2)); ?></td>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/order/detail.blade.php ENDPATH**/ ?>