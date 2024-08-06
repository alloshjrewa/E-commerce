<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..."
                required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <?php
                    $getCategoryMobile = App\models\Category::getMenuRecord();
                ?>
                <?php $__currentLoopData = $getCategoryMobile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_mobile_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($value_mobile_category->getSubCategory->count())): ?>
                        <li>
                            <a href="<?php echo e(url($value_mobile_category->slug)); ?>"><?php echo e($value_mobile_category->name); ?></a>
                            <ul>
                                <?php $__currentLoopData = $value_mobile_category->getSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_m_sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a
                                            href="<?php echo e(url($value_mobile_category->slug . '/' . $value_m_sub_category->slug)); ?>"><?php echo e($value_m_sub_category->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/layouts/mobile_menu.blade.php ENDPATH**/ ?>