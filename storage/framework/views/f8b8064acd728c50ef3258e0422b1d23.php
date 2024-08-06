<div class="products mb-3">
    <div class="row justify-content-center">

        <?php $__currentLoopData = $getProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $getProductImage = $product->getSingleImage($product->id);
            ?>
            <div class="col-12 <?php if(!empty($is_home)): ?> col-md-3 col-lg-3 <?php else: ?> col-md-4 col-lg-4 <?php endif; ?>">
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <a href="<?php echo e(url($product->slug)); ?>">
                            <?php if(!empty($getProductImage) && !empty($getProductImage->getUploadedImage())): ?>
                                <img style="height:280px;width:100%;object-fit:cover;"
                                    src="<?php echo e($getProductImage->getUploadedImage()); ?>"
                                    alt="<?php echo e($product->title); ?>" class="product-image">
                            <?php endif; ?>
                        </a>

                        <div class="product-action-vertical">
                            <?php if(!empty(Auth::check())): ?>
                            <a href="javascript:;" id="<?php echo e($product->id); ?>" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist<?php echo e($product->id); ?>

                                <?php echo e((!empty($product->checkWishlist($product->id) )) ? 'btn-wishlist-add' : ''); ?>

                                " title="Wishlist"><span>Add to Wishlist</span></a>

                            <?php else: ?>
                            <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>Add to Wishlist</span></a>
                            <?php endif; ?>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a
                                href="<?php echo e(url($product->category_slug . '/' . $product->sub_category_slug)); ?>"><?php echo e($product->sub_category_name); ?></a>
                        </div>
                        <h3 class="product-title"><a
                                href="<?php echo e(url($product->slug)); ?>"><?php echo e($product->title); ?></a>
                        </h3>
                        <div class="product-price">
                            $<?php echo e(number_format($product->price, 2)); ?>

                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width:<?php echo e($product->getReviewRating($product->id)); ?>%;"></div>
                            </div>
                            <span class="ratings-text">( <?php echo e($product->getTotalReview()); ?> Reviews )</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/product/_index.blade.php ENDPATH**/ ?>