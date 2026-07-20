
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="thank-you py-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-12">
                    <div class="thank-you-block">
                        <span class="thank-you-image">
                            <img src="<?php echo e(asset('assets/frontend/images/check-yellow.gif')); ?>" alt="check gif">
                        </span>
                        <h1><?php echo e(@Helper::language('thank_you')); ?></h1>
                        <h6><?php echo e(@Helper::language('thank_you_title')); ?> <?php if(isset($orderData)): ?>
                                <?php echo e($orderData->order_id); ?>

                            <?php endif; ?>
                        </h6>

                        <?php if(isset($earnedpoints) && $earnedpoints > 0 && isset($orderData->user) && !$orderData->user->is_guest_user): ?>
                            <div class="reward-message mt-4 mb-4 p-4 text-center rounded shadow-sm" style="background: #fff8e1; border-left: 6px solid #fbc02d;">
                                <h5 class="mb-2" style="color: #f57f17;">🎉 You've earned <strong><?php echo e($earnedpoints); ?></strong> reward points!</h5>
                                <p class="mb-0" style="color: #5d4037;">
                                    You can redeem these points on your next purchase for discounts, cash value, or other exciting rewards. 
                                    Keep shopping and keep earning!
                                </p>
                            </div>
                        <?php endif; ?>

                        <p><?php echo e(@Helper::language('thank_you_content')); ?></p>
                        <?php if(isset($orderData->user) && $orderData->user->is_guest_user == '1'): ?>
                            <div class="guest-register-message mt-4 mb-4 p-4 text-center rounded shadow-sm" style="background: #e3f2fd; border-left: 6px solid #1976d2;">
                                <h5 class="mb-2" style="color: #1976d2;">Want to track your orders and earn rewards?</h5>
                                <p class="mb-3" style="color: #333;">Register now to unlock full account benefits, track your order history, and earn reward points on every purchase!</p>
                                <a href="<?php echo e(route('websiteregister')); ?>" class="solid-button" style="margin-bottom:10px;">Register Now</a>
                                <br>
                                <a href="<?php echo e(route('trackOrder')); ?>" class="solid-button" style="margin-bottom:10px;">Track Your Order</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/checkout/order-success.blade.php ENDPATH**/ ?>