
<?php $__env->startSection('title',Helper::language('edit_account')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .text-red{
        color:red;
    }
</style>
<div class="bread-crumb-block">
    <div class="container">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo e(@Helper::language('home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('my-account')); ?>"><?php echo e(@Helper::language('my_account_label')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(@Helper::language('edit_account')); ?></li>
        </ul>
    </div>
</div>
<section class="change-password pt-20 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('frontend.layouts.account-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9 col-md-8">
                <h2><?php echo e(@Helper::language('edit_profile_heading')); ?></h2>
                <div class="common-card">
                    <form class="row edit-profile-form" id="edit_profile_form" novalidate>
                        <div id="phoneError" class="alert alert-warning" style="display:none;font-weight:bold;"></div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('first_name_label')); ?><span class="text-red">*</span></label>
                                <input type="text" name="first_name" placeholder="<?php echo e(@Helper::language('Enter_firstname_place')); ?>" class="required" value="<?php echo e(isset($myProfile->first_name) ? $myProfile->first_name :''); ?>" id="first_name" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                            <?php
                                // dd(@Helper::language('name_label'));
                                ?>
                                <label for=""><?php echo e(@Helper::language('last_name_label')); ?><span class="text-red">*</span></label>
                                <input type="text" name="last_name" placeholder="<?php echo e(@Helper::language('enter_lastname_place')); ?>" value="<?php echo e(isset($myProfile->last_name) ? $myProfile->last_name :''); ?>"required>
                                <span class="help-block" id="errorMessageLastname" style="display:none;">
                                    <span class="mb-4"style="color: #FF4444;font-size:14px; display: none; float:left;"  id="errorMsgLastname" class='validate validate-error text-center'></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('email_label')); ?><span class="text-red"></span></label>
                                <input type="email" readonly name="email"  placeholder="<?php echo e(@Helper::language('enter_email_place')); ?>"value="<?php echo e(isset($myProfile->email) ? $myProfile->email :''); ?>" class="required" required >
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group has-validation">
                                <label for=""><?php echo e(@Helper::language('phone_number')); ?><span class="text-red">*</span></label>
                                <div class="input-group phone-number">
                                    <!-- <span class="numbers body-normal text-black d-inline-block">+61</span> -->
                                    <select class="numbers" name="phone_code" >
                                        <?php $__currentLoopData = $countryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->phonecode); ?>" <?php echo e((@$myProfile->phone_code == $value->phonecode) ? 'selected' : ''); ?> > + <?php echo e($value->phonecode.' ('.$value->shortname.')'); ?></option>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="tel" name="phone" maxlength="15" placeholder="<?php echo e(@Helper::language('enter_phone_number_place')); ?>" value="<?php echo e(isset($myProfile->phone) ? $myProfile->phone :''); ?>" id="phone" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <button class="solid-button w-100" type="submit"><?php echo e(@Helper::language('save_details_btn')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    function isNumberKey(evt) {
        //var e = evt || window.event;
        var keyCode = (evt.which) ? evt.which : evt.keyCode;
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)

            return false;
        return true;

    }

    $('#phone').on("input", function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
        $(this).val($(this).val().replace(/^\s+/g, ''));
    });

    $('#first_name').on("input", function() {
        console.log(this.value);
        this.value = this.value.replace(/[^a-zA-Z\s]/gi, '');
        $(this).val($(this).val().replace(/^\s+/g, ''));
    });

    $('#last_name').on("input", function() {
        console.log(this.value);
        this.value = this.value.replace(/[^a-zA-Z\s]/gi, '');
        $(this).val($(this).val().replace(/^\s+/g, ''));
    });
    var validation_first_name_required="<?php echo e(\Helper::language('first_name_required')); ?>";
    var validation_first_name_minlength="<?php echo e(\Helper::language('first_name_min_valiadation')); ?>";
    var validation_first_name_max_length="<?php echo e(\Helper::language('first_name_max_validation')); ?>";
    
    var validation_last_name_required="<?php echo e(\Helper::language('last_name_field_is_required')); ?>";
    var validation_last_name_minlength="<?php echo e(\Helper::language('last_name_min_valiadation_msg')); ?>";
    var validation_last_name_max_length="<?php echo e(\Helper::language('last_name_max_validation')); ?>";
    
    var validation_email_required="<?php echo e(\Helper::language('email_field_required')); ?>";
    var validation_email="<?php echo e(\Helper::language('enter_valid_email_validation')); ?>";

    
    var validation_phone_required="<?php echo e(\Helper::language('phone_number_field_is_required')); ?>";
    var validation_phone_minlength="<?php echo e(\Helper::language('phone_number_min_max')); ?>";
    var validation_phone_maxlength="<?php echo e(\Helper::language('phone_number_min_max')); ?>";
    var test = $("#edit_profile_form").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            first_name: {
                required:true,
                minlength:3,
                maxlength:30,
            },
            last_name: {
                required:true,
                minlength:3,
                maxlength:30,
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 8,
                maxlength:15

            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            first_name:{ 
                required:validation_first_name_required,
                minlength:validation_first_name_minlength,
                maxlength:validation_first_name_max_length,
            },
            last_name:{ 
                required:validation_last_name_required,
                minlength:validation_last_name_minlength,
                maxlength:validation_last_name_max_length,
            },
            email: {
                required: validation_email_required,
                email: validation_email
            },
            phone: {
                required: validation_phone_required,
                minlength: validation_phone_minlength,
                minlength: validation_phone_maxlength,

            },
           
        },
        submitHandler: function() { 


            var form_data = new FormData($('#edit_profile_form')[0]);
            action_url = "<?php echo e(route('upadte-profile')); ?>";
            var csrf = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                url: action_url,
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                processData: false,
                contentType: false,
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                    $(".loader").fadeIn();
                    $('.loader').css("visibility", "visible");
                },
                success: function(response) {
                    // return false;
                    // console.log(response);
                    // $('.loader').css("visibility", "visible");
                    var url = "<?php echo e(route('my-account')); ?>";
                    window.location.href = url;
                },
                error: function(errors) {
                    console.log(errors)
                    $('#phoneError').hide().html(''); 

                    var erroJson = JSON.parse(errors.responseText);
                       if (erroJson.message) {
                            $('#phoneError').html(erroJson.message).slideDown();

                            setTimeout(function() {
                                $('#phoneError').slideUp();
                            }, 1500);
                        }

                         if (erroJson.errors) {
                            for (var field in erroJson.errors) {
                                var messages = erroJson.errors[field];
                                if (Array.isArray(messages)) {
                                    for (var message of messages) {
                                        if (field === "first_name") {
                                            $("span#errorMessageFirstname").show();
                                            $("span#errorMsgFirstname").show().html(message);
                                        } else if (field === "last_name") {
                                            $("span#errorMessageLastname").show();
                                            $("span#errorMsgLastname").show().html(message);
                                        } else if (field === "email") {
                                            $("span#errorMessageEmail").show();
                                            $("span#errorMsgEmail").show().html(message);
                                        } else if (field === "phone") {
                                            $('#phoneError').html(message).slideDown();
                                        }
                                    }
                                }
                            }
                        }
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/my-profile/edit-profile.blade.php ENDPATH**/ ?>