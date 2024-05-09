@extends('web.layouts._app')

@section('title', __("website/web.login-login"))

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/user/login.css') }}">
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">
@endsection

@section('main')
    <!-- Login Container -->
    <section class="container py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!-- Left Box -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #ffff;">
                <div class="featured-image mb-3">
                    <img src="{{ asset('assets/images/user/login/default.jpg') }}" class="img-fluid" style="width: 250px;">
                </div>
                <p class=" fs-2" style="font-weight: 600;">
                    {{ __('website/web.login-be-verified') }}
                </p>
                <small class=" text-wrap text-center"
                    style="width: 17rem;">
                    {{ __('website/web.login-be-verified-summary') }}
                </small>
            </div>
            <!-- End Left Box -->

            <!-- Right Box -->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h1 class="h3">{{ __('website/web.login-hello') }}</h3>
                        <p class="text-black-50">{{ __('website/web.login-happy') }}</p>
                    </div>
                    <form method="POST" action="{{ route('website.login') }}">
                        @csrf
                        <div class="input-group mb-2">
                            <input type="email" name="email" autofocus autocomplete="username" required
                                @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('email'),
                                ]) placeholder="{{ __('website/web.login-email-address') }}">
                        </div>
                        @error('email')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                        @enderror

                        <div class="input-group mb-1">
                            <input type="password" name="password" autocomplete="current-password" required
                                @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('password'),
                                ]) placeholder="{{ __('website/web.login-password') }}">
                        </div>
                        @error('password')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                        @enderror

                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck" name="remember">
                                <label for="formCheck"
                                    class="form-check-label text-secondary"><small>{{ __('website/web.login-remember-me') }}</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">{{ __('website/web.login-forgot-password') }}</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button style="background-color: rgb(239, 15, 15);" type="submit"
                                class="btn btn-lg w-100 fs-6 text-white">{{ __('website/web.login-login') }}</button>
                        </div>
                    </form>
                    <div class="input-group mb-3">
                        {{-- <button class="btn btn-lg btn-light w-100 fs-6">
                            <img src="{{ asset('assets/images/user/login/google.png') }}" style="width:20px"
                                class="me-2"><small>Sign In with Google</small>
                        </button> --}}
                    </div>
                    <div class="row">
                        <small>{{ __('website/web.login-have-account') }} <a
                                href="#">{{ __('website/web.sign-up') }}</a></small>
                    </div>
                </div>
            </div>
            <!-- End Right Box -->
        </div>
    </section>
    <!-- End Login Container -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/OAuth.js') }}"></script>
@endsection
