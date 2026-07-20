<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="bread-crumb-block">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a  href="<?php echo e(url('/')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.blog')); ?>"><?php echo e(@Helper::language('blog')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(@Helper::language('blog_detail')); ?></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Blog -->
    <?php        
        $blog_title='';
        $image_not_found = '';
        if(session::get('language')==2){
            $blog_title = ($blog_details->title_fr)?$blog_details->title_fr:$blog_details->title ;
            $blog_short_desp = ($blog_details->short_description_fr)?$blog_details->short_description_fr:$blog_details->short_description;
            $blog_long_desp = ($blog_details->long_description_fr)?$blog_details->long_description_fr:$blog_details->long_description;
        }else{
            $blog_title = $blog_details->title;
            $blog_short_desp = $blog_details->short_description;
            $blog_long_desp = $blog_details->long_description;
        } 
    ?>
    <section class="blog pt-40 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <span class="blog-detail-date"><?php echo @$blog_details->created_at ? Carbon\Carbon::parse($blog_details->created_at)->format(env('DATE_FORMAT', 'Y-m-d')) : "-"; ?></span>
                    <h2><?php echo e($blog_title); ?></h2>
                    <div class="blog-detail-img">
                        <?php if(file_exists(public_path() . '/uploads/blog/'.$blog_details->image)): ?>					
                        <img src="<?php echo e(asset('uploads/blog/'.$blog_details->image)); ?>" title="<?php echo e($blog_title); ?>" />
                        <?php else: ?>
                        <img src="<?php echo e(asset('assets/frontend/images/image-not-avilable.png')); ?>" title="<?php echo e(Helper::language('image_not_available')); ?>" alt="<?php echo e(Helper::language('image_not_available')); ?>">
                        <?php endif; ?>  
                    </div>
                    <div class="blog-detail-content">
                        <p><?php echo e($blog_short_desp); ?></p>
                        <p><?php echo e(strip_tags($blog_long_desp)); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/blog/blog-details.blade.php ENDPATH**/ ?>