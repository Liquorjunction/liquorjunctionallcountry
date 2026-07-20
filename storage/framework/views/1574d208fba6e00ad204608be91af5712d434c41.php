<?php
if(\Session::get('language')==1){
    $page_title = $pageInfo->page_name;
    $page_content = $pageInfo->page_content;
    $photo = $pageInfo->photo;
}else{
    $page_title = ($pageInfo->page_name_fr)?$pageInfo->page_name_fr:$pageInfo->page_name;
    $page_content = ($pageInfo->page_content_fr)?$pageInfo->page_content_fr:$pageInfo->page_content;
    $photo = $pageInfo->photo;
}
?>

<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('content'); ?>
<?php if(@$photo): ?>
<section class="title-banner" style="<?php echo e($photo ? 'background-image: url('.asset('uploads/cms/' . $photo).'); background-repeat: no-repeat; background-size: cover;' : ''); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0"><?php echo e($page_title); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="cms shop pt-40 pb-60">
    <?php echo html_entity_decode($page_content); ?>

</section>
<?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/our_shops/our_shop.blade.php ENDPATH**/ ?>