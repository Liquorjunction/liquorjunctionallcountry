<?php $__env->startSection('title', "403"); ?>
<?php $__env->startSection('content'); ?>
   <div class="content-text">
            <div class="error-page largest-text">
                <div class="image-center">
                    <img src="<?php echo e(asset('assets/dashboard/images/error.png')); ?>" alt="page-not-found">
                </div>
                <h1>403</h1>
                <h2 class="mb-4">We’ll clean up and try again</h2>
                <a href="<?php echo e(route('frontend.home')); ?>" class="common-btn hvr-radial-out">Go Home</a>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/errors/403.blade.php ENDPATH**/ ?>