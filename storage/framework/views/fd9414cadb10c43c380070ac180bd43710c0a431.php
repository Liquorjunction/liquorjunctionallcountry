<ul class="contact-sidebar">
    <li class="sidebar-item">
        <a href="<?php echo e(route('deliveryInformation')); ?>" class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['deliveryInformation']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('delivery_information')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('returnsCancellation')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['returnsCancellation']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('returns_and_cancellation')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('damagesWrongGoods')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['damagesWrongGoods']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('damages_and_wrong_goods')); ?></a>
    </li>
    <li class="sidebar-item">
        <a href="<?php echo e(route('ourPackaging')); ?>"  class="sidebar-link <?php echo e(in_array(\Request::route()->getName(), ['ourPackaging']) ? 'active' : ' '); ?>"><?php echo e(@Helper::language('our_packaging')); ?></a>
    </li>
</ul><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/delivery_and_returns/sidebar.blade.php ENDPATH**/ ?>