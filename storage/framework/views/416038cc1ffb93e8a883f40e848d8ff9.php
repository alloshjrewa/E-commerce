<?php $__env->startSection('style'); ?>
<style type="text/css">
    .form-group{
        margin-bottom:2px;
    }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Order Detail</h1>
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
                            <div >
                                <div class="form-group">
                                    <label>ID : <span style="font-weight: normal"><?php echo e($getRecord->order_number); ?></span></label>
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
                                    <label>Status :
                                        <span style="font-weight: normal"><?php if($getRecord->status == 0): ?>
                                            pending
                                            <?php elseif($getRecord->status ==1): ?>
                                            In Progress
                                            <?php elseif($getRecord->status ==2): ?>
                                            Delivered
                                            <?php elseif($getRecord->status ==3): ?>
                                            Completed
                                            <?php elseif($getRecord->status ==4): ?>
                                            Cancelled
                                            <?php endif; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Note :<span style="font-weight: normal"><?php echo e($getRecord->note); ?> </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Created Date : <span style="font-weight: normal"><?php echo e(date('d-m-Y h:i A', strtotime($getRecord->created_at))); ?></span></label>
                                </div>

                            </div>
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Product Detail</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0 " style="overflow: auto">
                                    <table class="table table-striped" >
                                        <thead>
                                            <tr>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Product Name</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Size Amount ($)</th>
                                                <th class="text-center">Total Amount ($)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $getRecord->getItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $getProductImage = $item->getProduct->getSingleImage($item->getProduct->id);
                                                ?>
                                            <tr>
                                                <td><img style="width:100px;height:100px" src="<?php echo e($getProductImage->getUploadedImage()); ?>"></td>
                                                <td class="text-center" style="max-width:250px"><a target="_blank" href="<?php echo e(url($item->getProduct->slug)); ?>"><?php echo e($item->getProduct->title); ?></a>
                                                    <br>
                                                    <?php if(!empty( $item->color_name)): ?>
                                                    <b>Color Name :</b> <?php echo e($item->color_name); ?> <br>
                                                    <?php endif; ?>
                                                    <?php if(!empty($item->size_name)): ?>
                                                    <b>Size Name :</b> <?php echo e($item->size_name); ?>

                                                    <br>
                                                    <?php endif; ?>

                                                    <?php if($getRecord->status ==3): ?>
                                                        <?php
                                                            $getReview = $item->getReview($item->getProduct->id,$getRecord->id);
                                                        ?>
                                                    <?php if(!empty($getReview)): ?>
                                                        <b>Rating :</b> <?php echo e($getReview->rating); ?> <br>
                                                        <b>Review :</b> <?php echo e($getReview->review); ?> <br>
                                                    <?php else: ?>
                                                    <button class="btn btn-primary MakeReview" id=<?php echo e($item->getProduct->id); ?> data-order="<?php echo e($getRecord->id); ?>">Make Review</button>

                                                    <?php endif; ?>

                                                <?php endif; ?>
                                                </td>
                                                <td class="text-center"><?php echo e($item->quantity); ?></td>
                                                <td class="text-center"><?php echo e($item->price); ?></td>
                                                <td class="text-center"><?php echo e(number_format($item->size_price,2)); ?></td>
                                                <td class="text-center"><?php echo e(number_format($item->total_price,2)); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="MakeReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?php echo e(url('user/make-review')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" required id="getProductId" name="product_id">
            <input type="hidden" required id="getOrderId" name="order_id">
            <div class="modal-body" style="padding: 20px">
                <div class="form-group" style="margin-bottom:15px">
                    <label>How Many Rating *</label>
                    <select class="form-control" name="rating" required>
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Review *</label>
                    <textarea class="form-control" required name="review"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $('body').delegate('.MakeReview' , 'click' , function () {
            var product_id = $(this).attr('id');
            var order_id = $(this).attr('data-order');
            console.log(order_id);
            $('#getProductId').val(product_id);
            $('#getOrderId').val(order_id);
            $('#MakeReviewModal').modal('show');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/user/order_detail.blade.php ENDPATH**/ ?>