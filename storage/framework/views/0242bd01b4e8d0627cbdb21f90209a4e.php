<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div>

    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div>

    </nav>

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <?php echo $__env->make('layouts._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(!empty(Cart::getContent()->count())): ?>
                <div class="row">
                    <div class="col-lg-9">
                        <form action="<?php echo e(url('update_cart')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = \Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $getCartProudct = App\Models\Product::getSingle($cart->id);
                                        ?>

                                        <?php if(!empty($getCartProudct)): ?>
                                        <?php
                                            $getProductImage = $getCartProudct->getSingleImage($getCartProudct->id);
                                        ?>
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="<?php echo e(url($getCartProudct->slug)); ?>">
                                                        <img src="<?php echo e($getProductImage->getUploadedImage()); ?>" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="<?php echo e(url($getCartProudct->slug)); ?>"><?php echo e($getCartProudct->title); ?></a>
                                                </h3>
                                            </div>

                                        </td>
                                        <td class="price-col">$<?php echo e(number_format($cart->price , 2)); ?></td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">

                                                <input type="number" class="form-control" value="<?php echo e($cart->quantity); ?>" min="1" max="100" name=cart[<?php echo e($key); ?>][qty] step="1" data-decimals="0" required>
                                                <input type="hidden" value="<?php echo e($cart->id); ?>" name=cart[<?php echo e($key); ?>][id] >

                                            </div>

                                        </td>
                                        <td class="total-col">$<?php echo e(number_format($cart->price *  $cart->quantity , 2)); ?></td>
                                        <td class="remove-col"><a href="<?php echo e(url('cart/delete/'.$cart->id)); ?>"class="btn-remove"><i class="icon-close"></i></a></td>
                                    </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="cart-bottom">

                                <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
                            </div>
                        </form>
                    </div>
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3>

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>$<?php echo e(number_format(\Cart::getSubTotal() , 2)); ?></td>
                                    </tr>

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>$<?php echo e(number_format(\Cart::getSubTotal() , 2)); ?></td>
                                    </tr>
                                    <!-- End .summary-total -->
                                </tbody>
                            </table>
                            <!-- End .table table-summary -->

                            <a href="<?php echo e(url('checkout')); ?>" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div>
                        <!-- End .summary -->

                        <a href="<?php echo e(url('')); ?>" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside>
                    <!-- End .col-lg-3 -->
                </div>
                <?php else: ?>
                    <p>Cart Is Empty!</p>
                <?php endif; ?>

            </div>

        </div>

    </div>

</main>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/payment/cart.blade.php ENDPATH**/ ?>