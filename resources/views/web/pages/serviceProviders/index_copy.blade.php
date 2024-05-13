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
    .filterBar,
    .scheduleModel {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
    }

    #display_providers .card,
    .filterBar,
    .scheduleModel {
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

    /* Start Schedule Model */
    .scheduleModel .col-md-4 {
        height: 200px;
        overflow: hidden;
    }

    .btn-show-more {
        border-bottom-left-radius: 35px;
        border-bottom-right-radius: 35px;
    }

    /* End Schedule Model */

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
            <!-- Start Section One -->
            <div id="fixed-column" class="col-md-2 pt-3">
                <div class="filterBar bg-white d-flex flex-column flex-shrink-0 p-3"
                    style="position: sticky; top: 20px;">
                    <a href="#" class="navbar-brand  text-black ">
                        حدد بحثك
                    </a>
                    <hr>
                    <ul class="mynav nav nav-pills flex-column mb-auto">
                        <li class="sidebar-item  nav-item mb-1">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#title"
                                aria-expanded="false" aria-controls="title">
                                <i class="fas fa-cog pe-2"></i>
                                <span class="topic">Settings </span>
                            </a>
                            <ul id="title" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-sign-in-alt pe-2"></i>
                                        <span class="topic"> Login</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-user-plus pe-2"></i>
                                        <span class="topic">Register</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-sign-out-alt pe-2"></i>
                                        <span class="topic">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item mb-1">
                            <a href="#">
                                <i class="fa-regular fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="nav-item mb-1">
                            <a href="#">
                                <i class="fa-regular fa-bookmark"></i>
                                Saved Articles
                                <span class="notification-badge">5</span>
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#">
                                <i class="fa-regular fa-newspaper"></i>
                                Articles
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#">
                                <i class="fa-solid fa-archway"></i>
                                Institutions
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#">
                                <i class="fa-solid fa-graduation-cap"></i>
                                Organizations
                            </a>
                        </li>

                        <li class="sidebar-item  nav-item mb-1">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#settings" aria-expanded="false" aria-controls="settings">
                                <i class="fas fa-cog pe-2"></i>
                                <span class="topic">Settings </span>
                            </a>
                            <ul id="settings" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-sign-in-alt pe-2"></i>
                                        <span class="topic"> Login</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-user-plus pe-2"></i>
                                        <span class="topic">Register</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-sign-out-alt pe-2"></i>
                                        <span class="topic">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Section One -->

            <!-- Start Section two -->
            <div class="col-md-10">

                <!-- Start Section One -->
                <div class="row">
                    <div class="col-12 h-25 d-flex justify-content-between py-4 ">
                        <div class="h-100">
                            <h3 class="h5 text-black-50">
                                {{ $majorName != null ? $majorName->getTranslation('name', app()->getLocale()) : __('website/web.provider-all-specialty') }}
                                <span
                                    class="h6">{{ $results->total() }}{{ __('website/web.provider-male') }}</span>
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
                <!-- End Section One -->

                <!-- Start Section two -->
                @foreach($results as $item)
                    <div class="row">
                        <div class="col-12 h-25 d-flex justify-content-between">
                            <div class="col-md-12">
                                <div class="card my-3 py-5">
                                    <div class="d-flex card-body justify-content-between">

                                        <div class="col-md-2 show-more" data-user-id="{{ $item->id }}">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ asset($item->img) }}" alt=""
                                                    class="img-fluid rounded-circle"
                                                    style="overflow: hidden; width: 150px; height: 130px;">
                                            </div>
                                        </div>

                                        <div class="col-md-7 show-more" data-user-id="{{ $item->id }}">
                                            <div class="d-flex flex-column ">
                                                <span class="mb-0" style="color: #5459CE">
                                                    @if($item->user->gender == 1)
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
                                                        <blade
                                                            for|%20(%24i%20%3D%201%3B%20%24i%20%3C%3D%20%24start%3B%20%24i%2B%2B)>
                                                            <i class="icon-gold fa-solid fa-star"></i>
                                                        @endfor
                                                        <blade
                                                            for|%20(%24i%20%3D%201%3B%20%24i%20%3C%3D%205%20-%20%24start%3B%20%24i%2B%2B)>
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
                                                @foreach($item->user->phones as $itemPhone)
                                                    <h6 class="mb-0 my-2">
                                                        <i class="icon fa-solid fa-phone-volume mx-2"></i>
                                                        {{ $itemPhone->tel }}
                                                        {{ __('website/web.provider-booking-price') }}
                                                    </h6>
                                                @endforeach
                                                <!-- Start Phones -->
                                            </div>
                                        </div>

                                        {{-- <div class="row scheduleModel w-100" data-user-model="{{ $item->id }}">
                                        <!-- Start First Schedule -->
                                        <div class="col-md-4">
                                            <div class="row text-center justify-content-center">
                                                <div class="text-center mt-3">
                                                    <blade
                                                        if|%20(app()-%3EgetLocale()%20%3D%3D%20%26%2339%3Bar%26%2339%3B)>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::now()->locale('ar')->isoFormat('dddd') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::now()->format('d-m') }}</small>
                                                    @else
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::now()->format('l') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::now()->format('d-m') }}</small>
                                                    @endif
                                                    <hr>
                                                </div>

                                                @php
                                                    $hasTodaySchedule = false;
                                                @endphp

                                                <blade
                                                    forelse|(%24item-%3Euser-%3EserviceProviderSchedule%20as%20%24schedule)>
                                                    <blade
                                                        if|%20(%5CCarbon%5CCarbon%3A%3Aparse(%24schedule-%3Estart_time)-%3EisToday())>
                                                        @php
                                                            $hasTodaySchedule = true;
                                                        @endphp
                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $schedule->id, 'serviceProvider' => $item->id]) }}"
                                                            style="width: auto;"
                                                            class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A ') }}</a>
                                                    @endif
                                                @empty
                                                    @php
                                                        $hasTodaySchedule = false;
                                                    @endphp
                                                @endforelse

                                                @if(!$hasTodaySchedule)
                                                    <blade
                                                        if|%20(%24item-%3Euser-%3EserviceProviderSchedule-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3E%3D%26%2339%3B%2C%20now()-%3EstartOfDay())-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3C%3D%26%2339%3B%2C%20now()-%3EendOfDay())-%3EisNotEmpty())>
                                                        <!-- يوجد مواعيد لليوم الحالي -->
                                                    @else
                                                        <small>لا يوجد مواعيد</small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End First Schedule -->

                                        <!-- Start Second Schedule -->
                                        <div class="col-md-4">
                                            <div class="row text-center justify-content-center">
                                                <div class="text-center mt-3">
                                                    <blade
                                                        if|%20(app()-%3EgetLocale()%20%3D%3D%20%26%2339%3Bar%26%2339%3B)>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->locale('ar')->isoFormat('dddd') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->format('d-m') }}</small>
                                                    @else
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->format('l') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->format('d-m') }}</small>
                                                    @endif
                                                    <hr>
                                                </div>
                                                @php
                                                    $hasTomorrowSchedule = false;
                                                @endphp
                                                <blade
                                                    forelse|(%24item-%3Euser-%3EserviceProviderSchedule%20as%20%24scheduleNextDay)>
                                                    <blade
                                                        if|%20(%5CCarbon%5CCarbon%3A%3Aparse(%24scheduleNextDay-%3Estart_time)-%3EisTomorrow())>
                                                        @php
                                                            $hasTomorrowSchedule = true;
                                                        @endphp
                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $scheduleNextDay->id, 'serviceProvider' => $item->id]) }}"
                                                            style="width: auto;"
                                                            class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($scheduleNextDay->start_time)->format('h:i A ') }}</a>
                                                    @endif
                                                @empty
                                                    @php
                                                        $hasTomorrowSchedule = false;
                                                    @endphp
                                                @endforelse

                                                @if(!$hasTomorrowSchedule)
                                                    <blade
                                                        if|%20(%24item-%3Euser-%3EserviceProviderSchedule-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3E%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EstartOfDay())-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3C%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EendOfDay())-%3EisNotEmpty())>
                                                        <!-- يوجد مواعيد لليوم الحالي -->
                                                    @else
                                                        <small>لا يوجد مواعيد</small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Second Schedule -->

                                        <!-- Start Third Schedule -->
                                        <div class="col-md-4">
                                            <div class="row text-center justify-content-center">
                                                <div class="text-center mt-3">
                                                    <blade
                                                        if|%20(app()-%3EgetLocale()%20%3D%3D%20%26%2339%3Bar%26%2339%3B)>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDay()->locale('ar')->isoFormat('dddd') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDay()->format('d-m') }}</small>
                                                    @else
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDay()->format('l') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDay()->format('d-m') }}</small>
                                                    @endif
                                                    <hr>
                                                </div>
                                                @php
                                                    $hasNextDaySchedule = false;
                                                @endphp
                                                <blade
                                                    forelse|(%24item-%3Euser-%3EserviceProviderSchedule%20as%20%24scheduleNextNextDay)>
                                                    <blade
                                                        if|%20(%5CCarbon%5CCarbon%3A%3Aparse(%24scheduleNextNextDay-%3Estart_time)-%3EisNextDay())>
                                                        @php
                                                            $hasNextDaySchedule = true;
                                                        @endphp
                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $scheduleNextNextDay->id, 'serviceProvider' => $item->id]) }}"
                                                            style="width: auto;"
                                                            class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($scheduleNextNextDay->start_time)->format('h:i A ') }}</a>
                                                    @endif
                                                @empty
                                                    @php
                                                        $hasNextDaySchedule = false;
                                                    @endphp
                                                @endforelse

                                                @if(!$hasNextDaySchedule)
                                                    <blade
                                                        if|%20(%24item-%3Euser-%3EserviceProviderSchedule-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3E%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDay()-%3EstartOfDay())-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3C%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDay()-%3EendOfDay())-%3EisNotEmpty())>
                                                        <!-- يوجد مواعيد لليوم الحالي -->
                                                    @else
                                                        <small>لا يوجد مواعيد</small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Third Schedule -->

                                        <!-- Start Fourth Schedule -->
                                        <div class="col-md-4">
                                            <div class="row text-center justify-content-center">
                                                <div class="text-center mt-3">
                                                    <blade
                                                        if|%20(app()-%3EgetLocale()%20%3D%3D%20%26%2339%3Bar%26%2339%3B)>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(2)->locale('ar')->isoFormat('dddd') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(2)->format('d-m') }}</small>
                                                    @else
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(2)->format('l') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(2)->format('d-m') }}</small>
                                                    @endif
                                                    <hr>
                                                </div>
                                                @php
                                                    $hasNextNextDaySchedule = false;
                                                @endphp
                                                <blade
                                                    forelse|(%24item-%3Euser-%3EserviceProviderSchedule%20as%20%24scheduleNextNextNextDay)>
                                                    <blade
                                                        if|%20(%5CCarbon%5CCarbon%3A%3Aparse(%24scheduleNextNextNextDay-%3Estart_time)-%3EisSameDay(%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(2)))>
                                                        @php
                                                            $hasNextNextDaySchedule = true;
                                                        @endphp
                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $scheduleNextNextNextDay->id, 'serviceProvider' => $item->id]) }}"
                                                            style="width: auto;"
                                                            class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($scheduleNextNextNextDay->start_time)->format('h:i A ') }}</a>
                                                    @endif
                                                @empty
                                                    @php
                                                        $hasNextNextDaySchedule = false;
                                                    @endphp
                                                @endforelse

                                                @if(!$hasNextNextDaySchedule)
                                                    <blade
                                                        if|%20(%24item-%3Euser-%3EserviceProviderSchedule-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3E%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(2)-%3EstartOfDay())-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3C%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(2)-%3EendOfDay())-%3EisNotEmpty())>
                                                        <!-- يوجد مواعيد لليوم الحالي -->
                                                    @else
                                                        <small>لا يوجد مواعيد</small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Fourth Schedule -->

                                        <!-- Start Fifth Schedule -->
                                        <div class="col-md-4">
                                            <div class="row text-center justify-content-center">
                                                <div class="text-center mt-3">
                                                    <blade
                                                        if|%20(app()-%3EgetLocale()%20%3D%3D%20%26%2339%3Bar%26%2339%3B)>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(3)->locale('ar')->isoFormat('dddd') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(3)->format('d-m') }}</small>
                                                    @else
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(3)->format('l') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(3)->format('d-m') }}</small>
                                                    @endif
                                                    <hr>
                                                </div>
                                                @php
                                                    $hasNextNextNextDaySchedule = false;
                                                @endphp
                                                <blade
                                                    forelse|(%24item-%3Euser-%3EserviceProviderSchedule%20as%20%24scheduleNextNextNextNextDay)>
                                                    <blade
                                                        if|%20(%5CCarbon%5CCarbon%3A%3Aparse(%24scheduleNextNextNextNextDay-%3Estart_time)-%3EisSameDay(%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(3)))>
                                                        @php
                                                            $hasNextNextNextDaySchedule = true;
                                                        @endphp
                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $scheduleNextNextNextNextDay->id, 'serviceProvider' => $item->id]) }}"
                                                            style="width: auto;"
                                                            class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($scheduleNextNextNextNextDay->start_time)->format('h:i A ') }}</a>
                                                    @endif
                                                @empty
                                                    @php
                                                        $hasNextNextNextDaySchedule = false;
                                                    @endphp
                                                @endforelse

                                                @if(!$hasNextNextNextDaySchedule)
                                                    <blade
                                                        if|%20(%24item-%3Euser-%3EserviceProviderSchedule-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3E%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(3)-%3EstartOfDay())-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3C%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(3)-%3EendOfDay())-%3EisNotEmpty())>
                                                        <!-- يوجد مواعيد لليوم الحالي -->
                                                    @else
                                                        <small>لا يوجد مواعيد</small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Fifth Schedule -->

                                        <!-- Start Sixth Schedule -->
                                        <div class="col-md-4">
                                            <div class="row text-center justify-content-center">
                                                <div class="text-center mt-3">
                                                    <blade
                                                        if|%20(app()-%3EgetLocale()%20%3D%3D%20%26%2339%3Bar%26%2339%3B)>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(4)->locale('ar')->isoFormat('dddd') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(4)->format('d-m') }}</small>
                                                    @else
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(4)->format('l') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(4)->format('d-m') }}</small>
                                                    @endif
                                                    <hr>
                                                </div>
                                                @php
                                                    $hasNextNextNextDaySchedule = false;
                                                @endphp
                                                <blade
                                                    forelse|(%24item-%3Euser-%3EserviceProviderSchedule%20as%20%24scheduleNextNextNextNextNextDay)>
                                                    <blade
                                                        if|%20(%5CCarbon%5CCarbon%3A%3Aparse(%24scheduleNextNextNextNextNextDay-%3Estart_time)-%3EisSameDay(%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(4)))>
                                                        @php
                                                            $hasNextNextNextDaySchedule = true;
                                                        @endphp
                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $scheduleNextNextNextNextNextDay->id, 'serviceProvider' => $item->id]) }}"
                                                            style="width: auto;"
                                                            class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($scheduleNextNextNextNextNextDay->start_time)->format('h:i A ') }}</a>
                                                    @endif
                                                @empty
                                                    @php
                                                        $hasNextNextNextDaySchedule = false;
                                                    @endphp
                                                @endforelse

                                                @if(!$hasNextNextNextDaySchedule)
                                                    <blade
                                                        if|%20(%24item-%3Euser-%3EserviceProviderSchedule-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3E%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(4)-%3EstartOfDay())-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3C%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(4)-%3EendOfDay())-%3EisNotEmpty())>
                                                        <!-- يوجد مواعيد لليوم الحالي -->
                                                    @else
                                                        <small>لا يوجد مواعيد</small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Sixth Schedule -->
                                        <!-- Start Seventh Schedule -->
                                        <div class="col-md-4">
                                            <div class="row text-center justify-content-center">
                                                <div class="text-center mt-3">
                                                    <blade
                                                        if|%20(app()-%3EgetLocale()%20%3D%3D%20%26%2339%3Bar%26%2339%3B)>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(5)->locale('ar')->isoFormat('dddd') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(5)->format('d-m') }}</small>
                                                    @else
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(5)->format('l') }}</small>
                                                        <br>
                                                        <small class="fw-bold"
                                                            style="font-size: 12px">{{ \Carbon\Carbon::tomorrow()->addDays(5)->format('d-m') }}</small>
                                                    @endif
                                                    <hr>
                                                </div>
                                                @php
                                                    $hasNextNextNextNextDaySchedule = false;
                                                @endphp
                                                <blade
                                                    forelse|(%24item-%3Euser-%3EserviceProviderSchedule%20as%20%24scheduleNextNextNextNextNextNextDay)>
                                                    <blade
                                                        if|%20(%5CCarbon%5CCarbon%3A%3Aparse(%24scheduleNextNextNextNextNextNextDay-%3Estart_time)-%3EisSameDay(%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(5)))>
                                                        @php
                                                            $hasNextNextNextNextDaySchedule = true;
                                                        @endphp
                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $scheduleNextNextNextNextNextNextDay->id, 'serviceProvider' => $item->id]) }}"
                                                            style="width: auto;"
                                                            class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($scheduleNextNextNextNextNextNextDay->start_time)->format('h:i A ') }}</a>
                                                    @endif
                                                @empty
                                                    @php
                                                        $hasNextNextNextNextDaySchedule = false;
                                                    @endphp
                                                @endforelse

                                                @if(!$hasNextNextNextNextDaySchedule)
                                                    <blade
                                                        if|%20(%24item-%3Euser-%3EserviceProviderSchedule-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3E%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(5)-%3EstartOfDay())-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3C%3D%26%2339%3B%2C%20%5CCarbon%5CCarbon%3A%3Atomorrow()-%3EaddDays(5)-%3EendOfDay())-%3EisNotEmpty())>
                                                        <!-- يوجد مواعيد لليوم الحالي -->
                                                    @else
                                                        <small>لا يوجد مواعيد</small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Seventh Schedule -->
                                        <button class="btn btn-primary btn-show-more"
                                            onclick="showMore({{ $item->id }})">{{ __('website/web.provider-read-more') }}</button>
                                    </div> --}}

                                    {{-- 
                                                <div class="row scheduleModel w-100" data-user-model="{{ $item->id }}">
                                    @php
                                        $today = now();
                                        $daysOffset = 0;
                                    @endphp

                                    @for($i = 0; $i < 9; $i++)
                                        @php
                                            $scheduleDate = $today->copy()->addDays($daysOffset);
                                            $hasSchedule = false;
                                        @endphp

                                        <!-- Start Schedule -->
                                        <div class="col-md-4">
                                            <div class="row text-center justify-content-center">
                                                <div class="text-center mt-3">
                                                    <small class="fw-bold" style="font-size: 12px">
                                                        <blade
                                                            if|%20(app()-%3EgetLocale()%20%3D%3D%20%26%2339%3Bar%26%2339%3B)>
                                                            {{ $scheduleDate->locale('ar')->isoFormat('dddd') }}
                                                        @else
                                                            {{ $scheduleDate->format('l') }}
                                                        @endif
                                                    </small>
                                                    <br>
                                                    <small class="fw-bold"
                                                        style="font-size: 12px">{{ $scheduleDate->format('d-m') }}</small>
                                                    <hr>
                                                </div>

                                                <blade
                                                    forelse|(%24item-%3Euser-%3EserviceProviderSchedule%20as%20%24schedule)>
                                                    <blade
                                                        if|%20(%5CCarbon%5CCarbon%3A%3Aparse(%24schedule-%3Estart_time)-%3EisSameDay(%24scheduleDate))>
                                                        @php
                                                            $hasSchedule = true;
                                                        @endphp
                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $schedule->id, 'serviceProvider' => $item->id]) }}"
                                                            style="width: auto;"
                                                            class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A ') }}</a>
                                                    @endif
                                                @empty
                                                @endforelse

                                                @if(!$hasSchedule)
                                                    <blade
                                                        if|%20(%24item-%3Euser-%3EserviceProviderSchedule-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3E%3D%26%2339%3B%2C%20%24scheduleDate-%3EstartOfDay())-%3Ewhere(%26%2339%3Bstart_time%26%2339%3B%2C%20%26%2339%3B%3C%3D%26%2339%3B%2C%20%24scheduleDate-%3EendOfDay())-%3EisNotEmpty())>
                                                    @else
                                                        <small>لا يوجد مواعيد</small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Schedule -->

                                        @php
                                            $daysOffset++;
                                        @endphp
                                    @endfor
                                </div>
                                --}}

                                {{-- before sidershow --}}
                                        {{-- <div class="row scheduleModel w-100" data-user-model="{{ $item->id }}">
                                                @php
                                                    $today = now();
                                                    $daysOffset = 0;
                                                @endphp

                                                @for ($i = 0; $i < 9; $i++)
                                                    @php
                                                        $scheduleDate = $today->copy()->addDays($daysOffset);
                                                        $hasSchedule = false;
                                                    @endphp

                                                    <!-- Start Schedule -->
                                                    <div class="col-md-4">
                                                        <div class="row text-center justify-content-center">
                                                            <div class="text-center mt-3">
                                                                <small class="fw-bold" style="font-size: 12px">
                                                                    @if (app()->getLocale() == 'ar')
                                                                        {{ $scheduleDate->locale('ar')->isoFormat('dddd') }}
                                                                    @else
                                                                        {{ $scheduleDate->format('l') }}
                                                                    @endif
                                                                </small>
                                                                <br>
                                                                <small class="fw-bold"
                                                                    style="font-size: 12px">{{ $scheduleDate->format('d-m') }}</small>
                                                                <hr>
                                                            </div>

                                                            @forelse($item->user->serviceProviderSchedule as $schedule)
                                                                @if (\Carbon\Carbon::parse($schedule->start_time)->isSameDay($scheduleDate))
                                                                    @php
                                                                        $hasSchedule = true;
                                                                    @endphp
                                                                    <a href="{{ route('website.booking.service-provider.show', ['schedule' => $schedule->id, 'serviceProvider' => $item->id]) }}"
                                                                        style="width: auto;"
                                                                        class="btn btn-primary btn-sm my-1">{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A ') }}</a>
                                                                @endif
                                                            @empty
                                                            @endforelse

                                                            @if (!$hasSchedule)
                                                                @if ($item->user->serviceProviderSchedule->where('start_time', '>=', $scheduleDate->startOfDay())->where('start_time', '<=', $scheduleDate->endOfDay())->isNotEmpty())
                                                                @else
                                                                    <small>لا يوجد مواعيد</small>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- End Schedule -->

                                                    @php
                                                        $daysOffset++;
                                                    @endphp
                                                @endfor
                                            </div> --}}

                                            
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @endforeach
        <!-- End Section two -->

        <!-- Pagination -->
        <div class="pagination justify-content-center">
            {{ $results->links() }}
        </div>
        <!-- Pagination -->
    </div>
    <!-- End Section two -->
    </div>
    </div>
</section>
<!-- End About Section -->
@endsection

@section('scripts')
<script src="{{ asset('assets/js/user/OAuth.js') }}"></script>
{{-- Start split text and return again --}}
<script>
    // Start to show more summaries for service 
    var summaries = [ <
        blade foreach | % 20( % 24 results % 20 as % 20 % 24 item) >
        "{{ $item->getTranslation('summary', app()->getLocale()) }}", <
        /blade endforeach>
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
    // End to show more summaries for service 

    // Start Show more details for service provider(Page) and stop propagation if click to show more
    $('.show-more').click(function () {

        var userId = $(this).data('user-id');
        window.location.href =
            "{{ route('website.search.service-provider.show', ':userId') }}"
            .replace(
                ':userId', userId);
    });
    $('.show-more .readBtn').click(function (e) {
        e.stopPropagation();
    });
    // End Show more details for service provider and stop propagation if click to show more


    // Start Switch on and off in scheduleModel to open and close
    var isExpanded = false;

    function showMore(userId) {
        var parentColumns = document.querySelectorAll('[data-user-model="' + userId + '"] .col-md-4');

        parentColumns.forEach(function (parentColumn) {

            if (!isExpanded) {
                parentColumn.style.height = '100%';
                // parentColumn.style.transition = 'height 0.5s ease';
                document.querySelector('.btn-show-more').textContent =
                    "{{ __('website/web.provider-read-less') }}";
            } else {
                parentColumn.style.height = '200px';
                // parentColumn.style.transition = 'height 0.5s ease';
                document.querySelector('.btn-show-more').textContent =
                    "{{ __('website/web.provider-read-more') }}";
            }
        });

        isExpanded = !isExpanded;
    }
    // End Switch on and off in scheduleModel to open and close

        // document.addEventListener("DOMContentLoaded", function() {
        //     var carousels = document.querySelectorAll('.carousel');

        //     carousels.forEach(function(carousel) {
        //         var items = carousel.querySelectorAll('.carousel-item');
        //         var maxHeight = 0;

        //         items.forEach(function(item) {
        //             var itemHeight = item.clientHeight;
        //             if (itemHeight > maxHeight) {
        //                 maxHeight = itemHeight;
        //             }
        //         });

        //         carousel.style.height = maxHeight + 'px';
        //     });
        // });
</script>
@endsection
