<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Wishlist</h1>

        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">My Wishlist</a></li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make('product._index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div>
                    <?php echo $getProducts->appends(Illuminate\Support\Facades\Request::except('page'))->links(); ?>

                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/product/my_wishlist.blade.php ENDPATH**/ ?>