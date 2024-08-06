<?php $__env->startSection('content'); ?>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($getPage->title); ?></li>
            </ol>
        </div>
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('<?php echo e($getPage->getImage()); ?>')">
            <h1 class="page-title text-white"><?php echo e($getPage->title); ?></h1>
        </div><!-- End .page-header -->
    </div>

    <div class="page-content pb-0">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <?php echo $getPage->description; ?>

                    <div class="row">
                        <div class="col-sm-7">
                            <div class="contact-info">


                                <ul class="contact-list">
                                    <?php if(!empty($getSystemSettingApp->address  )): ?>
                                    <li>
                                        <i class="icon-map-marker"></i>
                                        <?php echo e($getSystemSettingApp->address); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($getSystemSettingApp->phone  )): ?>
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:<?php echo e($getSystemSettingApp->phone); ?>"><?php echo e($getSystemSettingApp->phone); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($getSystemSettingApp->phone_two  )): ?>
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:<?php echo e($getSystemSettingApp->phone_two); ?>"><?php echo e($getSystemSettingApp->phone_two); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($getSystemSettingApp->email  )): ?>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:<?php echo e($getSystemSettingApp->email); ?>"><?php echo e($getSystemSettingApp->email); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($getSystemSettingApp->email_two  )): ?>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:<?php echo e($getSystemSettingApp->email_two); ?>"><?php echo e($getSystemSettingApp->email_two); ?></a>
                                    </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="contact-info">

                                <ul class="contact-list">
                                    <?php if(!empty($getSystemSettingApp->email_two  )): ?>
                                    <li>
                                        <i class="icon-clock-o"></i>
                                        <?php echo $getSystemSettingApp->working_hour; ?>

                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <i class="icon-calendar"></i>
                                        <span class="text-dark">Sunday</span> <br>11am-6pm ET
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <h2 class="title mb-1">Got Any Questions?</h2>
                    <p class="mb-2">Use the form below to get in touch with the sales team</p>
                    <div style="padding-top: 10px;padding-bottom: 10px;">
                        <?php echo $__env->make('layouts._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <form action="" class="contact-form mb-3" method="post" autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cname" class="sr-only">Name</label>
                                <input type="text" class="form-control" name="name" id="cname" placeholder="Name *" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="cemail" class="sr-only">Email</label>
                                <input type="email" class="form-control" name="email" id="cemail" placeholder="Email *" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cphone" class="sr-only">Phone</label>
                                <input type="tel" class="form-control" name="phone" id="cphone" placeholder="Phone">
                            </div>

                            <div class="col-sm-6">
                                <label for="csubject" class="sr-only">Subject</label>
                                <input type="text" class="form-control" name="subject" id="csubject" placeholder="Subject" required>
                            </div>
                        </div>

                        <label for="cmessage" class="sr-only">Message</label>
                        <textarea class="form-control" cols="30" rows="4" name="message" id="cmessage" required placeholder="Message *"></textarea>

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="verification" ><?php echo e($first_number); ?> + <?php echo e($second_number); ?> = ?</label>
                                <input type="text" class="form-control" name="verification" id="verification" placeholder="Verification Sum" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                            <span>SUBMIT</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/page/contact.blade.php ENDPATH**/ ?>