@extends('web.layouts._app')

@section('title', __('website/web.medix-welcome'))

@section('styles')
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">
    <style>
        body {
            background: #EEF0F2;
        }

        h6 {
            font-size: 12px;
            color: #00000089;
        }

        #display_providers .card,
        .dropdown button,
        .bookingForm {
            box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
        }

        #display_providers .card,
        .bookingForm {
            border-radius: 30px;
        }

        #display_providers .card-body {
            padding: 25px;
            margin-top: -10px;
        }
    </style>
@endsection

@section('main')

    <!-- Start Search Navbar -->
    @include('web.partials.navbarSearch')
    <!-- End Search Navbar -->

    <!-- Start About Section -->
    <section id="display_providers" class="mb-5">
        <div class="container">
            <div class="row">
                <!-- Start Services Details -->
                <div class="col-md-6">
                    <!-- Start navbar link -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-start align-items-center">
                                <a href="{{ route('website.welcome') }}" style="text-decoration: none;">
                                    {{ __('website/web.medix-title') }}
                                </a>
                                <span>&nbsp;/&nbsp;</span>
                                <a href="{{ route('website.search.service-provider.show', $serviceProvider->id) }}"
                                    style="text-decoration: none;">
                                    {{ $serviceProvider->getTranslation('name', app()->getLocale()) }}
                                </a>
                                <span>&nbsp;/&nbsp;</span>
                                <h4 class="h6 mb-0 ml-2 text-black-50">
                                    {{ __('website/web.provider-doctor-reservation-information') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- End navbar link -->

                    <!-- Start Services Details -->
                    <div class="row">
                        <div class="col-12 h-25 d-flex justify-content-between">
                            <div class="col-md-12">
                                <div class="card my-1 py-5">
                                    <div class="d-flex card-body justify-content-between">
                                        <!-- Start Service Image -->
                                        <div class="col-md-3 show-more">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ asset($serviceProvider->img) }}" alt=""
                                                    class="img-fluid rounded-circle"
                                                    style="overflow: hidden; width: 150px; height: 130px;">
                                            </div>
                                        </div>
                                        <!-- End Service Image -->
                                        <!-- Start Appointment details -->
                                        <div class="col-md-9 show-more">
                                            <div class="d-flex flex-column ">
                                                <span class="mb-0" style="color: #0070CD">
                                                    @if ($serviceProvider->user->gender == 1)
                                                        {{ __('website/web.provider-male') }}
                                                    @else
                                                        {{ __('website/web.provider-female') }}
                                                    @endif
                                                    <span
                                                        class="h5">{{ $serviceProvider->getTranslation('name', app()->getLocale()) }}</span>
                                                </span>
                                                <h6 class="mb-0">
                                                    {{ $serviceProvider->title->title }}
                                                    {{ $serviceProvider->major->name }}
                                                </h6>
                                                <h6 class="mb-0 my-2">
                                                    <i
                                                        class="icon fa-solid fa-location-dot mx-2"></i>&nbsp;&nbsp;{{ $serviceProvider->region->getTranslation('name', app()->getLocale()) }}:
                                                    {{ $serviceProvider->getTranslation('address', app()->getLocale()) }}
                                                </h6>
                                                <h5 class="mb-0 ms-2 my-2">
                                                    <span class="fw-bold h6">
                                                        {{ __('website/web.provider-doctor-day') }}
                                                        {{ \Carbon\Carbon::parse($schedule->start_time)->locale(app()->getLocale())->isoFormat('dddd D-M-Y') }}
                                                        <br>
                                                        <small class="fw-bold">
                                                            {{ __('website/web.provider-doctor-from') }}

                                                            {{ \Carbon\Carbon::parse($schedule->start_time)->locale(app()->getLocale())->isoFormat('h:mm A') }}
                                                        </small>
                                                        /
                                                        <small class="fw-bold">
                                                            {{ __('website/web.provider-doctor-to') }}
                                                            {{ \Carbon\Carbon::parse($schedule->end_time)->locale(app()->getLocale())->isoFormat('h:mm A') }}
                                                        </small>
                                                    </span>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- End Appointment details -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Services Details -->
                </div>
                <!-- End Services Details -->


                <!-- Start Booking section -->
                <div class="col-md-6" style="margin-top: 1.7rem !important;">
                    <div class="container bookingForm bg-white d-flex flex-column flex-shrink-0 p-3">
                        <div class="header-text my-4 text-center">
                            <h1 class="h3">{{ __('website/web.provider-doctor-reservation-information') }}</h1>
                            <p class="text-black-50">{{ __('website/web.provider-doctor-reservation-wish') }}</p>
                        </div>
                        <form class="my-2" method="POST"
                            action="{{ route('website.booking.service-provider.store', ['schedule' => $schedule->id, 'serviceProvider' => $serviceProvider->id]) }}">
                            @csrf
                            <label for="FullName">{{ __('website/web.full-name') }}*</label>
                            <div class="input-group my-2">
                                <input type="text" required id="FullName" name="fullName" autofocus autocomplete="name"
                                    value="{{ Auth::guard('web')->check() ? Auth::user()->email : old('name') }}"
                                    placeholder="{{ __('website/web.full-name') }}" @class([
                                        'form-control form-control-lg bg-light fs-6',
                                        'is-invalid' => $errors->has('fullName'),
                                    ])>
                            </div>

                            @error('fullName')
                                <small class="text-danger">
                                    &#x2022; {{ $message }}
                                </small>
                                <br>
                            @enderror

                            <label for="tel">{{ __('website/web.register-tel') }}*</label>
                            <div class="input-group my-2">
                                <input type="tel" id="tel" name="tel" required autofocus autocomplete="tel"
                                    value="{{ old('tel') }}"
                                    placeholder="+201123843996" @class([
                                        'form-control form-control-lg bg-light fs-6',
                                        'is-invalid' => $errors->has('tel'),
                                    ])>
                            </div>
                            @error('tel')
                                <small class="text-danger">
                                    &#x2022; {{ $message }}
                                </small>
                                <br>
                            @enderror

                            <label for="email">{{ __('website/web.email-address') }}</label>
                            <div class="input-group my-2">
                                <input type="email" id="email" name="email" autofocus autocomplete="username"
                                    value="{{ Auth::guard('web')->check() ? Auth::user()->email : old('fullName') }}"
                                    @class([
                                        'form-control form-control-lg bg-light fs-6',
                                        'is-invalid' => $errors->has('email'),
                                    ])
                                    placeholder="example@domin.com ({{ __('website/web.provider-doctor-optional') }})">
                            </div>
                            @error('email')
                                <small class="text-danger">
                                    &#x2022; {{ $message }}
                                </small>
                                <br>
                            @enderror
                            <div class="input-group my-3">
                                <button style="background-color: rgb(239, 15, 15);" type="submit"
                                    class="btn btn-lg w-100 fs-6 text-white">
                                    {{ __('website/web.provider-doctor-book') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Booking section -->
            </div>
        </div>
    </section>
    <!-- End About Section -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/OAuth.js') }}"></script>
@endsection
