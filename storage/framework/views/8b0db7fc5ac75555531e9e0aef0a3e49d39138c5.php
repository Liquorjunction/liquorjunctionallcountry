<div id="switcher">
    <div class="switcher box-color dark-white text-color" id="sw-theme">
        <a href ui-toggle-class="active" target="#sw-theme" class="box-color dark-white text-color sw-btn hidden-switcher-icon">
            <i class="fa fa-gear"></i>
        </a>
        <div class="box-header">
            <h2><?php echo e(__('backend.themeSwitcher')); ?></h2>
        </div>
        <div class="box-divider"></div>
        <div class="box-body p-t-xs">
            <p class="hidden-md-down">
                <label class="md-check m-y-xs" data-target="folded">
                    <input type="checkbox">
                    <i class="green"></i>
                    <span class="hidden-folded"><?php echo e(__('backend.foldedAside')); ?></span>
                </label>
                <label class="md-check m-y-xs" data-target="boxed">
                    <input type="checkbox">
                    <i class="green"></i>
                    <span class="hidden-folded"><?php echo e(__('backend.boxedLayout')); ?></span>
                </label>
            </p>


            
            <div class="m-t-1">
                <a href="<?php echo e(route('cacheClear')); ?>" class="btn btn-sm dark btn-block"
                   onclick="return confirm('<?php echo e(__('backend.cashClearMsg')); ?>')"><small><?php echo __('backend.cashClear'); ?></small></a>

            </div>
            <br>
        </div>
    </div>

</div>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/layouts/settings.blade.php ENDPATH**/ ?>