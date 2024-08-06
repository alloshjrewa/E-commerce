<?php $__env->startSection('content'); ?>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($getPage->title); ?></li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('<?php echo e($getPage->getImage()); ?>')">
            <h1 class="page-title text-white"> <?php echo e($getPage->title); ?></h1>
        </div>
    </div>

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    <?php echo $getPage->description; ?>

                </div>
            </div>

            <div class="mb-5"></div>

    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/page/shipping.blade.php ENDPATH**/ ?>