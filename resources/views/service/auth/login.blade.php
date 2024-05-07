<!DOCTYPE html>
@php
    $dir = 'ltr';
    if (str_replace('_', '-', app()->getLocale()) == 'ar') {
        $dir = 'rtl';
    }
@endphp
<html dir="{{ $dir }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('services/services.register-services') }}</title>

        <link href="https://www.nobleui.com/laravel/template/demo1/assets/plugins/jquery-steps/jquery.steps.css"
            rel="stylesheet" />

        <!-- common css -->
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <style>
            body {
                background: #EEF0F2;
            }
        </style>
    </head>

<body>
    <!-- Start Login Container -->
    <section class="container" style="margin-top: 120px">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <form class="border rounded-5 p-5 bg-white shadow box-area" method="POST"
                    action="{{ route('services.login') }}">
                    @csrf
                    <div class="text-center mb-3 text-gray-600">
                        <h1 class="text-center h3 mb-4">
                            {{ __('services/services.login-services-login') }}
                        </h1>
                        <span class="text-center text-black-50">{{ __('services/services.login-services-hello') }}</span>
                    </div>

                    <div class="mb-3">
                        <label for="email"
                            class="form-label">{{ __('services/services.register-services-email-address') }}*</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus
                            autocomplete="email">
                        @error('email')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password"
                            class="form-label">{{ __('services/services.register-services-password') }}</label>
                        <input type="password" class="form-control" id="password" name="password" required
                            autocomplete="current-password">
                        @error('password')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span
                                class="ms-2 text-sm text-gray-600">{{ __('services/services.login-services-remember-me') }}</span>
                        </label>
                    </div>
                    <div class="d-grid">
                        <button type="submit"
                            class="btn btn-primary btn-block">{{ __('services/services.login-services') }}</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <!-- End Login Container -->
</body>

</html>
