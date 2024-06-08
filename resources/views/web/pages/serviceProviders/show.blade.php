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

        .icon-gold {
            color: gold;
        }

        .readBtn {
            cursor: pointer;
        }
    </style>
@endsection

@section('main')

    <!-- Stars -->
    @php
        $totalRate = 0;
        $countBook = count($serviceProvider->user->book);
        if ($countBook > 0) {
            $countRate = 0;
            foreach ($serviceProvider->user->review as $review) {
                $countRate += $review->rate;
            }
            $totalRate = $countRate / $countBook;

            $totalRate = max(0, min($totalRate, 5));
        }
        $goldStars = floor($totalRate);
        $remainingStars = 5 - $goldStars;
    @endphp

    <!-- Stars -->

    <!-- Start Search Navbar -->
    @include('web.partials.navbarSearch')
    <!-- End Search Navbar -->

    <!-- Start About Section -->
    <section id="display_providers" class="mb-5">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-md-7">
                    <!-- Start navbar link -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-start align-items-center">
                                <a href="{{ route('website.welcome') }}" style="text-decoration: none;">
                                    {{ __('website/web.medix-title') }}
                                </a>
                                <span>&nbsp;/&nbsp;</span>
                                <h4 class="h6 mb-0 ml-2 text-black-50">
                                    {{ $serviceProvider->getTranslation('name', app()->getLocale()) }}
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

                                        <div class="col-md-3 show-more">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ asset($serviceProvider->img) }}" alt=""
                                                    class="img-fluid rounded-circle"
                                                    style="overflow: hidden; width: 150px; height: 130px;">
                                            </div>
                                        </div>

                                        <div class="col-md-9 show-more">
                                            <div class="d-flex flex-column ">
                                                <span class="mb-0" style="color: #0070CD">
                                                    @if ($serviceProvider->user->gender == 1)
                                                        {{ __('website/web.provider-male') }}
                                                    @else
                                                        {{ __('website/web.provider-female') }}
                                                    @endif
                                                    <span class="h5">{{ $serviceProvider->name }}</span>
                                                </span>

                                                <h6 class="mb-0">
                                                    {{ $serviceProvider->title->title }} {{ $serviceProvider->major->name }}
                                                </h6>
                                                <br>
                                                <h6 class="mb-0">
                                                    {{ __('services/services.services-view') }}:
                                                    {{ $serviceProvider->user->view->view }}
                                                </h6>
                                                <h6 class="mb-0">
                                                    <!-- Stars -->
                                                    <li class="list-group-item">
                                                        @for ($i = 1; $i <= $goldStars; $i++)
                                                            <i class="icon-gold fa-solid fa-star"></i>
                                                        @endfor

                                                        @for ($i = 1; $i <= $remainingStars; $i++)
                                                            <i class="fa-regular fa-star"></i>
                                                        @endfor
                                                    </li>
                                                    <!-- Stars -->
                                                </h6>

                                                <h6 class="mb-0 my-2">
                                                    {{ __('website/web.provider-overall-rating-at') }}
                                                    {{ count($serviceProvider->user->book) }}
                                                    {{ __('website/web.provider-overall-rating-visit') }}
                                                </h6>

                                                <h6 class="mb-0 my-2">
                                                    {{ $serviceProvider->getTranslation('name', app()->getLocale()) }}
                                                </h6>
                                                <h6 class="mb-0 my-2">
                                                    <i class="icon fa-solid fa-stethoscope mx-2"></i>
                                                    <span class="summary">
                                                        {{ $serviceProvider->getTranslation('summary', app()->getLocale()) }}
                                                    </span>
                                                </h6>

                                                <!-- Start Address Price -->
                                                <h6 class="mb-0 my-2">
                                                    <i
                                                        class="icon fa-solid fa-location-dot mx-2"></i>&nbsp;&nbsp;{{ $serviceProvider->region->getTranslation('name', app()->getLocale()) }}:
                                                    {{ $serviceProvider->getTranslation('address', app()->getLocale()) }}
                                                </h6>

                                                <h6 class="mb-0 my-2">
                                                    <i
                                                        class="icon fa-solid fa-money-bill-wave mx-2"></i>&nbsp;{{ __('services/services.register-services-booking-price') }}:
                                                    {{ $serviceProvider->price }}
                                                    {{ __('services/services.register-services-egp') }}
                                                </h6>
                                                <!-- End Address Price -->

                                                <!-- Start Phones -->
                                                @foreach ($serviceProvider->user->phones as $itemPhone)
                                                    <h6 class="mb-0 my-2">
                                                        <i class="icon fa-solid fa-phone-volume mx-2"></i>
                                                        {{ $itemPhone->tel }}
                                                        {{ __('website/web.provider-booking-price') }}
                                                    </h6>
                                                @endforeach
                                                <!-- Start Phones -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Services Details -->

                    <!-- Start Services Info -->
                    <div class="row">
                        <div class="col-12 h-25 d-flex justify-content-between">
                            <div class="col-md-12">
                                <div class="card my-1">
                                    <div class="d-flex card-body justify-content-between">
                                        <div class="d-flex flex-column ">
                                            <h2 class="my-3 my-3 h4" style="color: #0070CD">
                                                <i class="fa-solid fa-info"></i> {{ __('website/web.provider-info') }}
                                            </h2>
                                            <h6 class="my-2 my-3">
                                                <span class="summary">
                                                    {{ $serviceProvider->getTranslation('summary', app()->getLocale()) }}
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Services Info -->

                    <!-- Start Review Info -->
                    <div class="row">
                        <div class="col-12 h-25 d-flex">
                            <div class="col-md-12">
                                <div class="card my-1">
                                    <div class="card-body">

                                        <!-- Start Review and comments Model -->
                                        <div class="flex-column">
                                            <div class="col-md-12">
                                                <h2 class="mb-0 my-2 h4" style="color: #0070CD">
                                                    <i class="fa-regular fa-star-half-stroke"></i>
                                                    {{ __('website/web.provider-patients-reviews') }}
                                                </h2>
                                            </div>

                                            <div
                                                class="col-md-12 d-flex align-items-center justify-content-center flex-column p-4">
                                                <h6 class="mb-0 my-2">

                                                    <li class="list-group-item">
                                                        @for ($i = 1; $i <= $goldStars; $i++)
                                                            <i class="icon-gold fa-solid fa-star fa-2x"></i>
                                                        @endfor

                                                        @for ($i = 1; $i <= $remainingStars; $i++)
                                                            <i class="fa-regular fa-star fa-2x"></i>
                                                        @endfor
                                                    </li>
                                                </h6>

                                                <h4 class="mb-0 my-2 h5 text-black-50">
                                                    {{ __('website/web.provider-overall-rating') }}
                                                </h4>

                                                <h4 class="mb-0 my-2 h6 text-black-50">
                                                    {{ __('website/web.provider-overall-rating-at') }}
                                                    {{ count($serviceProvider->user->book) }}
                                                    {{ __('website/web.provider-overall-rating-visit') }}
                                                </h4>
                                            </div>
                                        </div>
                                        <!-- End Review and comments Model -->


                                        <!-- Start Display Comments and rating -->
                                        @foreach ($serviceProvider->user->review()->orderBy('created_at', 'desc')->get() as $item)
                                            <hr>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div
                                                            class="DoctorReviewsstyle__FullWidth-sc-o1mk5u-2 DoctorReviewsstyle__ReviewContainer-sc-o1mk5u-4 jHeALW jdFLUn">
                                                            <span>
                                                                @for ($i = 1; $i <= $item->rate; $i++)
                                                                    <i class="icon-gold fa-solid fa-star"></i>
                                                                @endfor
                                                                @for ($i = 1; $i <= 5 - $item->rate; $i++)
                                                                    <i class="fa-regular fa-star"></i>
                                                                @endfor
                                                            </span>

                                                            <div>
                                                                {{ __('website/web.provider-overall-rating') }}
                                                            </div>
                                                            <div class="text-black-50">
                                                                {{ $item->comment }}
                                                            </div>
                                                            <div>
                                                                <small>{{ $item->client->name }}</small>
                                                            </div>
                                                            <div>
                                                                @if (app()->getLocale() == 'ar')
                                                                    <small>
                                                                        {{ \Carbon\Carbon::parse($item->created_at)->locale('ar')->translatedFormat('l d M Y h:i A') }}
                                                                    </small>
                                                                @else
                                                                    <small>
                                                                        {{ \Carbon\Carbon::parse($item->created_at)->format('l d M Y h:i A') }}
                                                                    </small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 mt-4">
                                                        <div class="text-center">
                                                            <button
                                                                class="btn btn-block btn-primary text-white my-2 btn">{{ $item->rate }}</button>
                                                            <h5>{{ __('website/web.provider-doctor-rating') }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End Display Comments and rating -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Review Info -->
                </div>

                <!-- Start Services Schedules -->
                <div class="col-md-5 schedulesModel bg-white" style="position: sticky; top: 20px;">
                    <div class="d-flex flex-column flex-shrink-0 p-2">

                        <div class="carousel-wrapper w-100" style="height: calc(100svh - 150px); overflow: hidden;">
                            <div id="carouselExample-{{ $serviceProvider->id }}" class="carousel slide">
                                <div class="carousel-inner">
                                    @php
                                        $today = now();
                                        $daysOffset = 0;
                                    @endphp

                                    @for ($i = 0; $i < 9; $i += 3)
                                        <div class="carousel-item @if ($i === 0) active @endif">
                                            <div class="row text-center justify-content-center">
                                                @for ($j = 0; $j < 3; $j++)
                                                    @php
                                                        $scheduleDate = $today->copy()->addDays($daysOffset + $j);
                                                        $hasSchedule = false;
                                                    @endphp

                                                    <div class="col-md-4">
                                                        <div class="text-center mt-3">
                                                            <small class="fw-bold" style="font-size: 11px;">
                                                                @if (app()->getLocale() == 'ar')
                                                                    {{ $scheduleDate->locale('ar')->isoFormat('dddd') }}
                                                                @else
                                                                    {{ $scheduleDate->format('l') }}
                                                                @endif
                                                            </small>
                                                            <br>
                                                            <small
                                                                class="fw-bold font-size">{{ $scheduleDate->format('d-m') }}</small>
                                                            <hr>
                                                        </div>

                                                        @forelse($serviceProvider->user->serviceProviderSchedule as $schedule)
                                                            @if (\Carbon\Carbon::parse($schedule->start_time)->isSameDay($scheduleDate))
                                                                @php
                                                                    $hasSchedule = true;
                                                                @endphp
                                                                <a href="{{ route('website.booking.service-provider.show', ['schedule' => $schedule->id, 'serviceProvider' => $serviceProvider->id]) }}"
                                                                    class="btn btn-primary btn-sm my-1 font-size w-100">{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A ') }}</a>
                                                            @endif
                                                        @empty
                                                        @endforelse

                                                        @if (!$hasSchedule)
                                                            @if ($serviceProvider->user->serviceProviderSchedule->where('start_time', '>=', $scheduleDate->startOfDay())->where('start_time', '<=', $scheduleDate->endOfDay())->isNotEmpty())
                                                            @else
                                                                <small>لا يوجد مواعيد</small>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        @php
                                            $daysOffset += 3;
                                        @endphp
                                    @endfor
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample-{{ $serviceProvider->id }}" data-bs-slide="prev"
                                    style="position: absolute;height: 25%;  top: 25px; left: -10px; transform: translateY(-50%);">
                                    <span class="visually-hidden">Previous</span>
                                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M6 0L0 4l6 4V0z'/%3E%3C/svg%3E"
                                        alt="Previous" width="32" height="32"
                                        style="height: 32px; padding-right: 10px;">
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample-{{ $serviceProvider->id }}" data-bs-slide="next"
                                    style="position: absolute;height: 25%;  top: 25px; right: -10px; transform: translateY(-50%);">
                                    <span class="visually-hidden">Next</span>
                                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2 0v8l6-4L2 0z'/%3E%3C/svg%3E"
                                        alt="Next" width="32" height="32"
                                        style="height: 32px; padding-left: 10px;">
                                </button>


                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-sm btn-primary btn-show-more"
                                onclick="showMore()">{{ __('website/web.provider-read-more') }}</button>
                        </div>
                    </div>

                </div>
                <!-- End Services Schedules -->
            </div>
        </div>
    </section>
    <!-- End About Section -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/OAuth.js') }}"></script>
    <script>
        // Start Switch on and off in scheduleModel to open and close
        var isOpen = false;

        function showMore() {
            var wrapper = document.querySelector('.carousel-wrapper');

            if (!isOpen) {
                wrapper.style.height = '100%';
                wrapper.style.transition = "0.3s ease-in-out";

                document.querySelector('.btn-show-more').textContent = "Show Less";
            } else {
                wrapper.style.height = 'calc(100svh - 150px)';
                wrapper.style.transition = "0.3s ease-in-out";
                document.querySelector('.btn-show-more').textContent = "Show More";
            }

            isOpen = !isOpen;
        }
        // End Switch on and off in scheduleModel to open and close
    </script>
@endsection
