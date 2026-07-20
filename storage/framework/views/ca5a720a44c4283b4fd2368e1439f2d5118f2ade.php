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

<?php $__env->startSection('title',$page_title ); ?>
<?php $__env->startSection('content'); ?>
<?php if(@$photo): ?>
<section class="title-banner" style="<?php echo e(!empty($photo) ? 'background-image: url('.asset('uploads/cms/' . $photo).'); background-repeat: no-repeat; background-size: cover;' : ''); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0"><?php echo e($page_title); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php echo $__env->make('frontend.cms.contact_us.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

<section class="contact pt-40 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="contact-sidebar-wrapper">
                    <h3><?php echo e(@Helper::language('contact_us')); ?></h3>
                    <?php echo $__env->make('frontend.cms.contact_us.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>


            
            <div class="col-lg-9 col-md-8">
                <div class="content-inner">
                    <h3><?php echo e(@$page_title?:''); ?></h3>
                    <div class="row">
                        <div class="col-12">
                            <?php echo html_entity_decode($page_content); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/contact_us/press_enquiries.blade.php ENDPATH**/ ?>