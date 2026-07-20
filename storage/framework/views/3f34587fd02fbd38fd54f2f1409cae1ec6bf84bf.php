<div class="bread-crumb-block">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="#" style="pointer-events: none;"><?php echo e(@Helper::language('contact_us')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if(Request::route()->getName()=='headOffice'): ?>
                    <?php echo e(@Helper::language('head_office')); ?>

                    <?php elseif(Request::route()->getName()=='orderByPhone'): ?>
                    <?php echo e(@Helper::language('order_by_phone')); ?>

                    <?php elseif(Request::route()->getName()=='tradeEnquieries'): ?>
                    <?php echo e(@Helper::language('trade_enquiries')); ?>

                    <?php elseif(Request::route()->getName()=='pressEnquieries'): ?>
                    <?php echo e(@Helper::language('press_enquiries')); ?>

                    <?php endif; ?>    
                </li>
            </ul>
        </nav>
    </div>
</div><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/contact_us/breadcrumb.blade.php ENDPATH**/ ?>