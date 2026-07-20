@extends('frontend.layouts.app')
@section('title',Helper::language('edit_account'))
@section('content')
@include('sweetalert::alert')
<style>
    .text-red{
        color:red;
    }
</style>
<div class="bread-crumb-block">
    <div class="container">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">{{@Helper::language('home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('my-account')}}">{{@Helper::language('my_account_label')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{@Helper::language('edit_account')}}</li>
        </ul>
    </div>
</div>
<section class="change-password pt-20 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                @include('frontend.layouts.account-sidebar')
            </div>
            <div class="col-lg-9 col-md-8">
                <h2>{{@Helper::language('edit_profile_heading')}}</h2>
                <div class="common-card">
                    <form class="row edit-profile-form" id="edit_profile_form" novalidate>
                        <div id="phoneError" class="alert alert-warning" style="display:none;font-weight:bold;"></div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{@Helper::language('first_name_label')}}<span class="text-red">*</span></label>
                                <input type="text" name="first_name" placeholder="{{@Helper::language('Enter_firstname_place')}}" class="required" value="{{isset($myProfile->first_name) ? $myProfile->first_name :''}}" id="first_name" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                            <?php
                                // dd(@Helper::language('name_label'));
                                ?>
                                <label for="">{{@Helper::language('last_name_label')}}<span class="text-red">*</span></label>
                                <input type="text" name="last_name" placeholder="{{@Helper::language('enter_lastname_place')}}" value="{{isset($myProfile->last_name) ? $myProfile->last_name :''}}"required>
                                <span class="help-block" id="errorMessageLastname" style="display:none;">
                                    <span class="mb-4"style="color: #FF4444;font-size:14px; display: none; float:left;"  id="errorMsgLastname" class='validate validate-error text-center'></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{@Helper::language('email_label')}}<span class="text-red"></span></label>
                                <input type="email" readonly name="email"  placeholder="{{@Helper::language('enter_email_place')}}"value="{{isset($myProfile->email) ? $myProfile->email :''}}" class="required" required style="background: #f1f1f1;">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="form-group has-validation">
                                <label for="">
                                    {{@Helper::language('phone_number')}}<span class="text-red">*</span>
                                    <span id="phoneVerifiedBadge" class="phone-verified-badge" style="{{ (int)@$myProfile->is_otp_verify === 1 ? '' : 'display:none;' }}">Mobile Verified</span>
                                    <span id="phoneUnverifiedBadge" class="phone-unverified-badge" style="{{ (int)@$myProfile->is_otp_verify === 1 ? 'display:none;' : '' }}">Mobile Not Verified</span>
                                </label>
                                <div class="input-group phone-number">
                                    <select class="numbers" name="phone_code" id="phone_code">
                                        @foreach($countryData as $value)
                                        <option value="{{$value->phonecode}}" {{(@$myProfile->phone_code == $value->phonecode) ? 'selected' : ''}} > + {{$value->phonecode.' ('.$value->shortname.')'}}</option>
                                        @endforeach
                                    </select>
                                    <input type="tel" name="phone" maxlength="15" placeholder="{{@Helper::language('enter_phone_number_place')}}" value="{{isset($myProfile->phone) ? $myProfile->phone :''}}" id="phone" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="mt-2" id="phoneVerifyActions" style="{{ (int)@$myProfile->is_otp_verify === 1 ? 'display:none;' : '' }}">
                                    <button type="button" class="border-button" id="btnVerifyPhone">Verify Mobile Number</button>
                                    <small class="d-block text-dark-grey mt-1">Verify your mobile number to place orders securely.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <button class="solid-button w-100" type="submit">{{@Helper::language('save_details_btn')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Verify phone OTP modal -->
<div class="modal fade" id="profilePhoneOtpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title">Verify Mobile Number</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3" id="profileOtpMessage">Enter the OTP sent to your mobile number.</p>
                <div class="form-group mb-3">
                    <label>OTP</label>
                    <input type="text" class="form-control" id="profile_otp" maxlength="6" inputmode="numeric" placeholder="Enter 6-digit OTP">
                </div>
                <button type="button" class="solid-button w-100 mb-2" id="btnSubmitProfileOtp">Verify OTP</button>
                <button type="button" class="border-button w-100" id="btnResendProfileOtp">Resend OTP</button>
                <p class="red-text mt-2 mb-0" id="profileOtpError"></p>
            </div>
        </div>
    </div>
</div>

<style>
    .phone-verified-badge {
        display: inline-block;
        margin-left: 8px;
        padding: 2px 10px;
        border-radius: 12px;
        background: #e8f8ef;
        color: #1b7a3d;
        font-size: 12px;
        font-weight: 600;
        vertical-align: middle;
    }
    .phone-unverified-badge {
        display: inline-block;
        margin-left: 8px;
        padding: 2px 10px;
        border-radius: 12px;
        background: #fff3e8;
        color: #b85c00;
        font-size: 12px;
        font-weight: 600;
        vertical-align: middle;
    }
</style>
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
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
    var validation_first_name_required="{{ \Helper::language('first_name_required'); }}";
    var validation_first_name_minlength="{{ \Helper::language('first_name_min_valiadation'); }}";
    var validation_first_name_max_length="{{ \Helper::language('first_name_max_validation'); }}";
    
    var validation_last_name_required="{{ \Helper::language('last_name_field_is_required'); }}";
    var validation_last_name_minlength="{{ \Helper::language('last_name_min_valiadation_msg'); }}";
    var validation_last_name_max_length="{{ \Helper::language('last_name_max_validation'); }}";
    
    var validation_email_required="{{ \Helper::language('email_field_required'); }}";
    var validation_email="{{ \Helper::language('enter_valid_email_validation'); }}";

    
    var validation_phone_required="{{ \Helper::language('phone_number_field_is_required'); }}";
    var validation_phone_minlength="{{ \Helper::language('phone_number_min_max'); }}";
    var validation_phone_maxlength="{{ \Helper::language('phone_number_min_max'); }}";
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
            action_url = "{{ route('upadte-profile') }}";
            var csrf = "{{ csrf_token() }}";
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
                    if (response.needs_phone_verify) {
                        markPhoneUnverified();
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'info',
                                text: 'Profile saved. Please verify your mobile number.'
                            }).then(function() {
                                openProfilePhoneOtp();
                            });
                            return;
                        }
                    }
                    var url = "{{route('my-account')}}";
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

    var initialPhone = $('#phone').val();
    var initialPhoneCode = $('#phone_code').val();
    var phoneVerified = {{ (int)@$myProfile->is_otp_verify === 1 ? 'true' : 'false' }};

    function markPhoneVerified() {
        phoneVerified = true;
        $('#phoneVerifiedBadge').show();
        $('#phoneUnverifiedBadge').hide();
        $('#phoneVerifyActions').hide();
        initialPhone = $('#phone').val();
        initialPhoneCode = $('#phone_code').val();
    }

    function markPhoneUnverified() {
        phoneVerified = false;
        $('#phoneVerifiedBadge').hide();
        $('#phoneUnverifiedBadge').show();
        $('#phoneVerifyActions').show();
    }

    function showProfileOtpModal() {
        $('#profileOtpError').text('');
        $('#profile_otp').val('');
        var modalEl = document.getElementById('profilePhoneOtpModal');
        if (window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        } else {
            $('#profilePhoneOtpModal').modal('show');
        }
    }

    function hideProfileOtpModal() {
        var modalEl = document.getElementById('profilePhoneOtpModal');
        if (window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).hide();
        } else {
            $('#profilePhoneOtpModal').modal('hide');
        }
    }

    function openProfilePhoneOtp() {
        $('#profileOtpError').text('');
        $.ajax({
            type: 'POST',
            url: "{{ route('profile.sendPhoneOtp') }}",
            data: {
                _token: "{{ csrf_token() }}",
                phone: $('#phone').val(),
                phone_code: $('#phone_code').val()
            },
            beforeSend: function() {
                $('.loader').css('visibility', 'visible');
            },
            success: function(res) {
                $('.loader').css('visibility', 'hidden');
                $('#profileOtpMessage').text(res.message || 'Enter the OTP sent to your mobile number.');
                showProfileOtpModal();
            },
            error: function(xhr) {
                $('.loader').css('visibility', 'hidden');
                var msg = (xhr.responseJSON && xhr.responseJSON.message) || 'Unable to send OTP.';
                if (typeof Swal !== 'undefined') {
                    Swal.fire({ icon: 'error', text: msg });
                } else {
                    alert(msg);
                }
            }
        });
    }

    $('#phone, #phone_code').on('change input', function() {
        if ($('#phone').val() !== initialPhone || $('#phone_code').val() !== initialPhoneCode) {
            markPhoneUnverified();
        } else if (phoneVerified) {
            markPhoneVerified();
        }
    });

    $('#btnVerifyPhone, #btnResendProfileOtp').on('click', function() {
        openProfilePhoneOtp();
    });

    $('#btnSubmitProfileOtp').on('click', function() {
        $('#profileOtpError').text('');
        $.ajax({
            type: 'POST',
            url: "{{ route('profile.verifyPhoneOtp') }}",
            data: {
                _token: "{{ csrf_token() }}",
                otp: $('#profile_otp').val()
            },
            beforeSend: function() {
                $('.loader').css('visibility', 'visible');
            },
            success: function(res) {
                $('.loader').css('visibility', 'hidden');
                hideProfileOtpModal();
                markPhoneVerified();
                if (typeof Swal !== 'undefined') {
                    Swal.fire({ icon: 'success', text: res.message || 'Mobile number verified successfully.' });
                }
            },
            error: function(xhr) {
                $('.loader').css('visibility', 'hidden');
                var msg = (xhr.responseJSON && xhr.responseJSON.message) || 'OTP verification failed.';
                $('#profileOtpError').text(msg);
            }
        });
    });
</script>
@endsection