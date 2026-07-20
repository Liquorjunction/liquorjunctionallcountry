<div class="bread-crumb-block">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
                <li class="breadcrumb-item"><a href="#" style="pointer-events: none;"><?php echo e(@Helper::language('shopping_with_us')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if(Request::route()->getName()=='paymentOption'): ?>
                    <?php echo e(@Helper::language('payment_options')); ?>

                    <?php elseif(Request::route()->getName()=='placingOrder'): ?>
                    <?php echo e(@Helper::language('placing_your_order')); ?>

                    <?php elseif(Request::route()->getName()=='termsCondition'): ?>
                   <?php echo e(@Helper::language('terms_condition')); ?>

                    <?php elseif(Request::route()->getName()=='securityPrivacy'): ?>
                    <?php echo e(@Helper::language('security_privacy')); ?>

                    <?php endif; ?> 
                </li>
            </ul>
        </nav>
    </div>
</div><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/shopping_with_us/breadcrumb.blade.php ENDPATH**/ ?>