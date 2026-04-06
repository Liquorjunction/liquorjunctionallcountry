@extends('frontend.layouts.app')
@section('title', 'Login as Guest')
@section('content')
    @include('sweetalert::alert')
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
                            @csrf
                            <input type="hidden" name="is_guest_user" value="1">
                            @if(isset($redirectTo))
                                <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
                            @endif
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name<span class="valid_field">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="age">Age<span class="valid_field">*</span></label>
                                    <input type="number" name="age" id="age" placeholder="Enter Age"
                                        min="18" max="100" step="1" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email<span class="valid_field">*</span></label>
                                    <input type="email" name="email" id="email" placeholder="Enter Email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">Phone Number<span class="valid_field">*</span></label>
                                    <input type="text" name="phone" id="phone" placeholder="Enter Phone Number"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="solid-button w-100" id="submitGuest">{{ 'Continue as Guest' }}</button>
                                <span id="guest-error" class='red-text'></span>
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
    $('#guest_login_form').validate({
        submitHandler: function() {
            var form = $('#guest_login_form')[0];
            var form_data = new FormData(form);
            // Map 'name' to 'first_name' and 'last_name' for backend compatibility
            var name = form_data.get('name') || '';
            var first_name = name.split(' ')[0] || name;
            var last_name = name.split(' ').slice(1).join(' ') || name;
            form_data.append('first_name', first_name);
            form_data.append('last_name', last_name);

            var action_url = "{{ route('websiteregisterpost') }}";
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
                    $('.loader').css("visibility", "visible");
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        var url = "{{ route('websitesendotp') }}";
                        window.location.href = url;
                    }
                },
                error: function(errors) {
                    $('.loader').css("visibility", "hidden");
                    var errors = errors.responseJSON;
                    $("#guest-error").text('');
                    if (errors && typeof errors === 'object') {
                        if (errors.first_name) {
                            $("#guest-error").text(errors.first_name[0]);
                        }
                        if (errors.last_name) {
                            $("#guest-error").text(errors.last_name[0]);
                        }
                        if (errors.age) {
                            $("#guest-error").text(errors.age[0]);
                        }
                        if (errors.email) {
                            $("#guest-error").text(errors.email[0]);
                        }
                        if (errors.phone) {
                            $("#guest-error").text(errors.phone[0]);
                        }
                    } else {
                        $("#guest-error").text('An error occurred. Please try again.');
                    }
                }
            });
        }
    });
</script>
@endsection