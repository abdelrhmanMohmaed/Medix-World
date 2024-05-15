@extends('web.layouts._app')

@section('title', __('website/web.medix-welcome'))

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/user/welcome.css') }}">
    <style>
        .hero-section {
            background: url("{{ asset('assets/images/user/landing/default.jpg') }}") no-repeat center;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }
    </style>
@endsection

@section('main')
    <!-- Start include php condation to fix style ar or en -->
    @php
        $dir = 'ltr';
        if (str_replace('_', '-', app()->getLocale()) == 'ar') {
            $dir = 'rtl';
        }
    @endphp
    <!-- End include php condation to fix style ar or en -->

    <!-- Start Hero Section -->
    <section class="hero-section">
        <div class="container contad-flex d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-5 w-100">
                <div class="col-md-12">
                    <div class="card p-3">

                        <div class="col-md-12 text-center">
                            <div class="row justify-content-center align-items-center">
                                <h1 style="font-size: 40px" class="my-2">{{ __('website/web.text-slider-title') }}</h1>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <h4 class=""><span id="typed-text"></span></h4>
                            </div>
                        </div>


                        <div class="card-body">
                            <!-- Start Form Search-->
                            <hr class="text-white">
                            <div class="col-md-12">
                                <form class="row" action="{{ route('website.search.service-provider') }}" method="get">

                                    <div class="col-md-3">
                                        <div class="btn-group w-100">
                                            <select class="form-select select2 w-100" name="major">
                                                <option selected disabled>{{ __('website/web.choose-specialty') }}
                                                </option>
                                                @foreach ($allMajors as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->getTranslation('name', app()->getLocale()) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="btn-group w-100">
                                            <select class="city form-select select2 w-100" name="city">
                                                <option selected disabled>{{ __('website/web.choose-city') }}</option>
                                                <option value="allCities">
                                                    {{ __('website/web.website/web.choose-specialty-all') }}</option>
                                                @foreach ($allCities as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->getTranslation('name', app()->getLocale()) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="btn-group w-100">
                                            <select class="region form-select select2 w-100" name="area">
                                                <option selected disabled>{{ __('website/web.choose-area') }}</option>
                                                <option value="allAreas">
                                                    {{ __('website/web.website/web.choose-area-all') }}</option>
                                                <!-- Display as us axios -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="btn-group w-100">
                                            <button type="submit" class="btn searh-btn p-2 text-center"
                                                title="{{ __('website/web.choose-search') }}">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                {{ __('website/web.choose-search') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Form Search-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Start Advices Section -->
    <section id="advice" class="advices-section">
        <div class="container py-5">
            <h2 class="text-center">{{ __('website/web.advice') }}</h2>
            <p class="text-center">{{ __('website/web.advice-sub-title') }}</p>
            <div class="owl-carousel owl-theme" style="width: 100%;">
                @foreach ($advices as $item)
                    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                        <div class="col-md-12">
                            <div class="card">
                                <img src="{{ asset($item->img) }}" {{-- loading="lazy" --}} class="card-img-top"
                                    alt="advices">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->getTranslation('title', app()->getLocale()) }}</h5>
                                    <p class="card-text">
                                        {{ $item->getTranslation('description', app()->getLocale()) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Advices Section -->

    <!-- Start General Idea Section -->
    <section id="general_idea" class="general-idea">
        <div class="container py-5">
            <div class="row row-cols-1 row-cols-md-4 g-4 py-5">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-icon">
                            <i class="icon fa-solid fa-hand-holding-medical fa-3x"></i>
                        </div>
                        <div class="icon-line"
                            style="{{ $dir == 'rtl' ? 'margin-right: 25px; width: 55px;' : 'margin-left: 25px; width: 53px;' }}">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ __('website/web.general-idea-healthcare') }}</h5>
                            <p class="card-text">{{ __('website/web.general-idea-healthcare-description') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <div class="card-icon">
                            <i class="icon fa-solid fa-star fa-3x"></i>
                        </div>
                        <div class="icon-line" style="{{ $dir == 'rtl' ? 'margin-right: 31px;' : 'margin-left: 30px;' }}">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ __('website/web.general-idea-reviews') }}</h5>
                            <p class="card-text">{{ __('website/web.general-idea-reviews-description') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <div class="card-icon">
                            <i class="icon fa-regular fa-calendar-check fa-3x"></i>
                        </div>
                        <div class="icon-line" style="{{ $dir == 'rtl' ? 'margin-right: 25px;' : 'margin-left: 25px;' }}">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ __('website/web.general-idea-booking') }}</h5>
                            <p class="card-text">{{ __('website/web.general-idea-booking-description') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <div class="card-icon">
                            <i class="icon fa-solid fa-user-shield fa-3x"></i>
                        </div>
                        <div class="icon-line"
                            style="{{ $dir == 'rtl' ? 'margin-right: 25px; width: 62px;' : 'margin-left: 25px;width: 58px;' }}">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ __('website/web.general-idea-pay') }}</h5>
                            <p class="card-text text-gray-900">{{ __('website/web.general-idea-pay-description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End General Idea Section -->

    <!-- Start Contact us Section -->
    <section id="contact-us" class="contact-us-section">
        <div class="container py-4">
            <h2 class="text-center">{{ __('website/web.contact-us') }}</h2>
            <p class="text-center">{{ __('website/web.contact-sub-title') }}</p>
            <div class="row row-cols-1 row-cols-md-3 g-4 py-1">

                <div class="col-md-12">
                    <form method="post" action="{{ route('website.contact.store') }}">
                        @csrf
                        <div class="mb-1">
                            <label for="full_name" class="form-label">{{ __('website/web.full-name') }}</label>
                            <input type="name" name="fullName" value="{{ old('fullName') }}" required
                                @class(['form-control', 'is-invalid' => $errors->has('fullName')]) id="full_name">
                            @error('fullName')
                                <small class="text-danger">
                                    &#x2022; {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">{{ __('website/web.email-address') }}</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email">
                            @error('email')
                                <small class="text-danger">
                                    &#x2022; {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="subject" class="form-label">{{ __('website/web.subject') }}</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required
                                @class(['form-control', 'is-invalid' => $errors->has('subject')]) id="subject">
                            @error('subject')
                                <small class="text-danger">
                                    &#x2022; {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label">{{ __('website/web.message') }}</label>
                            <textarea required name="message" id="message" cols="30" rows="10" @class(['form-control', 'is-invalid' => $errors->has('message')])>
                                        {{ old('message') }}
                            </textarea>
                            @error('message')
                                <small class="text-danger">
                                    &#x2022; {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn form-control text-white"
                            style="background-color: rgb(239, 15, 15)">
                            {{ __('website/web.send-now') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact us Section -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/landing.js') }}"></script>
    <script>
        var typed = new Typed('#typed-text', {
            strings: [
                "{{ __('website/web.text-slider-1') }}",
                "{{ __('website/web.text-slider-2') }}",
                "{{ __('website/web.text-slider-3') }}",
                "{{ __('website/web.text-slider-4') }}",
                "{{ __('website/web.text-slider-5') }}",
                "{{ __('website/web.text-slider-6') }}",
            ],
            typeSpeed: 45,
            backSpeed: 45,
            loop: true,
        });
    </script>
@endsection
