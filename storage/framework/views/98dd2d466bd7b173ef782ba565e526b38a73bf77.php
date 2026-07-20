<?php $__env->startSection('title', "404"); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-text">
            <div class="error-page largest-text">
                <div class="image-center" style="margin-right:55px;">
                    <img width="380px" src="<?php echo e(asset('assets/dashboard/images/error.png')); ?>" alt="page-not-found">
                </div>
                <h1>404</h1>
                <h2 class="mb-4">We’ll clean up and try again</h2>
                
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>