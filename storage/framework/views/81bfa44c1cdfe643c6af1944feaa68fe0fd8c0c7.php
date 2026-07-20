<?php $__env->startSection('title','FAQ' ); ?>
<?php $__env->startSection('content'); ?>
<?php if(@$pageInfo->photo): ?>
<section class="title-banner" style="<?php echo e(!empty($pageInfo->photo) ? 'background-image: url('.asset('uploads/cms/' . $pageInfo->photo).'); background-repeat: no-repeat; background-size: cover;' : ''); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0"><?php echo e($pageInfo->page_name); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php echo $__env->make('frontend.cms.help_and_support.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

<section class="contact pt-40 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="contact-sidebar-wrapper">
                    <h3><?php echo e(@Helper::language('help_and_support')); ?></h3>
                    <?php echo $__env->make('frontend.cms.help_and_support.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="content-inner faq-block">
                    <h3><?php echo e(@Helper::language('frequently_asked_questions')); ?></h3>
                    <div class="accordion" id="accordionExample">
                        <?php
                            $i=1;
                        ?>
                        <?php $__currentLoopData = $faqData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        if(\Session::get('language')==1){
                            $question = $faq->question_name;
                            $answer = $faq->answer;
                        }else{
                            $question = ($faq->question_name_fr)?$faq->question_name_fr:$faq->question_name;
                            $answer = ($faq->answer_fr)?$faq->answer_fr:$faq->answer;
                        }
                        ?>
                        <div class="accordion-item">
                            <h5 class="accordion-header" id="heading<?php echo e($i); ?>">
                                <button  class="accordion-button <?php if($i!=1): ?> collapsed <?php endif; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($i); ?>"  aria-expanded="true" aria-controls="collapse<?php echo e($i); ?>">
                                    <?php echo e(@$question?:''); ?>

                                </button>
                            </h5>
                            <div id="collapse<?php echo e($i); ?>" class="accordion-collapse collapse <?php if($i==1): ?> <?php echo e('show'); ?> <?php endif; ?>" aria-labelledby="heading<?php echo e($i); ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php echo e(@$answer?:''); ?>

                                </div>
                            </div>
                        </div>
                        <?php
                            $i++;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/help_and_support/faq.blade.php ENDPATH**/ ?>