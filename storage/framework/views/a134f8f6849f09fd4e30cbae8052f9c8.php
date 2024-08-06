<aside class="col-md-4 col-lg-3">
    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
        <li class="nav-item">
            <a href="<?php echo e(url('user/dashboard')); ?>"class="nav-link <?php if(Request::segment(2) == 'dashboard'): ?> active <?php endif; ?>">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(url('user/orders')); ?>"class="nav-link <?php if(Request::segment(2) == 'orders'): ?> active <?php endif; ?> ">Orders</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(url('user/edit-profile')); ?>"class="nav-link <?php if(Request::segment(2) == 'edit-profile'): ?> active <?php endif; ?> ">Edit Profile</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(url('user/change-password')); ?>"class="nav-link <?php if(Request::segment(2) == 'change-password'): ?> active <?php endif; ?> ">Change password</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(url('admin/logout')); ?>"class="nav-link ">LogOut</a>
        </li>

    </ul>
</aside><!-- End .col-lg-3 -->
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/user/_sidebar.blade.php ENDPATH**/ ?>