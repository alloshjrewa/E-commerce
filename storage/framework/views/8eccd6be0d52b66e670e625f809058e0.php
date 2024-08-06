<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="<?php echo e($getSystemSettingApp->getLogo()); ?>" class="footer-logo" alt="Footer Logo"
                            width="200" height="250">
                        <p><?php echo e($getSystemSettingApp->footer_description); ?></p>

                        <div class="social-icons">
                            <?php if(!empty($getSystemSettingApp->facebook_link)): ?>
                            <a href="<?php echo e($getSystemSettingApp->facebook_link); ?>" class="social-icon" title="Facebook" target="_blank"><i
                                    class="icon-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($getSystemSettingApp->twitter_link)): ?>
                            <a href="<?php echo e($getSystemSettingApp->twitter_link); ?>" class="social-icon" title="Twitter" target="_blank"><i
                                    class="icon-twitter"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($getSystemSettingApp->instagram_link)): ?>
                            <a href="<?php echo e($getSystemSettingApp->instagram_link); ?>" class="social-icon" title="Instagram" target="_blank"><i
                                    class="icon-instagram"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($getSystemSettingApp->youtube_link)): ?>
                            <a href="<?php echo e($getSystemSettingApp->youtube_link); ?>" class="social-icon" title="Youtube" target="_blank"><i
                                    class="icon-youtube"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($getSystemSettingApp->pinterest_link)): ?>
                            <a href="<?php echo e($getSystemSettingApp->pinterest_link); ?>" class="social-icon" title="Pinterest" target="_blank"><i
                                    class="icon-pinterest"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4>

                        <ul class="widget-list">
                            <li><a href="<?php echo e(url('')); ?>">Home</a></li>
                            <li><a href="<?php echo e(url('about')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
                            <li><a href="<?php echo e(url('contact')); ?>">Contact us</a></li>
                            <li><a href="#signin-modal" data-toggle="modal">Login</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>

                        <ul class="widget-list">
                            <li><a href="<?php echo e(url('payment-methods')); ?>">Payment Methods</a></li>
                            <li><a href="<?php echo e(url('money-back-guarantee')); ?>">Money-back guarantee!</a></li>
                            <li><a href="<?php echo e(url('returns')); ?>">Returns</a></li>
                            <li><a href="<?php echo e(url('shippings')); ?>">Shippings</a></li>
                            <li><a href="<?php echo e(url('terms-conditions')); ?>">Terms and conditions</a></li>
                            <li><a href="<?php echo e(url('privacy-policy')); ?>">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-list">
                            <li><a href="<?php echo e(url('cart')); ?>">View Cart</a></li>
                            <li><a href="<?php echo e(url('checkout')); ?>">Checkout</a></li>
                            <li><a href="#">Track My Order</a></li>

                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © <?php echo e(date('Y')); ?> <?php echo e($getSystemSettingApp->website_name); ?> All Rights Reserved.</p>
            <figure class="footer-payments">
                <img src="<?php echo e($getSystemSettingApp->getFooterPayment()); ?>" alt="Payment methods" width="272" height="20">
            </figure>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/layouts/footer.blade.php ENDPATH**/ ?>