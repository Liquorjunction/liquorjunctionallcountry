<ul class="contact-sidebar">
    <li class="sidebar-item">
        <a href="<?php echo e(route('paymentOption')); ?>" class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['paymentOption']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('payment_options')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('placingOrder')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['placingOrder']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('placing_your_order')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('securityPrivacy')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['securityPrivacy']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('security_privacy')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('termsCondition')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['termsCondition']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('terms_condition')); ?></a>
    </li>
</ul><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/shopping_with_us/sidebar.blade.php ENDPATH**/ ?>