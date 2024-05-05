@extends('web.layouts._app')

@section('title', __('website/web.medix-welcome'))

@section('styles')
    <style>
        /* Start Hero Section */
        .hero-section {
            background: url("{{ asset('assets/images/advices/default.png') }}") no-repeat center;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }

        .hero-section::before {
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.4);
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .hero-section .container {
            height: 100vh;
            z-index: 1;
            position: relative;
        }

        .hero-section h1 {
            font-size: 1.5em;
        }

        .hero-section h2 {
            font-size: 1.2em;
        }

        /* End Hero Section */

        /* Start Advices Section */
        .card {
            border-radius: 30px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
        }

        .card-body {
            padding: 25px;
            margin-top: -15px;
        }

        .card-img-top {
            border-radius: 50px;
            padding: 20px;
        }

        /* End Advices Section */
        /* Start General Idea */
        .card .card-icon {
            display: flex;
            width: 100%;
            height: 80px;
            justify-content: flex-start;
            padding: 25px;
        }

        .icon {
            color: #5459CE;
        }

        .icon-line {
            width: 43px;
            border: 2px solid rgb(239, 15, 15);
        }

        /* End General Idea */

        /* Start Contact Us */
        #contact-us,
        #advice {
            background: #EEF0F2;
        }

        /* End Contact Us */
    </style>
@endsection

@section('main')
    @php
        $dir = 'ltr';
        if (str_replace('_', '-', app()->getLocale()) == 'ar') {
            $dir = 'rtl';
        }
    @endphp

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container contad-flex d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Medix World</h1>
            <h2>The best way to find you services</h2>


            <div class="row row-cols-1 row-cols-md-3 g-4 py-5 w-100">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul id="dropdown-menu-major" class="dropdown-menu"
                                    style="max-height: 300px; overflow: auto;">
                                    <input id="search" type="text" placeholder="Search">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
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
                                <img src="{{ asset($item->img) }}" loading="lazy" class="card-img-top" alt="advices">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->getTranslation('title', app()->getLocale()) }}
                                    </h5>
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
                        <div class="icon-line"
                            style="{{ $dir == 'rtl' ? 'margin-right: 25px;' : 'margin-left: 25px;' }}">
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
        <div class="container py-5">
            <h2 class="text-center">{{ __('website/web.contact-us') }}</h2>
            <p class="text-center">{{ __('website/web.contact-sub-title') }}</p>
            <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
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
        </div>
    </section>
    <!-- End Contact us Section -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/landing.js') }}"></script>
<script>
    // search(ul)
</script>
@endsection
