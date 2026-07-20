
<?php $__env->startSection('title',Helper::language('head_office')); ?>
<?php $__env->startSection('content'); ?>
<?php if(@$pageInfo->photo): ?>
<section class="title-banner" style="background-image: url(<?php echo e(asset('uploads/cms/' . $pageInfo->photo)); ?>); background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0"><?php echo e($pageInfo->page_name); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php echo $__env->make('frontend.cms.contact_us.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

<section class="contact pt-40 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="contact-sidebar-wrapper">
                    <h3><?php echo e(@Helper::language('contact_us')); ?></h3>
                    <?php echo $__env->make('frontend.cms.contact_us.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                    <div class="contact-inner">
                        <h3><?php echo e(@Helper::language('head_office')); ?></h3>
                        <div class="contact-inner-wrapper">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="contact-inner-list">
                                        <li>
                                            <?php 
                                                //  dd($WebmasterSetting);
                                            ?>
                                            <h5><?php echo e(@Helper::language('address_label')); ?></h5>
                                            <address class="title-two mb-0"><?php echo e($WebmasterSetting->address); ?></address>
                                        </li>
                                        <li>
                                            <h5><?php echo e(@Helper::language('phone')); ?></h5>
                                            <a href="tel:<?php echo e($WebmasterSetting->phone); ?>" class="title-two"><?php echo e($WebmasterSetting->phone); ?></a>
                                        </li>
                                        <li>
                                            <h5><?php echo e(@Helper::language('fax')); ?></h5>
                                            <a href="javascript:void(0)" class="title-two"><?php echo e($WebmasterSetting->fax); ?></a>
                                        </li>
                                        <li>
                                            <h5><?php echo e(@Helper::language('email_label')); ?></h5>
                                            <a href="mailto:<?php echo e($WebmasterSetting->email); ?>" class="title-two"><?php echo e($WebmasterSetting->email); ?></a>
                                        </li>
                                    </ul>                                        
                                </div>
                                <?php
                                // dd($WebmasterSetting->map_url);
                                ?>
                                <div class="col-lg-6">
                                    <div class="contact-inner-map">
                                        <iframe src="<?php echo e($WebmasterSetting->map_url); ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/contact_us/head_office.blade.php ENDPATH**/ ?>