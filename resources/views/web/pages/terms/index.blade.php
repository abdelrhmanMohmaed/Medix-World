@extends('web.layouts._app')

@section('title', __('website/web.terms-of-use'))

@section('styles')
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">
    <style>
        body {
            background: #EEF0F2;
        }

        #terms {
            margin: 70px 0 30px 0;
        }

        h1 {
            color: #5459CE;
        }
    </style>
@endsection

@section('main')
    <!-- Start About Section -->
    <section id="terms" class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="row justify-content-xl-center">
                        <h1 class="mb-3 h3">{{ __('website/web.terms-of-use') }}</h1>
                        <div class="col-12 col-xl-11">
                            @foreach ($terms as $item)
                                <h2 class="h3 mb-3">{{ @$item->getTranslation('title', app()->getLocale()) }}</h2>
                                <p class="text-secondary mb-3">
                                    {{ $item->getTranslation('description', app()->getLocale()) }}
                                </p> 
                                <p class="text-secondary" style="margin: 0 30px 20px 30px">
                                    {{ $item->getTranslation('sub_description', app()->getLocale()) }}
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