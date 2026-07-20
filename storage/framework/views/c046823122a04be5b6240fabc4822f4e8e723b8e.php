<div class="bread-crumb-block">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="#" style="pointer-events: none;"><?php echo e(@Helper::language('help_and_support')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if(Request::route()->getName()=='trackOrder'): ?>
                    <?php echo e(@Helper::language('track_your_order')); ?>

                    <?php elseif(Request::route()->getName()=='faqs'): ?>
                    <?php echo e(@Helper::language('faqs')); ?>

                    <?php elseif(Request::route()->getName()=='queries'): ?>
                    <?php echo e(@Helper::language('Queries')); ?>

                    <?php endif; ?>    
                </li>
            </ul>
        </nav>
    </div>
</div><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/help_and_support/breadcrumb.blade.php ENDPATH**/ ?>