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
                    <h1 class="text-center mb-0">Login as Guest User</h1>
                    <div class="registration-card">
                        <form class="row registration-form" method="POST" action="{{ route('guest.login.submit') }}"
                            id="guest_login_form">
                            @csrf
                            <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
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
                                <button type="submit" class="solid-button w-100">Login as Guest</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endsection
