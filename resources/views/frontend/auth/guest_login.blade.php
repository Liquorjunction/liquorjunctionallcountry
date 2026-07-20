@extends('frontend.layouts.app')
@section('title', 'Login as Guest')
@section('content')
    @include('sweetalert::alert')
    <style>
        .valid_field {
            color: red;
        }
        .phone-number {
            display: flex;
            gap: 8px;
            align-items: stretch;
        }
        .phone-number select {
            max-width: 120px;
        }
    </style>
    <div class="loader" id="loader"></div>
    <section class="registration">
        <div class="container">
            <div id="Register" class="register">
                <div class="registration-content">
                    <h1 class="text-center mb-0">Continue as Guest User</h1>
                    <p class="text-center text-dark-grey mt-2 mb-0">Mobile OTP verification is required to place an order.</p>
                    <div class="registration-card">
                        <form class="row registration-form" id="guest_login_form" action="" novalidate>
                            @csrf
                            <input type="hidden" name="is_guest_user" value="1">
                            @if(isset($redirectTo))
                                <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
                            @endif
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name<span class="valid_field">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Enter your full name" required>
                                    <span id="guest-error" class='red-text'></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">{{ @Helper::language('phone_number') }}<span class="valid_field">*</span></label>
                                    <div class="input-group phone-number">
                                        <select class="numbers" name="phone_code" id="phone_code">
                                            <option value="233" selected>+233 (GH)</option>
                                            <option value="234">+234 (NG)</option>
                                            <option value="91">+91 (IN)</option>
                                            <option value="1">+1 (US)</option>
                                            <option value="44">+44 (UK)</option>
                                        </select>
                                        <input type="tel" name="phone" id="phone" placeholder="Enter mobile number" required>
                                    </div>
                                    <span id="guest-phone-error" class='red-text'></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">{{ @Helper::language('email_label') }} <span class="text-dark-grey">(optional)</span></label>
                                    <input type="email" placeholder="{{ @Helper::language('enter_email_place') }}" name="email" id="email">
                                    <span id="guest-email-error" class='red-text'></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="solid-button w-100" id="submitGuest">{{ 'Continue as Guest' }}</button>
                            </div>
                            <div class="registration-social">
                                    <p class="text-sm grey-text">{{ @Helper::language('login_or_continue_with') }}</p>
                                    <ul>
                                        <li>
                                            <a href="{{ route('auth.facebook') }}" target="_blank">
                                                <img src="{{ asset('assets/frontend/images/icon_login_facebook.svg') }}"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('auth.google') }}" target="_blank">
                                                <img src="{{ asset('assets/frontend/images/icon_login_google.svg') }}"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('auth.apple') }}" target="_blank">
                                                <img src="{{ asset('assets/frontend/images/icon_login_apple.svg') }}"
                                                    alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="text-center">{{ @Helper::language('login_not_register_yet') }}<a
                                        href="{{ route('websiteregister') }}">{{ @Helper::language('sign_up_btn') }}</a>
                                </p>
                            <p class="text-center">{{@Helper::language('register_already_a_member')}}<a href="{{route('websitelogin')}}" onclick="return show('Login','Register');">{{@Helper::language('login_label')}}</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $.validator.addMethod("validPhone", function(value, element) {
        value = (value || '').replace(/\D+/g, '');
        if (value.length < 9 || value.length > 15) return false;
        if (/^(\d)\1+$/.test(value)) return false;
        return true;
    }, "Please enter a valid mobile number.");

    $.validator.addMethod("validGuestName", function(value, element) {
        value = $.trim(value || '');
        if (value.length < 3) return false;
        if (!/[a-zA-Z]/.test(value)) return false;
        if (/^(.)\1{2,}$/.test(value.replace(/\s+/g, ''))) return false;
        return true;
    }, "Please enter a valid real name.");

    $('#guest_login_form').validate({
        rules: {
            name: { required: true, minlength: 3, maxlength: 30, validGuestName: true },
            phone: { required: true, validPhone: true },
            email: { email: true }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 3 characters",
                maxlength: "Name must be maximum 30 characters"
            },
            phone: {
                required: "Please enter your mobile number"
            },
            email: {
                email: "Please enter a valid email"
            }
        },
        submitHandler: function(form) {
            var form_data = new FormData(form);

            var name = form_data.get('name') || '';
            var first_name = name.split(' ')[0] || name;
            var last_name = name.split(' ').slice(1).join(' ') || '';
            form_data.append('first_name', first_name);
            form_data.append('last_name', last_name);
            form_data.set('phone', String(form_data.get('phone') || '').replace(/\D+/g, ''));

            var action_url = "{{ route('websiteregisterpost') }}";
            var csrf = "{{ csrf_token() }}";

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
                    $('.loader').css("visibility", "hidden");
                    // Guest must always verify OTP first — never go straight to checkout
                    if (response.guest_otp) {
                        window.location.href = "{{ route('websitesendotp') }}";
                        return;
                    }
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        window.location.href = "{{ route('websitesendotp') }}";
                    }
                },
                error: function(xhr) {
                    $('.loader').css("visibility", "hidden");
                    var errors = xhr.responseJSON || {};
                    $("#guest-error").text('');
                    $("#guest-email-error").text('');
                    $("#guest-phone-error").text('');
                    if (errors.name) {
                        $("#guest-error").text(errors.name[0]);
                    }
                    if (errors.email) {
                        $("#guest-email-error").text(errors.email[0]);
                    }
                    if (errors.phone) {
                        $("#guest-phone-error").text(errors.phone[0]);
                    }
                    if (!errors.name && !errors.email && !errors.phone) {
                        $("#guest-error").text('An error occurred. Please try again.');
                    }
                }
            });
        }
    });
</script>
@endsection
