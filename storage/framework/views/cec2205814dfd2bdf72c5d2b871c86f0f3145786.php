<?php $__env->startSection('title','404'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-text">
    <div class="error-page largest-text">
        <div class="image-center">
            <img width="320px" src="<?php echo e(asset('assets/frontend/images/404.png')); ?>" alt="page-not-found">
        </div>
        <h4>404</h4>
        <h2 class="mb-4"><?php echo e(@Helper::language('something_went_wrong')); ?></h2>
        <a href="<?php echo e(route('frontend.home')); ?>" class="solid-button"><?php echo e(@Helper::language('go_home')); ?></a>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/liquour_junction/well-known/resources/views/frontend/page-not-found.blade.php ENDPATH**/ ?>