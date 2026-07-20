<ul class="contact-sidebar">
    <li class="sidebar-item">
        <a href="<?php echo e(route('headOffice')); ?>" class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['headOffice']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('head_office')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('orderByPhone')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['orderByPhone']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('order_by_phone')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('tradeEnquieries')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['tradeEnquieries']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('trade_enquiries')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('pressEnquieries')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['pressEnquieries']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('press_enquiries')); ?></a>
    </li>
</ul><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/contact_us/sidebar.blade.php ENDPATH**/ ?>