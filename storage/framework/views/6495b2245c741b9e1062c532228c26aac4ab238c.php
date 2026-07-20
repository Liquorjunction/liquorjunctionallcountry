<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('dashboard.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div class="app auth_app" id="app">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('dashboard.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/layouts/auth.blade.php ENDPATH**/ ?>