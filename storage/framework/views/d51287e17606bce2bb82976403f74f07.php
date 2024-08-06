<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e(!empty($header_title) ? $header_title : ''); ?> - Ecommerce </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo e(url('public/assets/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('public/assets/dist/css/adminlte.min.css')); ?>">

  <?php echo $__env->yieldContent('style'); ?>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

<!-- jQuery -->
<script src="<?php echo e(url('public/assets/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE -->
<script src="<?php echo e(url('public/assets/dist/js/adminlte.js')); ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo e(url('public/assets/plugins/chart.js/Chart.min.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>