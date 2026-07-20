<ul class="contact-sidebar">
    <li class="sidebar-item">
        <a href="<?php echo e(route('trackOrder')); ?>" class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['trackOrder']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('track_your_order')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('faqs')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['faqs']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('faqs')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('queries')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['queries']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('Queries')); ?></a>
    </li>
   
</ul><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/help_and_support/sidebar.blade.php ENDPATH**/ ?>