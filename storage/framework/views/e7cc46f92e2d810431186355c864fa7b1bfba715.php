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

<?php $__env->startSection('title',$page_title  ); ?>
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
<?php echo $__env->make('frontend.cms.help_and_support.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
<style>
.error{
    color: red;
}
</style>
<section class="contact pt-40 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="contact-sidebar-wrapper">
                    <h3><?php echo e(@ucfirst(Helper::language('help_and_support'))); ?></h3>
                    <?php echo $__env->make('frontend.cms.help_and_support.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="content-inner">
                    <h3><?php echo e(@Helper::language('Queries')); ?></h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo html_entity_decode($page_content); ?>

                        </div>
                        <div class="col-lg-6">
                            <div class="common-card queries-from">
                                <form action="<?php echo e(route('queriesStore')); ?>" method="POST" class="row">
                                    <div class="form-group col-12">
                                        <label for=""><?php echo e(@Helper::language('name_label_web')); ?> <span class="error">*</span></label>
                                        <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(@Helper::language('enter_name_web')); ?>"  onkeypress="return onlyString(event)" >
                                        <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <span  style="color: red;" class='validate'><?php echo e($errors->first('name')); ?></span>
                                        </span>
                                        <?php endif; ?>                                       
                                    </div>                                        
                                    <div class="form-group has-validation">
                                        <label for=""><?php echo e(@Helper::language('phone_number')); ?> <span class="error">*</span></label>
                                        <div class="input-group phone-number">
                                            <select class="numbers" name="phone_code">
                                                <?php $__currentLoopData = $countryInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(old('phone_code')==$value->id): ?>? <?php echo e('selected'); ?><?php endif; ?>  value="<?php echo e($value->id); ?>" ><?php echo e($value->phonecode.' ('.$value->shortname.')'); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <input type="tel" onkeypress="return restrictInput(this,event, 'digits')" name="phone_number" placeholder="<?php echo e(@Helper::language('enter_phone_number_place')); ?>" value="<?php echo e(old('phone_number')); ?>">
                                        </div>    
                                        <?php if($errors->has('phone_number')): ?>
                                        <span class="help-block">
                                            <span  style="color: red;" class='validate'><?php echo e($errors->first('phone_number')); ?></span>
                                        </span>
                                        <?php endif; ?>                                                                             
                                    </div>
                                    <div class="form-group col-12">
                                        <label for=""><?php echo e(@Helper::language('email_label')); ?> <span class="error">*</span></label>
                                        <input type="email" placeholder="<?php echo e(@Helper::language('enter_email_place')); ?>" name="email" id="email" value="<?php echo e(old('email')); ?>">
                                        <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <span  style="color: red;" class='validate'><?php echo e($errors->first('email')); ?></span>
                                        </span>
                                        <?php endif; ?> 
                                    </div>
                                    <div class="form-group col-12">
                                        <label for=""><?php echo e(@Helper::language('message_title')); ?> <span class="error">*</span></label>
                                        <input type="text" name="message_title" placeholder=" <?php echo e(@Helper::language('enter_message_title')); ?>" value="<?php echo e(old('message_title')); ?>" >
                                        <?php if($errors->has('message_title')): ?>
                                        <span class="help-block">
                                            <span style="color: red;" class='validate'><?php echo e($errors->first('message_title')); ?></span>
                                        </span>
                                        <?php endif; ?> 
                                    </div>
                                    <div class="form-group col-12">
                                        <label for=""><?php echo e(@Helper::language('message_description')); ?> <span class="error">*</span></label>
                                        <textarea name="message_description" id="" cols="2" rows="5" placeholder="<?php echo e(@Helper::language('enter_message_description')); ?>"><?php echo e(old('message_description')); ?></textarea>    
                                        <?php if($errors->has('message_description')): ?>
                                        <span class="help-block">
                                            <span  style="color: red;" class='validate'><?php echo e($errors->first('message_description')); ?></span>
                                        </span>
                                        <?php endif; ?>                                    
                                    </div>
                                    <div class="form-group col-12">
                                        <label for=""> <?php echo e(@Helper::language('reason')); ?> <span class="error">*</span></label>
                                        <select name="reason" id="" class="reason form-select">
                                            <option value="">Select the reason</option>
                                            <?php if($inquiryReason && count($inquiryReason) > 0): ?>
                                            <?php $__currentLoopData = $inquiryReason; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                if(\Session::get('language')==1){
                                                    $title = $result->title;
                                                }else{
                                                    $title = ($result->title_fr)?$result->title_fr:$result->title;
                                                }
                                            ?>
                                                <option <?php if(old('reason')==$result->id): ?>? <?php echo e('selected'); ?><?php endif; ?> value="<?php echo e($result->id); ?>"><?php echo e($title); ?></option>                                            
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php if($errors->has('reason')): ?>
                                        <span class="help-block">
                                            <span  style="color: red;" class='validate'><?php echo e($errors->first('reason')); ?></span>
                                        </span>
                                        <?php endif; ?> 
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="solid-button w-100"><?php echo e(@Helper::language('submit_btn')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('frontend.newsletter.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/cms/help_and_support/queries.blade.php ENDPATH**/ ?>