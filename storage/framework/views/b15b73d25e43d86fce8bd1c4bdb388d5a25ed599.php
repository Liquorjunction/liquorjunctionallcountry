<?php
    if (\Session::get('language') == 1) {
        $page_title = $pageInfo->page_name;
        $page_content = $pageInfo->page_content;
        $photo = $pageInfo->photo;
        // dd($photo);
    } else {
        $page_title = $pageInfo->page_name_fr ? $pageInfo->page_name_fr : $pageInfo->page_name;
        $page_content = $pageInfo->page_content_fr ? $pageInfo->page_content_fr : $pageInfo->page_content;
        $photo = $pageInfo->photo;
        // dd($photo);
    }
?>

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

    <!-- Title Banner -->
    <?php if(@$photo): ?>
        <section class="title-banner"
            style="<?php echo e(!empty($photo) ? 'background-image: url(' . asset('uploads/cms/' . $photo) . '); background-repeat: no-repeat; background-size: cover;' : ''); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-0"><?php echo e($page_title); ?></h1>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- End Title Banner -->

    <div class="bread-crumb-block">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a>
                    </li>
                    <?php if(Request::route()->getName() != 'aboutUs' && Request::route()->getName() != 'privacyPolicy'): ?>
                        <li class="breadcrumb-item"><a href="#"><?php echo e(@Helper::language('about_us')); ?></a></li>
                    <?php endif; ?>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($page_title); ?></li>
                </ul>
            </nav>
        </div>
    </div>
    <section class="contact" style="padding: 30px; 2px;">
        <div class="container">
            <div class="row">
                <?php echo html_entity_decode($page_content); ?>

            </div>
        </div>
    </section>
    <?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/about_us/common_cms.blade.php ENDPATH**/ ?>