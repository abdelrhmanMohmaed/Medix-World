@extends('web.layouts._app')

@section('title', __('website/web.terms-of-use'))

@section('styles')
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">
    <style>
        body {
            background: #EEF0F2;
        }

        h1 {
            color: #0070CD;
        }
    </style>
@endsection

@section('main')

    <!-- Start Search Navbar -->
    @include('web.partials.navbarSearch')
    <!-- End Search Navbar -->

    <!-- Start About Section -->
    <section id="terms" class="mb-5">
        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="row justify-content-xl-center">
                        <h1 class="mb-3 icon">{{ __('website/web.terms-of-use') }}</h1>
                        <div class="col-12 col-xl-11">
                            @foreach ($terms as $item)
                                <h2 class="h3 mb-3">{!! @$item->getTranslation('title', app()->getLocale()) !!}</h2>
                                <p class="text-secondary mb-3">
                                    {!! $item->getTranslation('description', app()->getLocale()) !!}
                                </p>
                                <p class="text-secondary ps-5"  >
                                    {!! $item->getTranslation('sub_description', app()->getLocale()) !!}
                                </p>
                            @endforeach
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
