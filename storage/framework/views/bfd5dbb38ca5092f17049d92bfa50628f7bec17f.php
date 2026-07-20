<?php $__env->startSection('title',Helper::language('my_account_label')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
    <div class="bread-crumb-block">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(@Helper::language('my_account_label')); ?></li>
            </ul>
        </div>
    </div>
    <section class="account account-main pt-20 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('frontend.layouts.account-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9 col-md-8">
                    <h2><?php echo e(@Helper::language('my_account_label')); ?></h2>
                    <div class="common-card account-information">
                        <div class="account-info">
                            <h4 class="mb-0 title-one fw-normal"><?php echo e(@Helper::language('account_information_heading')); ?></h4>
                            <div class="account-info-button">
                                <a href="<?php echo e(route('userchange-password')); ?>" class="solid-button"><?php echo e(@Helper::language('change_password_btn')); ?></a>
                            </div>
                        </div>
                        <div class="account-basic-info">
                            <div class="account-basic-info-heading">
                                <h4 class="mb-0 title-one"><?php echo e(@Helper::language('basic_information_heading')); ?></h4>                                    
                            </div>
                            <ul>
                                <li>
                                    <span class="title-two text-dark-grey d-block mb-0"><?php echo e(@Helper::language('name_label_web')); ?></span>
                                    <label class="title-two text-black d-block mb-0"><?php echo e(isset($myProfile->first_name) ? $myProfile->first_name :''); ?>  <?php echo e(isset($myProfile->last_name) ? $myProfile->last_name :''); ?></label>
                                </li>
                                <li>
                                    <span class="title-two text-dark-grey d-block mb-0"><?php echo e(@Helper::language('email_label')); ?></span>
                                    <a href="mailto:<?php echo e(isset($myProfile->email) ? $myProfile->email :''); ?>" class="title-two"><?php echo e(isset($myProfile->email) ? $myProfile->email :''); ?></a>
                                </li>
                                <li>
                                    <span class="title-two text-dark-grey d-block mb-0"><?php echo e(@Helper::language('phone_number')); ?></span>
                                    
                                     <a href="<?php echo e(isset($myProfile->phone) ? 'tel:+' . $myProfile->phone_code . $myProfile->phone : ''); ?>" class="title-two">
                                        <?php if(isset($myProfile->phone)): ?>
                                            +<?php echo e(isset($myProfile->phone_code) ? $myProfile->phone_code : ''); ?>&nbsp;<?php echo e($myProfile->phone); ?>

                                        <?php endif; ?>
                                    </a>
                                </li>
                            </ul>
                            <a href="<?php echo e(route('edit-profile')); ?>" class="border-button d-inline-block"><?php echo e(@Helper::language('edit_info_btn')); ?></a>
                        </div>                                                       
                    </div>                        
                </div>
            </div>
        </div>
    </section>
<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<?php $__env->stopSection(); ?>

 
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/my-profile/my-account.blade.php ENDPATH**/ ?>