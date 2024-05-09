@extends('web.layouts._app')

@section('title', __('website/web.about-us'))

@section('styles')
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">
    <style>
        body {
            background: #EEF0F2;
        }

        .icon,
        h1 {
            color: #5459CE;
        }
    </style>
@endsection

@section('main')
    @php
        $dir = 'ltr';
        if (str_replace('_', '-', app()->getLocale()) == 'ar') {
            $dir = 'rtl';
        }
    @endphp

    <!-- Start Search Navbar -->
    @include('web.partials.navbarSearch')
    <!-- End Search Navbar -->

    <!-- Start About Section -->
    <section id="about" class="mb-5">
        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                <div class="col-12 col-lg-6 col-xl-5 pt-3  ">
                    <img style="width: 100%" class="rounded" loading="lazy"
                        src="{{ asset('assets/images/user/about/default.jpg') }}" height="700" alt="">
                </div>

                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="row justify-content-xl-center">
                        <div class="col-12 col-xl-11">
                            <h1 class="mb-3 h3">{{ __('website/web.about-us') }}</h1>
                            <p class="lead fs-4 text-secondary mb-3">
                                {{ __('website/web.about-us-description') }}
                            </p>
                            <h4 class="mb-3">{{ __('website/web.about-us-our-vision') }}</h4>
                            <p class="mb-5">
                                {{ __('website/web.about-us-our-vision-description') }}
                            </p>
                            <h4 class="mb-3">{{ __('website/web.about-us-what-we-offer') }} :</h4>

                            <ul class="list-unstyled mb-5" {{--   style="{{ $dir == 'rtl' ? 'margin-right: -45px;' : '' }}" --}}>
                                <li class="mb-4">
                                    <div class="d-flex">
                                        <div class="me-4 icon">
                                            <i class="fas fa-stethoscope fa-2x ms-4" {{-- style="{{ $dir == 'rtl' ? 'margin-left: 25px;' : '' }}" --}}></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-3">{{ __('website/web.about-us-what-we-offer-find-doctors') }}
                                            </h4>
                                            <p class="text-secondary mb-0">
                                                {{ __('website/web.about-us-what-we-offer-find-doctors-description') }}</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="mb-4">
                                    <div class="d-flex">
                                        <div class="me-4 icon">
                                            <i class="fas fa-calendar-plus fa-2x ms-4" {{-- style="{{ $dir == 'rtl' ? 'margin-left: 25px;' : '' }}"  --}}></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-3">
                                                {{ __('website/web.about-us-what-we-offer-book-appointments') }}</h4>
                                            <p class="text-secondary mb-0">
                                                {{ __('website/web.about-us-what-we-offer-book-appointments-description') }}
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li class="mb-4">
                                    <div class="d-flex">
                                        <div class="me-4 icon">
                                            <i class="fas fa-file-medical fa-2x ms-4" {{-- style="{{ $dir == 'rtl' ? 'margin-left: 25px;' : '' }}" --}}></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-3">
                                                {{ __('website/web.about-us-what-we-offer-store-medical-history') }}
                                            </h4>
                                            <p class="text-secondary mb-0">
                                                {{ __('website/web.about-us-what-we-offer-store-medical-history-description') }}
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li class="mb-4">
                                    <div class="d-flex">
                                        <div class="me-4 icon">
                                            <i class="fas fa-star fa-2x ms-4" {{-- style="{{ $dir == 'rtl' ? 'margin-left: 25px;' : '' }}" --}}></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-3">
                                                {{ __('website/web.about-us-what-we-offer-rate-doctors') }}</h4>
                                            <p class="text-secondary mb-0">
                                                {{ __('website/web.about-us-what-we-offer-rate-doctors-description') }}
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li class="mb-4">
                                    <div class="d-flex">
                                        <div class="me-4 icon">
                                            <i class="fas fa-user-md fa-2x ms-4" {{-- style="{{ $dir == 'rtl' ? 'margin-left: 25px;' : '' }} --}} "></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="mb-3">
                                                            {{ __('website/web.about-us-what-we-offer-enhance-doctor-experience') }}
                                                        </h4>
                                                        <p class="text-secondary mb-0">
                                                            {{ __('website/web.about-us-what-we-offer-enhance-doctor-experience-description') }}
                                                        </p>
                                            </li>
                                        </ul>

                                        <p class="mb-0">{{ __('website/web.about-us-what-we-offer-for-further-information') }}
                                            <a href="mailto:medix@world.com">medix@world.com</a>
                                        </p>
                                        <!-- Contact Information Goes Here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                <!-- End About Section -->
@endsection

@section('scripts')
                <script src="{{ asset('assets/js/user/OAuth.js') }}"></script>
@endsection
