
<?php $__env->startSection('title','Register'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .valid_field{
        color:red;
    }
</style>
<div class="loader" id="loader"></div>
<section class="registration">
    <div class="container">
        <div id="Register" class="register">
            <div class="registration-content">
                <h1 class="text-center mb-0"><?php echo e(@Helper::language('register_create_an_account')); ?></h1>
                <div class="registration-card">
                    <form class="row registration-form" id="register_form" action="" novalidate>
                        <div class="col-12">
                            <div class="form-group">
                            <?php
                                // dd(@Helper::language('name_label'));
                                ?>
                                <label for=""><?php echo e(@Helper::language('first_name_label')); ?><span class="valid_field">*</span></label>
                                <input type="text" name="first_name" onkeypress="return onlyString(event)" placeholder="<?php echo e(@Helper::language('Enter_firstname_place')); ?>" >
                             
                                <span id="first-name-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <?php
                                // dd(@Helper::language('name_label'));
                                ?>
                                <label for=""><?php echo e(@Helper::language('last_name_label')); ?><span
                                    class="valid_field">*</span></label>
                                <input type="text" name="last_name" onkeypress="return onlyString(event)" placeholder="<?php echo e(@Helper::language('enter_lastname_place')); ?>" >
                              
                                <span id="last-name-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="age">Age<span class="valid_field">*</span></label>
                                <input type="number" name="age" id="age" placeholder="Enter Age" min="18" max="100" step="1">
                                <span id="age-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('email_label')); ?><span
                                    class="valid_field">*</span></label>
                                <input type="email" name="email" placeholder="<?php echo e(@Helper::language('enter_email_place')); ?>" >
                               
                                <span id="email-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-validation">
                                <label for=""><?php echo e(@Helper::language('phone_number')); ?><span
                                    class="valid_field">*</span></label>
                                <div class="input-group phone-number ">
                                    <!-- <span class="numbers body-normal text-black d-inline-block">+61</span> -->
                                    <select class="numbers" name="phone_code">
                                    <?php 
                                            $countryData = @$countryData->sortBy(['name', 'ASC']);
                                            $countryData = $countryData->values();
                                        ?>
                                        <?php $__currentLoopData = $phonecode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->phonecode); ?>">+<?php echo e($value->phonecode.' ('.$value->shortname.')'); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="tel" id="phone" name="phone" placeholder="<?php echo e(@Helper::language('enter_phone_number_place')); ?>" >
                                   
                                    <span id="phone-error" class='red-text'></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('zip_code_label')); ?><span class="valid_field">*</span></label>
                                <input type="text" name="zip_code" placeholder="Enter Zip Code" >
                                <span id="zip-code-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for=""><?php echo e(@Helper::language('country_label_web')); ?> <span class="red-text star">*</span></label>
                                <select value="<?php echo e(old('country_id')); ?>" onchange="getSubCatList(this)" name="country_id" id="country_id" class="form-select">
                                    <option value=""><?php echo e(@Helper::language('choose_country_web')); ?></option>
                                    <?php $__currentLoopData = $countryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span id="country-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('city_label')); ?><span class="valid_field">*</span></label>
                                <input type="text" name="city" placeholder=" Enter city" >
                                <span id="city-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-password">
                                <label for=""><?php echo e(@Helper::language('password_label')); ?><span
                                    class="valid_field">*</span></label>
                                <input type="password" name="password" placeholder="<?php echo e(@Helper::language('enter_password_placeholder')); ?>" >
                                <div class="toggle-password">
                                    <button type="button" class="show-password"><i class="icon-eye"></i></button>
                                    <button type="button" class="hide-password"><i class="icon-eye-slash"></i></button>
                                </div>                              
                                <span id="password-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-password">
                                <label for=""><?php echo e(@Helper::language('confirm_password_label')); ?><span
                                    class="valid_field">*</span></label>
                                <input type="password" name="confirm_password" placeholder="<?php echo e(@Helper::language('enter_confirm_password')); ?>" >
                                <div class="toggle-password">
                                    <button type="button" class="show-password"><i class="icon-eye"></i></button>
                                    <button type="button" class="hide-password"><i class="icon-eye-slash"></i></button>
                                </div>                               
                                <span id="confirm-password-error" class='red-text'></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="solid-button w-100"  id="submitDetail"><?php echo e(@Helper::language('sign_up_btn')); ?></button>
                            <div class="registration-social">
                                <p class="text-sm grey-text"><?php echo e(@Helper::language('login_or_continue_with')); ?></p>
                                <ul>
                                    <li>
                                        <a href="<?php echo e(route('auth.facebook')); ?>" target="_blank">
                                            <img src="<?php echo e(asset('assets/frontend/images/icon_login_facebook.svg')); ?>" alt="">
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <img src="<?php echo e(asset('assets/frontend/images/icon_login_insta.svg')); ?>" alt="">
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="<?php echo e(route('auth.google')); ?>" target="_blank">
                                            <img src="<?php echo e(asset('assets/frontend/images/icon_login_google.svg')); ?>" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('auth.apple')); ?>" target="_blank">
                                            <img src="<?php echo e(asset('assets/frontend/images/icon_login_apple.svg')); ?>" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                          
                            <p class="text-center"><?php echo e(@Helper::language('register_already_a_member')); ?><a href="<?php echo e(route('websitelogin')); ?>" onclick="return show('Login','Register');"><?php echo e(@Helper::language('login_label')); ?></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>

<script>
    function show(shown, hidden) {
        document.getElementById(shown).style.display = 'block';
        document.getElementById(hidden).style.display = 'none';
        return false;
    }
       
</script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
   
</script>
<script type="text/javascript">
    $.validator.setDefaults({
        ignore: [],
        // any other default options and/or rules
    });
  

    function isNumberKey(evt) {
        //var e = evt || window.event;
        var keyCode = (evt.which) ? evt.which : evt.keyCode;
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32) return false;
        return true;
    }
    function onlyString(evt) {
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

    $('#age').on("input", function () {
        this.value = this.value.replace(/[^0-9]/g, '');
        this.value = this.value.replace(/^0+/, '');
    });



    var test = $("#register_form").validate({        
        submitHandler: function() {
            var form_data = new FormData($('#register_form')[0]);
            action_url = "<?php echo e(route('websiteregisterpost')); ?>";
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
                    //$('#submitDetail').prop('disabled', true);
                },
                success: function(response) {
                    $('.loader').css("visibility", "visible");
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        var url = "<?php echo e(route('websitesendotp')); ?>";
                        window.location.href = url;
                    }
                },
                error: function(errors) {                  
                    $('.loader').css("visibility", "hidden");

                    var errors = errors.responseJSON;
                    $("span#first-name-error,span#last-name-error,span#email-error,span#phone-error,span#password-error,span#age-error").text('');
                    if (errors.first_name) {
                        $("span#first-name-error").text(errors.first_name[0]);
                    }   
                    if (errors.last_name) {
                        $("span#last-name-error").text(errors.last_name[0]);
                    }  
                    if (errors.age) {
                        $("span#age-error").text(errors.age[0]);
                    }   
                    if (errors.email) {
                        $("span#email-error").text(errors.email[0]);
                    }  
                    if (errors.phone) {
                        $("span#phone-error").text(errors.phone[0]);
                    }    
                    if (errors.password) {
                        $("span#password-error").text(errors.password[0]);
                    }
                    if (errors.confirm_password) {
                        $("span#confirm-password-error").text(errors.confirm_password[0]);
                    }                   
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/auth/register.blade.php ENDPATH**/ ?>