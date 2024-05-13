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

        .font-size {
            font-size: 10px;
        }

        #display_providers .card:hover {
            background: #dfe1e3;
            transition: 0.3s ease-in-out;
        }

        /* Start Schedule Model */
        .schedulesModel {
            padding: 20px;
        }

        /* End Schedule Model */

        .icon-gold {
            color: gold;
        }

        .readBtn {
            cursor: pointer;
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
                <!-- Start Section One -->
                <div id="fixed-column" class="col-md-2 pt-3">
                    <div class="filterBar bg-white d-flex flex-column flex-shrink-0 p-3" style="position: sticky; top: 20px;">
                        <a href="#" class="navbar-brand  text-black ">
                            حدد بحثك
                        </a>
                        <hr>
                        <ul class="mynav nav nav-pills flex-column mb-auto">
                            <!-- Title -->
                            <li class="sidebar-item  nav-item mb-1">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#title" aria-expanded="true" aria-controls="title">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <span class="topic">{{ __('services/services.register-services-title') }}</span>
                                </a>
                                <ul id="title" class="sidebar-dropdown list-unstyled collapse ms-1 show"
                                    data-bs-parent="#sidebar">
                                    @foreach ($titles as $item)
                                        <li class="sidebar-item">
                                            <label>
                                                <input type="checkbox" name="title" value="{{ $item->id }}">
                                                {{ $item->getTranslation('title', app()->getLocale()) }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- Gender -->
                            <li class="sidebar-item  nav-item mb-1">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#gender" aria-expanded="false" aria-controls="gender">
                                    <i class="fa-solid fa-mars-and-venus"></i>
                                    <span class="topic">{{ __('website/web.register-gender') }}</span>
                                </a>
                                <ul id="gender" class="sidebar-dropdown list-unstyled collapse ms-1"
                                    data-bs-parent="#sidebar">
                                    <li class="sidebar-item">
                                        <label>
                                            <input type="checkbox" name="gender" value="1">
                                            {{ __('services/services.register-services-male') }}
                                        </label>
                                    </li>
                                    <li class="sidebar-item">
                                        <label>
                                            <input type="checkbox" name="gender" value="2">
                                            {{ __('services/services.register-services-female') }}
                                        </label>
                                    </li>
                                </ul>
                            </li>

                            <!-- Detection Price -->
                            <li class="sidebar-item  nav-item mb-1">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#price" aria-expanded="false" aria-controls="price">
                                    <i class="fa-solid fa-mars-and-venus"></i>
                                    <span class="topic">
                                        {{-- {{ __('website/web.pri') }} --}} test
                                    </span>
                                </a>
                                <ul id="price" class="sidebar-dropdown list-unstyled collapse ms-1"
                                    data-bs-parent="#sidebar">
                                    <li class="sidebar-item">
                                        <label>
                                            <input type="checkbox" name="price" value="1">
                                            {{-- {{ __('services/services.register-services-male') }} --}}
                                        </label>
                                    </li>
                                    <li class="sidebar-item">
                                        <label>
                                            <input type="checkbox" name="price" value="2">
                                            {{-- {{ __('services/services.register-services-female') }} --}}
                                        </label>
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
                    @foreach ($results as $item)
                        <div class="row">
                            <div class="col-12 h-25 d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="card my-3 py-5">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="d-flex card-body justify-content-between">

                                                    <div class="col-md-3 show-more" data-user-id="{{ $item->id }}">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <img src="{{ asset($item->img) }}" alt=""
                                                                class="img-fluid rounded-circle"
                                                                style="overflow: hidden; width: 150px; height: 130px;">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-9 show-more" data-user-id="{{ $item->id }}">
                                                        <div class="d-flex flex-column ">
                                                            <span class="mb-0" style="color: #0070CD">
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
                                                                    style="text-decoration: underline; color: #0070CD;"
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
                                                </div>
                                            </div>

                                            <div class="col-md-3 schedulesModel">
                                                <div class="carousel-wrapper w-100"
                                                    style="height: 200px; overflow: hidden;">
                                                    <div id="carouselExample-{{ $item->id }}" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            @php
                                                                $today = now();
                                                                $daysOffset = 0;
                                                            @endphp

                                                            @for ($i = 0; $i < 9; $i += 3)
                                                                <div
                                                                    class="carousel-item @if ($i === 0) active @endif">
                                                                    <div class="row text-center justify-content-center">
                                                                        @for ($j = 0; $j < 3; $j++)
                                                                            @php
                                                                                $scheduleDate = $today
                                                                                    ->copy()
                                                                                    ->addDays($daysOffset + $j);
                                                                                $hasSchedule = false;
                                                                            @endphp

                                                                            <div class="col-md-4">
                                                                                <div class="text-center mt-3">
                                                                                    <small class="fw-bold"
                                                                                        style="font-size: 11px;">
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

                                                                                @forelse($item->user->serviceProviderSchedule as $schedule)
                                                                                    @if (\Carbon\Carbon::parse($schedule->start_time)->isSameDay($scheduleDate))
                                                                                        @php
                                                                                            $hasSchedule = true;
                                                                                        @endphp
                                                                                        <a href="{{ route('website.booking.service-provider.show', ['schedule' => $schedule->id, 'serviceProvider' => $item->id]) }}"
                                                                                            class="btn btn-primary btn-sm my-1 font-size w-100">{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A ') }}</a>
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
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                                @php
                                                                    $daysOffset += 3;
                                                                @endphp
                                                            @endfor
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExample-{{ $item->id }}"
                                                            data-bs-slide="prev"
                                                            style="position: absolute;height: 25%;  top: 25px; left: 0; transform: translateY(-50%);">
                                                            <span class="visually-hidden">Previous</span>
                                                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M6 0L0 4l6 4V0z'/%3E%3C/svg%3E"
                                                                alt="Previous" width="32" height="32"
                                                                style="height: 32px; padding-right: 10px;">
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExample-{{ $item->id }}"
                                                            data-bs-slide="next"
                                                            style="position: absolute;height: 25%;  top: 25px; right: 0; transform: translateY(-50%);">
                                                            <span class="visually-hidden">Next</span>
                                                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2 0v8l6-4L2 0z'/%3E%3C/svg%3E"
                                                                alt="Next" width="32" height="32"
                                                                style="height: 32px; padding-left: 10px;">
                                                        </button>


                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button class="btn btn-sm btn-primary btn-show-more"
                                                        onclick="showMore('{{ $item->id }}')">{{ __('website/web.provider-read-more') }}</button>
                                                </div>
                                            </div>
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
        // End to show more summaries for service 

        // Start Show more details for service provider(Page) and stop propagation if click to show more
        $('.show-more').click(function() {

            var userId = $(this).data('user-id');
            window.location.href = "{{ route('website.search.service-provider.show', ':userId') }}".replace(
                ':userId', userId);
        });
        $('.show-more .readBtn').click(function(e) {
            e.stopPropagation();
        });
        // End Show more details for service provider and stop propagation if click to show more


        // Start Switch on and off in scheduleModel to open and close
        var isOpen = false;

        function showMore(userId) {
            var wrapper = document.querySelector('.carousel-wrapper');

            if (!isOpen) {
                wrapper.style.height = 'calc(100% - 31px)';
                wrapper.style.transition = "0.3s ease-in-out";

                document.querySelector('.btn-show-more').textContent = "{{ __('website/web.provider-read-less') }}";
            } else {
                wrapper.style.height = '200px';
                wrapper.style.transition = "0.3s ease-in-out";
                document.querySelector('.btn-show-more').textContent = "{{ __('website/web.provider-read-more') }}";
            }

            isOpen = !isOpen;
        }
        // End Switch on and off in scheduleModel to open and close
    </script>
@endsection
