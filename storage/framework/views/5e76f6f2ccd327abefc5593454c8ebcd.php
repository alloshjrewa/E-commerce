<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Checkout<span>Shop</span></h1>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div>
                <!-- End .container -->
            </nav>
            <!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="checkout">
                    <div class="container">

                        <form action="" id="submitForm" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-9">
                                    <h2 class="checkout-title">Billing Details</h2>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" name="first_name" value="<?php echo e(!empty(Auth::user()->name) ? Auth::user()->name : ''); ?>" class="form-control" required>
                                        </div>


                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" name="last_name"  value="<?php echo e(!empty(Auth::user()->last_name) ? Auth::user()->last_name : ''); ?>" class="form-control" required>
                                        </div>

                                    </div>

                                    <label>Company Name (Optional)</label>
                                    <input type="text" name="company_name"  value="<?php echo e(!empty(Auth::user()->company_name) ? Auth::user()->company_name : ''); ?>" class="form-control">

                                    <label>Country *</label>
                                    <input type="text" name="country"  value="<?php echo e(!empty(Auth::user()->country) ? Auth::user()->country : ''); ?>" class="form-control" required>

                                    <label>Street address *</label>
                                    <input type="text" name="address_one" value="<?php echo e(!empty(Auth::user()->address_one) ? Auth::user()->address_one : ''); ?>" class="form-control" placeholder="House number and Street name" required>
                                    <input type="text" name="address_two" value="<?php echo e(!empty(Auth::user()->address_two) ? Auth::user()->address_two : ''); ?>" class="form-control" placeholder="Appartments, suite, unit etc ..." >

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Town / City *</label>
                                            <input type="text" name="city" value="<?php echo e(!empty(Auth::user()->city) ? Auth::user()->city : ''); ?>" class="form-control" required>
                                        </div>


                                        <div class="col-sm-6">
                                            <label>State *</label>
                                            <input type="text" name="state" value="<?php echo e(!empty(Auth::user()->state) ? Auth::user()->state : ''); ?>" class="form-control" required>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postcode / ZIP *</label>
                                            <input type="text" name="postalcode" value="<?php echo e(!empty(Auth::user()->postalcode) ? Auth::user()->postalcode : ''); ?>" class="form-control" required>
                                        </div>


                                        <div class="col-sm-6">
                                            <label>Phone *</label>
                                            <input type="tel" name="phone" value="<?php echo e(!empty(Auth::user()->phone) ? Auth::user()->phone : ''); ?>" class="form-control" required>
                                        </div>

                                    </div>

                                    <?php if(empty(Auth::check())): ?>
                                    <label>Email address *</label>
                                    <input type="email" name="email" class="form-control" required >
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="is_create" class="custom-control-input createAccount" id="checkout-create-acc">
                                            <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                        </div>

                                        <div id="showPassword" style="display: none">
                                            <label>Password *</label>
                                            <input type="text" id="inputPassword" name="password" class="form-control">
                                        </div>
                                    <?php else: ?>
                                    <div>
                                        <input type="hidden" name="email" class="form-control" value="<?php echo e(Auth::user()->email); ?>">
                                    </div>
                                    <?php endif; ?>
                                    <label>Order notes (optional)</label>
                                    <textarea class="form-control" cols="30" rows="4" name="note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                </div>
                                <aside class="col-lg-3">
                                    <div class="summary">
                                        <h3 class="summary-title">Your Order</h3>

                                        <table class="table table-summary">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $__currentLoopData = \Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                    $getCartProudct = App\Models\Product::getSingle($cart->id);
                                                    ?>
                                                <tr>
                                                    <td><a href="<?php echo e(url($getCartProudct->slug)); ?>"><?php echo e($getCartProudct->title); ?></a></td>
                                                    <td class="total-col">$<?php echo e(number_format($cart->price *  $cart->quantity , 2)); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>$<?php echo e(number_format(\Cart::getSubTotal() , 2)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                    <div class="cart-discount">

                                                        <div class="input-group">
                                                            <input type="text" id="getDiscountCode" name="discount_code" class="form-control" placeholder="Discount code">
                                                            <div class="input-group-append">
                                                                <button id="ApplyDiscount" style="height:38px;" type="button" class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Discount:</td>
                                                    <td>$<span id="getDiscountAmount">0.00</span></td>
                                                </tr>
                                                <tr class="summary-shipping">
                                                    <td>Shipping:</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <?php $__currentLoopData = $getShipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <tr class="summary-shipping-row">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" value="<?php echo e($shipping->id); ?>" required data-price="<?php echo e(!empty($shipping->price) ? $shipping->price : '0'); ?>" id="free-shipping<?php echo e($shipping->id); ?>" name="shipping" class="custom-control-input getShippingCharge">
                                                                <label class="custom-control-label" for="free-shipping<?php echo e($shipping->id); ?>"><?php echo e($shipping->name); ?></label>
                                                            </div>

                                                        </td>
                                                        <?php if(!empty($shipping->price)): ?>
                                                        <td>$<?php echo e(number_format($shipping->price,2)); ?></td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="summary-total">
                                                    <td>
                                                        Total:</td>
                                                    <td>$<span id="getPaymentTotalafterdiscount"><?php echo e(number_format(\Cart::getSubTotal() , 2)); ?></span></td>
                                                </tr>

                                                <!-- End .summary-total -->
                                            </tbody>
                                        </table>
                                        <input type="hidden" id="paymentTotal" value="<?php echo e(\Cart::getSubTotal()); ?>"  />
                                        <input type="hidden" id="getShippingChargeTotal" value="0"/>
                                        <!-- End .table table-summary -->

                                        <div class="accordion-summary" id="accordion-payment">

                                            <div class="card">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" required value="cash" id="Cashondelivery" name="payment_method" class="custom-control-input">
                                                    <label class="custom-control-label" for="Cashondelivery">Cash on delivery</label>
                                                </div>
                                                <div class="custom-control custom-radio" style="margin-top:0px">
                                                    <input type="radio" required  value="paypal" id="PayPal" name="payment_method" class="custom-control-input">
                                                    <label class="custom-control-label" for="PayPal">PayPal</label>
                                                </div>

                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
		                				</button>
                                        <br><br>
                                        <img src="<?php echo e(url('assets/images/payments-summary.png')); ?>" alt="payments cards">
                                    </div>
                                </aside>
                                <!-- End .col-lg-3 -->
                            </div>
                        </form>
                    </div>
                    <!-- End .container -->
                </div>
                <!-- End .checkout -->
            </div>
            <!-- End .page-content -->
    </main>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">

$('body').delegate('.createAccount' , 'change', function(){
    if(this.checked){
        $('#showPassword').show();
        $('#inputPassword').prop('required' ,true);
    }
    else{
        $('#showPassword').hide();
        $('#inputPassword').prop('required' ,false);
    }
});

$('body').delegate('.getShippingCharge' , 'change', function(){
    var price = $(this).attr('data-price');
    var total = $('#paymentTotal').val();
    $('#getShippingChargeTotal').val(price);
    var final_total = parseFloat(price) + parseFloat(total);
    $('#getPaymentTotalafterdiscount').html(final_total.toFixed(2));
});

$('body').delegate('#submitForm' , 'submit', function(e)
{
    e.preventDefault();
    $.ajax({
        type : "POST",
        url  : "<?php echo e(url('checkout/place_order')); ?>",
        data : new FormData(this),
        processData : false ,
        contentType : false ,
        dataType : "json",
        success : function(data){
            if(data.status == false){
                alert(data.message);
            }
            else{
              window.location.href = data.redirect;
            }
        },
        error   : function(data){},
    });
});

$('body').delegate('#ApplyDiscount' , 'click', function(){
    var discount_code = $('#getDiscountCode').val();

    $.ajax({
        type : "POST",
        url  : "<?php echo e(url('checkout/applay_discount_code')); ?>",
        data : {

            discount_code : discount_code,
            "_token"        : "<?php echo e(csrf_token()); ?>"
        },
        dataType : "json",
        success : function(data){
            $('#getDiscountAmount').html(data.discount_amount);
            var shipping = $('#getShippingChargeTotal').val();
            if((data.payment_total - data.discount_amount) <= 0){
                data.payment_total = 0
            }
            var final_total = parseFloat(shipping) + parseFloat(data.payment_total);


            $('#getPaymentTotalafterdiscount').html(final_total.toFixed(2));
            $('#paymentTotal').val(data.payment_total);

            if(data.status == false){
                alert(data.message);
            }
        },
        error   : function(data){},
    });
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/payment/checkout.blade.php ENDPATH**/ ?>