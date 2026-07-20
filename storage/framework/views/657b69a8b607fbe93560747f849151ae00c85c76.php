<div class="bread-crumb-block">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
                <li class="breadcrumb-item"><a href="#" style="pointer-events: none;"><?php echo e(@Helper::language('delivery_and_returns')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if(Request::route()->getName()=='deliveryInformation'): ?>
                    <?php echo e(@Helper::language('delivery_information')); ?>

                    <?php elseif(Request::route()->getName()=='returnsCancellation'): ?>
                    <?php echo e(@Helper::language('returns_and_cancellation')); ?>

                    <?php elseif(Request::route()->getName()=='damagesWrongGoods'): ?>
                    <?php echo e(@Helper::language('damages_and_wrong_goods')); ?>

                    <?php elseif(Request::route()->getName()=='ourPackaging'): ?>
                    <?php echo e(@Helper::language('our_packaging')); ?>

                    <?php endif; ?> 
                </li>
            </ul>
        </nav>
    </div>
</div><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/delivery_and_returns/breadcrumb.blade.php ENDPATH**/ ?>