<?php $__env->startSection('title','Forgot Password'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="loader" id="loader"></div>
<section class="registration">
    <div class="container">
        <div id="Register">
            <div class="registration-content">
                <h1 class="text-center mb-0"><?php echo e(@Helper::language('forgot_password_heading')); ?> </h1>
                <div class="registration-card">
                    <form action="#" class="row registration-form" method="POST" enctype="multipart/form-data" id="forgot_password_form">
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""><?php echo e(@Helper::language('email_label')); ?> <span class="valid_field">*</span></label>
                                <input type="email" placeholder="<?php echo e(@Helper::language('enter_email_place')); ?>" name="email" id="email">
                            </div>
                            <span class="help-block" id="errorMessagecommon" style="display:none">
                                <span style="color: red;display: none;" id="errorMsgcommon" class='validate text-center'></span>
                            </span>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="solid-button w-100"><?php echo e(@Helper::language('submit_btn')); ?></button>
                            <div class="registration-social">
                                
                            </div>
                             
                            <p class="text-center"><a href="<?php echo e(route('websitelogin')); ?>" class="d-block"><?php echo e(@Helper::language('back_to_login_msg')); ?></a></p>
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
    var validation_email_required="<?php echo e(\Helper::language('email_field_required')); ?>";
    var validation_email="<?php echo e(\Helper::language('enter_valid_email_validation')); ?>";
    var test = $("#forgot_password_form").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            email: {
                required: true,
                email: true
            },

        },
        // in 'messages' user have to specify message as per rules
        messages: {

            email: {
                required: validation_email_required,
                email: validation_email,
            },
        },
        submitHandler: function() {
            var form_data = new FormData($('#forgot_password_form')[0]);
            action_url = "<?php echo e(route('forgotpasswordpost')); ?>";
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
                    // console.log('test'+response);
                    $('.loader').css("visibility", "visible");
                    var url = "<?php echo e(route('websiteforgototp')); ?>";
                    window.location.href = url;
                },
                error: function(errors) {
                    // alert(errors);
                    // console.log(response)
                    $('.loader').css("visibility", "hidden");
                    var erroJson = JSON.parse(errors.responseText);
                    // console.log(erroJson.status);
                    if (erroJson.status == "error_forgot_password") {
                        $("span#errorMessagecommon").css("display", "block");
                        $("span#errorMsgcommon").css("display", "block");

                        $("span#errorMsgcommon").html(erroJson.errors);
                            setTimeout(function() {
                                $('#errorMsgcommon').fadeOut('fast');
                            }, 4000);

                    }

                }
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/auth/forgot-password.blade.php ENDPATH**/ ?>