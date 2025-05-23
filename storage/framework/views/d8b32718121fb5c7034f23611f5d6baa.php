<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="<?php echo e(url('public/assets/dist/img/user1-128x128.jpg')); ?>" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="<?php echo e(url('public/assets/dist/img/user8-128x128.jpg')); ?>" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="<?php echo e(url('public/assets/dist/img/user3-128x128.jpg')); ?>" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="text-align: center">
        <span class="brand-text font-weight-bold">Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(url('public/assets/dist/img/user2-160x160.jpg')); ?>" alt="User Image"
                    class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo e(url('admin/dashboard')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'dashboard'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/admin/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'admin'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/customer/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'customer'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/order/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'order'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/category/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'category'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/sub_category/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'sub_category'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Sub Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/brand/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'brand'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Brand
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/color/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'color'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Color
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/product/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'product'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/discount_code/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'discount_code'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Discount Code
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/shipping_charge/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'shipping_charge'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Shipping Charge
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/slider/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'slider'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/partner/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'partner'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Partner Logo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/contact-us')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'contact-us'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Contact Us
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/page/list')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'page'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Page
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/system-setting')); ?>"
                        class="nav-link <?php if(Request::segment(2) == 'system-setting'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            System Setting
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('admin/logout')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>