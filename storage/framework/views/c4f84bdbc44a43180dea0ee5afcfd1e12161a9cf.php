
<?php $__env->startSection('title',Helper::language('customer_support')); ?>
<?php $__env->startSection('content'); ?>

 <!-- Customer Support -->
 <section class="customer-support py-60">
    <div class="container">
        <div class="customer-support-title">
            <h2 class="text-center"><?php echo e(@Helper::language('customer_support')); ?></h2>
            <p class="grey-text"><?php echo e(@Helper::language('customer_support_content')); ?></p>
        </div>
        <div class="common-card">
            <div class="row customer-support-row">
                <div class="col-lg-4 col-sm-6 customer-support-col">
                    <div class="customer-support-block">
                        <h5 class="mb-12"><?php echo e(@Str::upper(Helper::language('help_and_support'))); ?></h5>
                        <ul class="customer-support-links">
                            <li><a href="<?php echo e(route('trackOrder')); ?>"><?php echo e(@Helper::language('track_your_order')); ?></a></li>
                            <li><a href="<?php echo e(route('faqs')); ?>"><?php echo e(@Helper::language('faqs')); ?></a></li>
                            <li><a href="<?php echo e(route('queries')); ?>"><?php echo e(@Helper::language('Queries')); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 customer-support-col">
                    <div class="customer-support-block">                    
                        <h5 class="mb-12"><?php echo e(@Str::upper(Helper::language('delivery_and_returns'))); ?></h5>
                        <ul class="customer-support-links">
                            <li><a href="<?php echo e(route('deliveryInformation')); ?>"><?php echo e(@Helper::language('delivery_information')); ?></a></li>
                            <li><a href="<?php echo e(route('returnsCancellation')); ?>"><?php echo e(@Helper::language('returns_and_cancellation')); ?></a></li>
                            <li><a href="<?php echo e(route('damagesWrongGoods')); ?>"><?php echo e(@Helper::language('damages_and_wrong_goods')); ?></a></li>
                            <li><a href="<?php echo e(route('ourPackaging')); ?>"><?php echo e(@Helper::language('our_packaging')); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 customer-support-col">
                    <div class="customer-support-block">                    
                        <h5 class="mb-12"><?php echo e(@Str::upper(Helper::language('contact_us'))); ?></h5>
                        <ul class="customer-support-links">
                            <li><a href="<?php echo e(route('headOffice')); ?>"><?php echo e(@Helper::language('head_office')); ?></a></li>
                            <li><a href="<?php echo e(route('orderByPhone')); ?>"><?php echo e(@Helper::language('order_by_phone')); ?></a></li>
                            <li><a href="<?php echo e(route('tradeEnquieries')); ?>"><?php echo e(@Helper::language('trade_enquiries')); ?></a></li>
                            <li><a href="<?php echo e(route('pressEnquieries')); ?>"><?php echo e(@Helper::language('press_enquiries')); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 customer-support-col">
                    <div class="customer-support-block">                    
                        <h5 class="mb-12"><?php echo e(@Str::upper(Helper::language('our_shops'))); ?></h5>
                        <ul class="customer-support-links">
                            <li><a href="<?php echo e(route('ourStore')); ?>"><?php echo e(@Helper::language('great_portland_street_shop')); ?></a></li>
                            <li><a href="<?php echo e(route('ourStore')); ?>"><?php echo e(@Helper::language('covent_garden_shop')); ?></a></li>
                            <li><a href="<?php echo e(route('ourStore')); ?>"><?php echo e(@Helper::language('london_bridge_shop')); ?></a></li>
                            <li><a href="<?php echo e(route('ourStore')); ?>"><?php echo e(@Helper::language('senchi_street')); ?></a></li>
                            <li><a href="<?php echo e(route('ourStore')); ?>"><?php echo e(@Helper::language('near_kfc')); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 customer-support-col">
                    <div class="customer-support-block">                    
                        <h5 class="mb-12"><?php echo e(@Str::upper(Helper::language('shopping_with_us'))); ?></h5>
                        <ul class="customer-support-links">
                            <li><a href="<?php echo e(route('paymentOption')); ?>"><?php echo e(@Helper::language('payment_options')); ?></a></li>
                            <li><a href="<?php echo e(route('placingOrder')); ?>"><?php echo e(@Helper::language('placing_your_order')); ?></a></li>
                            <li><a href="<?php echo e(route('securityPrivacy')); ?>"><?php echo e(@Helper::language('security_privacy')); ?></a></li>
                            <li><a href="<?php echo e(route('termsCondition')); ?>"><?php echo e(@Helper::language('terms_condition')); ?></a></li>                                
                            <li><a href="<?php echo e(route('frontend.blog')); ?>"><?php echo e(@Helper::language('lj_blog')); ?></a></li>                                
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 customer-support-col">
                    <div class="customer-support-block">                    
                        <h5 class="mb-12"><?php echo e(@Str::upper(Helper::language('about_us'))); ?></h5>
                        <ul class="customer-support-links">
                            <li><a href="<?php echo e(route('ourCompany')); ?>"><?php echo e(@Helper::language('our_company')); ?></a></li>
                            <li><a href="<?php echo e(route('ourHistory')); ?>"><?php echo e(@Helper::language('our_history')); ?></a></li>
                            <li><a href="<?php echo e(route('responsibleDrinking')); ?>"><?php echo e(@Helper::language('responsible_drinking')); ?></a></li>
                            <li><a href="<?php echo e(route('ourStore')); ?>"><?php echo e(@Helper::language('shops')); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/customer_support.blade.php ENDPATH**/ ?>