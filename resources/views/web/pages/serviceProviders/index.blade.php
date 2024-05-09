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
        .dropdown button {
            box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
        }

        #display_providers .card {
            border-radius: 30px;
        }

        #display_providers .card-body {
            padding: 25px;
            margin-top: -15px;
        }

        #display_providers .card:hover {
            background: #dfe1e3;
            transition: 0.3s ease-in-out;

        }

        .icon {
            color: #5459CE;
        }

        .icon-gold {
            color: gold;
        }

        .readBtn {
            cursor: pointer;
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
    <section id="display_providers" class="mb-5">
        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0">
                <div class="col-md-2 pt-3">
                    <img style="width: 100%" class="rounded" loading="lazy"
                        src="{{ asset('assets/images/user/about/default.jpg') }}" height="700" alt="">
                </div>

                <div class="col-md-10">
                    <div class="row">
                        <div class="col-12 h-25 d-flex justify-content-between py-4 ">
                            <div class="h-100">
                                <h3 class="h5 text-black-50">
                                    {{ $majorName != null ? $majorName->getTranslation('name', app()->getLocale()) : __('website/web.provider-all-specialty') }}
                                    <span class="h6">{{ $total }}{{ __('website/web.provider-male') }}</span>
                                </h3>
                            </div>
                            <div class=" h-100">
                                <div class="dropdown">
                                    <button class="btn bg-white text-black dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($results as $item)
                        <div class="row show-more" data-user-id="{{ $item->user->id }}">
                            <div class="col-12 h-25 d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="card my-3 py-5">
                                        <div class="d-flex card-body justify-content-between">

                                            <div class="col-md-2">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img src="{{ asset($item->img) }}" alt=""
                                                        class="img-fluid rounded-circle"
                                                        style="overflow: hidden; width: 150px; height: 130px;">
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="d-flex flex-column ">
                                                    <span class="mb-0" style="color: #5459CE">
                                                        @if ($item->user->gender == 1)
                                                            {{ __('website/web.provider-male') }}
                                                        @else
                                                            {{ __('website/web.provider-female') }}
                                                        @endif
                                                        <span
                                                            class="h5">{{ $item->getTranslation('name', app()->getLocale()) }}</span>
                                                    </span>

                                                    <h6 class="mb-0">
                                                        {{ $item->title->title }} {{ $item->major->name }}
                                                    </h6>
                                                    <br>
                                                    <h6 class="mb-0">
                                                        @php
                                                            $start = 3;
                                                        @endphp
                                                        <li class="list-group-item">
                                                            @for ($i = 1; $i <= $start; $i++)
                                                                <i class="icon-gold fa-solid fa-star"></i>
                                                            @endfor
                                                            @for ($i = 1; $i <= 5 - $start; $i++)
                                                                <i class="fa-regular fa-star"></i>
                                                            @endfor
                                                        </li>
                                                    </h6>

                                                    <h6 class="mb-0 my-2">
                                                        التقييم العام من ١٨ زاروا الدكتور
                                                    </h6>

                                                    <h6 class="mb-0 my-2">
                                                        {{ $item->getTranslation('name', app()->getLocale()) }}
                                                    </h6>
                                                    <h6 class="mb-0 my-2">
                                                        <i class="icon fa-solid fa-stethoscope mx-2"></i>
                                                        <span id="summary{{ $loop->index }}" class="summary">
                                                            {{ substr($item->getTranslation('summary', app()->getLocale()), 0, 30) }}
                                                        </span>
                                                        <a id="readMore{{ $loop->index }}" class="readBtn"
                                                            style="text-decoration: underline; color: #0a58ca;"
                                                            onclick="toggleSummary({{ $loop->index }})">{{ __('website/web.provider-read-more') }}</a>
                                                    </h6>

                                                    <!-- Start Address Price -->
                                                    <h6 class="mb-0 my-2">
                                                        <i
                                                            class="icon fa-solid fa-location-dot mx-2"></i>&nbsp;&nbsp;{{ $item->region->getTranslation('name', app()->getLocale()) }}:
                                                        {{ $item->getTranslation('address', app()->getLocale()) }}
                                                    </h6>

                                                    <h6 class="mb-0 my-2">
                                                        <i
                                                            class="icon fa-solid fa-money-bill-wave mx-2"></i>&nbsp;{{ __('services/services.register-services-booking-price') }}:
                                                        {{ $item->price }}
                                                        {{ __('services/services.register-services-egp') }}
                                                    </h6>
                                                    <!-- End Address Price -->

                                                    <!-- Start Phones -->
                                                    @foreach ($item->user->phones as $itemPhone)
                                                        <h6 class="mb-0 my-2">
                                                            <i class="icon fa-solid fa-phone-volume mx-2"></i>
                                                            {{ $itemPhone->tel }}
                                                            {{ __('website/web.provider-booking-price') }}
                                                        </h6>
                                                    @endforeach
                                                    <!-- Start Phones -->
                                                </div>
                                            </div>

                                            <div class="col-md-3 bg-danger">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img src="{{ asset('assets/images/user/about/default.jpg') }}"
                                                        alt="" class="img-fluid"
                                                        style="overflow: hidden; width: 100%; height: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="pagination justify-content-center">
                        {{ $results->links() }}
                    </div>
                    <!-- Pagination -->
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/OAuth.js') }}"></script>
    {{-- Start split text and return again --}}
    <script>
        var summaries = [
            @foreach ($results as $item)
                "{{ $item->getTranslation('summary', app()->getLocale()) }}",
            @endforeach
        ];

        var isFullSummary = [];
        summaries.forEach(() => isFullSummary.push(false));

        function toggleSummary(index) {
            var summary = document.getElementById("summary" + index);
            var button = document.getElementById("readMore" + index);
            if (isFullSummary[index]) {
                summary.innerHTML = summaries[index].substr(0, 30);
                button.innerHTML = "{{ __('website/web.provider-read-more') }}";
                isFullSummary[index] = false;
            } else {
                summary.innerHTML = summaries[index];
                button.innerHTML = "{{ __('website/web.provider-read-less') }}";
                isFullSummary[index] = true;
            }
        }

        $('.show-more').click(function() {

            var userId = $(this).data('user-id');
            window.location.href = "{{ route('website.search.service-provider.show', ':userId') }}".replace(
                ':userId', userId);
        });

        $('.show-more .readBtn').click(function(e) {
            e.stopPropagation();
        });
    </script>
    {{-- Start split text and return again --}}
@endsection
