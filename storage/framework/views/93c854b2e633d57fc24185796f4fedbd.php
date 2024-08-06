<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders List (Total : <?php echo e($getRecord->total()); ?>)</h1>
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
                                    <h3 class="card-title">Orders Search</h3>
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
                                                <label>Company Name</label>
                                                <input type="text" name="company_name" placeholder="Company Name" class="form-control" value="<?php echo e(Request::get('company_name')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" placeholder="First Name" class="form-control" value="<?php echo e(Request::get('first_name')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="<?php echo e(Request::get('last_name')); ?>">
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
                                                <label>PostalCode</label>
                                                <input type="text" name="postalcode" placeholder="PostalCode" class="form-control" value="<?php echo e(Request::get('postalcode')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country" placeholder="Country" class="form-control" value="<?php echo e(Request::get('country')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" placeholder="State" class="form-control" value="<?php echo e(Request::get('state')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" placeholder="City" class="form-control" value="<?php echo e(Request::get('city')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>From Date</label>
                                                <input type="date" style="padding: 6px;" name="from_date" class="form-control" value="<?php echo e(Request::get('from_date')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>To Date</label>
                                                <input type="date"  style="padding: 6px;" name="to_date" class="form-control" value="<?php echo e(Request::get('to_date')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button  class="btn "style="background: #0084D1;color:#fff">Search</button>
                                            <a href ="<?php echo e(url('admin/order/list')); ?>" class="btn" style="background: #5CC6FF;color:#fff">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow:auto;">
                                <table class="table table-striped" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Number</th>
                                            <th>Name</th>
                                            <th>Company Name</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Postalcode</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Total Amount($)</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($value->id); ?></td>
                                                <td><?php echo e($value->order_number); ?></td>
                                                <td><?php echo e($value->first_name); ?> <?php echo e($value->last_name); ?></td>
                                                <td><?php echo e($value->company_name); ?></td>
                                                <td><?php echo e($value->country); ?></td>
                                                <td><?php echo e($value->address_one); ?><br/> <?php echo e($value->address_two); ?></td>
                                                <td><?php echo e($value->city); ?></td>
                                                <td><?php echo e($value->state); ?></td>
                                                <td><?php echo e($value->postalcode); ?></td>
                                                <td><?php echo e($value->phone); ?></td>
                                                <td><?php echo e($value->email); ?></td>
                                                <td><?php echo e(number_format($value->total_amount,2)); ?></td>
                                                <td>
                                                    <select class="form-control ChangeStatus" id="<?php echo e($value->id); ?>" style="width:100px;">
                                                        <option  <?php echo e(($value->status == 0) ? 'selected' : ''); ?> value="0">Pending</option>
                                                        <option  <?php echo e(($value->status == 1) ? 'selected' : ''); ?> value="1">In Progress</option>
                                                        <option  <?php echo e(($value->status == 2) ? 'selected' : ''); ?> value="2">Delivered</option>
                                                        <option  <?php echo e(($value->status == 3) ? 'selected' : ''); ?> value="3">Completed</option>
                                                        <option  <?php echo e(($value->status == 4) ? 'selected' : ''); ?> value="4">Cancelled</option>
                                                    </select>
                                                </td>
                                                <td><?php echo e(date('d-m-Y h:i A', strtotime($value->created_at))); ?></td>
                                                <td>
                                                    <a href='<?php echo e(url('admin/order/detail/' . $value->id)); ?>'
                                                        class="btn btn-sm" style="background: #CD9A6A;color:#fff">Detail</a>
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
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

    $('body').delegate('.ChangeStatus' , 'change' , function(){
        var status = $(this).val();
        var order_id = $(this).attr('id');

        $.ajax({
                type : "GET" ,
                url  : "<?php echo e(url('/admin/order_status/')); ?>",
                data : {

                    status : status,
                    order_id : order_id
                },
                dataType : "json",
                success  : function(data){
                    alert(data.message);
                },
                error : function(data){
                    alert(data.message);
                }
            });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/order/index.blade.php ENDPATH**/ ?>