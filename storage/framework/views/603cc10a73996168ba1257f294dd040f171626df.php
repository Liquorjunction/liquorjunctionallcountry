
<?php $__env->startSection('title', 'Login'); ?>
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
            <div id="Register">
                <div class="registration-content">
                    <h1 class="text-center mb-0"><?php echo e(@Helper::language('login_label')); ?></h1>
                    <div class="registration-card">
                        <form action="#" class="row registration-form" method="POST" enctype="multipart/form-data"
                            id="login_form">
                            <div class="col-12">
                                <div class="form-group">

                                    <label for=""><?php echo e(@Helper::language('email_label')); ?> /
                                        <?php echo e(@Helper::language('phone_number')); ?><span class="valid_field">*</span></label>
                                    <input type="text"
                                        placeholder="<?php echo e(@Helper::language('enter_email_place')); ?> / <?php echo e(@Helper::language('phone_number')); ?>"
                                        name="email" id="email">

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-password">
                                    <label for=""><?php echo e(@Helper::language('password_label')); ?><span
                                            class="valid_field">*</span></label>
                                    <input type="password" name="password"
                                        placeholder="<?php echo e(@Helper::language('enter_password_placeholder')); ?>" required>
                                    <div class="toggle-password">
                                        <button type="button" class="show-password"><i class="icon-eye"></i></button>
                                        <button type="button" class="hide-password"><i class="icon-eye-slash"></i></button>
                                    </div>
                                    <span class="help-block" id="errorMessagePassword" style="display:none;">
                                        <span
                                            class="mb-4"style="color: #FF4444;font-size:14px; display: none; float:left;"
                                            id="errorMsgPassword" class='validate validate-error text-center'></span>
                                    </span>
                                    <div class="forget-pass">
                                        <a
                                            href="<?php echo e(route('userforgotpassword')); ?>"><?php echo e(@Helper::language('forgot_password_text')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block" id="errorMessagecommon" style="display:none">
                                <span style="color: #FF4444;font-size:14px;display: none;" id="errorMsgcommon"
                                    class='validate validate-error text-center'></span>
                            </span>
                            <span class="help-block" id="errorMessageEmail" style="display:none">
                                <span style="color: #FF4444;font-size:14px;display: none;" id="errorMsgEmail"
                                    class='validate validate-error text-center'></span>
                            </span>
                            <div id="otp_verify"></div>
                            <div class="col-12">
                                <button type="submit"
                                    class="solid-button w-100"><?php echo e(@Helper::language('login_label')); ?></button>
                                                                    <?php
                                    $isCart = url()->previous() && str_contains(url()->previous(), 'cart') || str_contains(url()->previous(), 'product-details')
;
                                ?>
                                <?php if($isCart): ?>
                                <a style="margin-top: 15px;" href="<?php echo e(route('guest.login')); ?>" class="solid-button w-100"><?php echo e($isCart ? 'Checkout as Guest' : 'Continue as Guest'); ?></a>
                                <?php endif; ?>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>

    <script type="text/javascript">
        // var firebaseConfig = {
        //             apiKey: "AIzaSyAUxMuVwHVoE_fBblD9ENER3ScZDrwGNpo",
        //             authDomain: "trade-internal.firebaseapp.com",
        //             projectId: "trade-internal",
        //             storageBucket: "trade-internal.appspot.com",
        //             messagingSenderId: "466790444286",
        //             appId: "1:466790444286:web:aa177c15e00fc241be09af",
        //             measurementId: "G-VCECZ93QSQ"
        //     };
        //     firebase.initializeApp(firebaseConfig);
        //         const messaging = firebase.messaging();

        //     function initFirebaseMessagingRegistration() {
        //         // alert();
        //             var urlTocheck = "<?php echo e(Request::url()); ?>";

        //                 messaging
        //                 .requestPermission()
        //                 .then(function () {
        //                     return messaging.getToken()
        //                 })
        //                 .then(function(token) {
        //                     console.log("HELUUUU : " + urlTocheck);
        //                  if(urlTocheck){
        //                           $.ajaxSetup({
        //                         headers: {
        //                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                         }
        //                     });

        //                     $.ajax({
        //                         url: '<?php echo e(route('save-token')); ?>',
        //                         type: 'POST',
        //                         data: {
        //                             token: token
        //                         },
        //                         dataType: 'JSON',
        //                         success: function (response) {

        //                              // $('.loader').css("visibility", "visible");
        //                                 var url = "<?php echo e(route('frontend.home')); ?>";
        //                                         window.location.href = url;
        //                         },
        //                         error: function (err) {

        //                             console.log('User Chat Token Error'+ err);
        //                         },
        //                     });
        //                  }
        //                 }).catch(function (err) {
        //                     console.log('User Chat Token Error'+ err);
        //                 });
        //          }  

        //         messaging.onMessage(function(payload) {
        //             console.log(payload);
        //             const noteTitle = payload.notification.title;
        //             const noteOptions = {
        //                 body: payload.notification.body,
        //                 icon: payload.notification.icon,
        //             };


        //             new Notification(noteTitle, noteOptions);
        //         });

        var validation_email_required = "<?php echo e(Helper::language('email_mobile_field_required')); ?>";
        var validation_email = "<?php echo e(Helper::language('enter_valid_email_validation')); ?>";
        var validation_password_required = "<?php echo e(Helper::language('password_field_required_validation')); ?>";
        var validation_password_length = "<?php echo e(Helper::language('password_length')); ?>";
        var these_credentials_do_not_match_our_records =
            "<?php echo e(Helper::language('these_credentials_do_not_match_our_records')); ?>";
        var test = $("#login_form").validate({
            // in 'rules' user have to specify all the constraints for respective fields
            rules: {
                email: {
                    required: true,
                    //  email: true
                },

                password: {
                    required: true,
                    minlength: 6,
                },
            },
            // in 'messages' user have to specify message as per rules
            messages: {

                email: {
                    required: validation_email_required,
                    // email: validation_email,
                },
                password: {
                    required: validation_password_required,
                    minlength: validation_password_length,
                },

            },
            submitHandler: function() {
                var form_data = new FormData($('#login_form')[0]);
                action_url = "<?php echo e(route('websiteloginpost')); ?>";
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
                        //$(".loader").fadeIn();
                        // $('.loader').css("visibility", "visible");
                    },
                    success: function(response) {
                        // console.log("response");
                        // console.log(response);

                        // var url = "<?php echo e(route('frontend.home')); ?>";
                        // window.location.href = url;

                        let checkout_value = response.checkout_value;
                        let counter = response.counter;
                        let pack_size = response.pack_size;

                        if (checkout_value == 1) {
                            // console.log("checkout_value");
                            // console.log(checkout_value);

                            // console.log("counter");
                            // console.log(counter);

                            // console.log("pack_size");
                            // console.log(pack_size);
                            // let checkoutUrl = '<?php echo e(route('checkout', ['counter' => ':counter', 'pack_size' => ':pack_size'])); ?>';
                            // checkoutUrl = checkoutUrl.replace(':counter', counter).replace(':pack_size', pack_size);

                            var checkoutUrl =
                                '<?php echo e(route('checkout')); ?>'; // This fetches the route '/checkout'

                            // console.log("Checkout URL:");
                            // console.log(checkoutUrl);

                            // Redirect to the checkout URL or handle as needed
                            window.location.href = checkoutUrl;
                            // console.log("checkoutUrl");
                            // console.log(checkoutUrl);
                            // window.location.href = checkoutUrl;

                        } else {
                            var homeUrl = '<?php echo e(route('frontend.home')); ?>';
                            window.location.href = homeUrl;
                        }

                    },
                    error: function(errors) {
                        // alert(errors);

                        //$('.loader').css("visibility", "hidden");

                        var erroJson = JSON.parse(errors.responseText);
                        var a = JSON.stringify(erroJson);
                        var b = JSON.parse(a);
                        // alert(b.email);
                        if (b.email == "These credentials do not match our records" || b.email ==
                            "Ces informations d'identification ne correspondent pas à nos dossiers"
                        ) {
                            $("span#errorMessageEmail").css("display", "block");
                            $("span#errorMsgEmail").css("display", "block");


                            $("span#errorMsgEmail").html(b.email);
                            setTimeout(function() {
                                $('#errorMsgEmail').fadeOut('fast');
                            }, 4000);

                        }
                        // console.log(erroJson.status);
                        if (erroJson.status == "error" || erroJson.id != "") {
                            // alert(erroJson.id);
                            $("span#errorMessagecommon").css("display", "block");
                            $("span#errorMsgcommon").css("display", "block");


                            // $("span#errorMsgcommon").html(erroJson.errors);

                            var url = "/send-otp-login/?id=" + erroJson.id;
                            if (erroJson.id) {
                                $("span#errorMsgcommon").html(erroJson.errors + ' <a href="' + url +
                                    '">click here</a>');
                            } else {
                                $("span#errorMsgcommon").html(erroJson.errors);

                            }
                            setTimeout(function() {
                                $('#errorMsgcommon').fadeOut('fast');
                            }, 4000);


                        } else if (erroJson.status == "error_password") {
                            $("span#errorMessagecommon").css("display", "block");
                            $("span#errorMsgcommon").css("display", "block");
                            $("span#errorMessageEmail").css("visible", "false");
                            $("span#errorMsgEmail").css("visible", "false");
                            $("span#errorMsgcommon").html(erroJson.errors);


                        } else {
                            for (var err in erroJson) {
                                for (var errstr of erroJson[err])

                                    $("span#errorMessagecommon").css("display", "block");
                                $("span#errorMsgcommon").css("display", "block");

                                $("span#errorMsgcommon").html(errstr);

                            }
                        }

                    }
                });
            }
        });
        //onclick in login for price
        //      function getproduct_id(product_id){

        //         localStorage.setItem('product_id',product_id);
        //      }

        // var page_full_url = $(location).attr('pathname');
        // if(page_full_url!='/login'){
        //     localStorage.removeItem(product_id)
        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/auth/login.blade.php ENDPATH**/ ?>