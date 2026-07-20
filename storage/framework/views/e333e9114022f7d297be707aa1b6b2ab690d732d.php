<?php $__env->startSection('title', 'Login as Guest'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .valid_field {
            color: red;
        }
    </style>
    <div class="loader" id="loader"></div>
    <section class="registration">
        <div class="container">
            <div id="Register" class="register">
                <div class="registration-content">
                    <h1 class="text-center mb-0">Continue as Guest User</h1>
                    <div class="registration-card">
                        <form class="row registration-form" id="guest_login_form" action="" novalidate>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="is_guest_user" value="1">
                            <?php if(isset($redirectTo)): ?>
                                <input type="hidden" name="redirect_to" value="<?php echo e($redirectTo); ?>">
                            <?php endif; ?>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name<span class="valid_field">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name" required>
                                    <span id="guest-error" class='red-text'></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for=""><?php echo e(@Helper::language('email_label')); ?> /
                                        <?php echo e(@Helper::language('phone_number')); ?><span class="valid_field">*</span></label>
                                    <input type="text"
       placeholder="<?php echo e(@Helper::language('enter_email_place')); ?> / <?php echo e(@Helper::language('phone_number')); ?>"
       name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="solid-button w-100" id="submitGuest"><?php echo e('Continue as Guest'); ?></button>
                                <span id="guest-email-error" class='red-text'></span>
                            </div>
                            <div class="registration-social">
                                    <p class="text-sm grey-text"><?php echo e(@Helper::language('login_or_continue_with')); ?></p>
                                    <ul>
                                        <li>
                                            <a href="<?php echo e(route('auth.facebook')); ?>" target="_blank">
                                                <img src="<?php echo e(asset('assets/frontend/images/icon_login_facebook.svg')); ?>"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('auth.google')); ?>" target="_blank">
                                                <img src="<?php echo e(asset('assets/frontend/images/icon_login_google.svg')); ?>"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('auth.apple')); ?>" target="_blank">
                                                <img src="<?php echo e(asset('assets/frontend/images/icon_login_apple.svg')); ?>"
                                                    alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="text-center"><?php echo e(@Helper::language('login_not_register_yet')); ?><a
                                        href="<?php echo e(route('websiteregister')); ?>"><?php echo e(@Helper::language('sign_up_btn')); ?></a>
                                </p>
                            <p class="text-center"><?php echo e(@Helper::language('register_already_a_member')); ?><a href="<?php echo e(route('websitelogin')); ?>" onclick="return show('Login','Register');"><?php echo e(@Helper::language('login_label')); ?></a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    // Custom method to validate email or phone
    $.validator.addMethod("emailOrPhone", function(value, element) {
    value = value.trim();
    // Email regex
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // Phone regex: 8-15 digits, optional + at start
    var phonePattern = /^\+?[0-9]{8,15}$/;
    return this.optional(element) || emailPattern.test(value) || phonePattern.test(value);
}, "Please enter a valid email or phone number (8-15 digits).");

    // Apply validation rules
    $('#guest_login_form').validate({
        rules: {
    name: { required: true, minlength: 3, maxlength: 30 },
    email: { required: true, emailOrPhone: true }
},
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 3 characters",
                maxlength: "Name must be maximum 30 characters"
            },
            email: {
                required: "Please enter your email or phone"
            }
        },
        submitHandler: function(form) {
            var form_data = new FormData(form);

            // Split name into first_name and last_name
            var name = form_data.get('name') || '';
            var first_name = name.split(' ')[0] || name;
            var last_name = name.split(' ').slice(1).join(' ') || name;
            form_data.append('first_name', first_name);
            form_data.append('last_name', last_name);

            var action_url = "<?php echo e(route('websiteregisterpost')); ?>";
            var csrf = "<?php echo e(csrf_token()); ?>";

            $.ajax({
                url: action_url,
                data: form_data,
                headers: { 'X-CSRF-TOKEN': csrf },
                processData: false,
                contentType: false,
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                    $(".loader").fadeIn();
                    $('.loader').css("visibility", "visible");
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
                    $("#guest-error").text('');
                    $("#guest-email-error").text('');
                    if (errors && typeof errors === 'object') {
                        if (errors.name) {
                            $("#guest-error").text(errors.name[0]);
                        }
                        if (errors.email) {
                            $("#guest-email-error").text(errors.email[0]);
                        }
                    } else {
                        $("#guest-error").text('An error occurred. Please try again.');
                    }
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/auth/guest_login.blade.php ENDPATH**/ ?>