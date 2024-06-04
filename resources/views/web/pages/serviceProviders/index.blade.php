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

        .filter-title {
            border-radius: 20px 0 20px 0;
        }

        ul a {
            text-decoration: none;
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

                <!-- Start Section Side Filter -->
                @include('web.pages.serviceProviders.partials.sideFilter')
                <!-- End Section Side Filter -->

                <!-- Start Section two -->
                <div class="col-md-10">
                    <!-- Start Section One -->
                    <div class="row">
                        <div class="col-12 h-25 d-flex justify-content-between py-4 ">
                            <div class="h-100">
                                <h3 class="h5 text-black-50">
                                    {{ $majorName != null ? $majorName->name : __('website/web.provider-all-specialty') }}
                                    {{-- <span id="total" class="h6 ">{{ $total }}</span> --}}
                                    {{-- {{ __('website/web.provider-male') }} --}}
                                </h3>
                            </div>
                            {{-- <div class=" h-100">
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
                            </div> --}}
                        </div>
                    </div>
                    <!-- End Section One -->

                    <div id="filteredResults">

                        <!-- Start Section two -->
                        @foreach ($results as $item)
                            <!-- Stars -->
                            @php
                                $totalRate = 0;
                                $countBook = count($item->user->book);
                                if ($countBook > 0) {
                                    $countRate = 0;
                                    foreach ($item->user->review as $review) {
                                        $countRate += $review->rate;
                                    }
                                    $totalRate = $countRate / $countBook;

                                    $totalRate = max(0, min($totalRate, 5));
                                }
                            @endphp

                            <!-- Stars -->
                            <div class="row">
                                <div class="col-12 h-25 d-flex justify-content-between">
                                    <div class="col-md-12">
                                        <div class="card my-3 py-5" style="cursor:pointer">
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
                                                                    <span class="h5">{{ $item->name }}</span>
                                                                </span>

                                                                <h6 class="mb-0">
                                                                    {{ $item->title->title }} {{ $item->major->name }}
                                                                </h6>
                                                                <br>
                                                                <h6 class="mb-0">
                                                                    <!-- Stars -->
                                                                    <li class="list-group-item">
                                                                    <li class="list-group-item">
                                                                        @php
                                                                            $goldStars = floor($totalRate);
                                                                            $remainingStars = 5 - $goldStars;
                                                                        @endphp

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
                                                                    {{ count($item->user->book) }}
                                                                    {{ __('website/web.provider-overall-rating-visit') }}
                                                                </h6>

                                                                <h6 class="mb-0 my-2">
                                                                    {{ $item->name }}
                                                                </h6>
                                                                <h6 class="mb-0 my-2">
                                                                    <i class="icon fa-solid fa-stethoscope mx-2"></i>
                                                                    <span id="summary{{ $loop->index }}" class="summary">
                                                                        {{ substr($item->summary, 0, 30) }}
                                                                    </span>
                                                                    <a id="readMore{{ $loop->index }}" class="readBtn"
                                                                        style="text-decoration: underline; color: #0070CD;"
                                                                        onclick="toggleSummary({{ $loop->index }})">{{ __('website/web.provider-read-more') }}</a>
                                                                </h6>

                                                                <!-- Start Address Price -->
                                                                <h6 class="mb-0 my-2">
                                                                    <i
                                                                        class="icon fa-solid fa-location-dot mx-2"></i>&nbsp;&nbsp;{{ $item->region->name }}:
                                                                    {{ $item->address }}
                                                                </h6>

                                                                <h6 class="mb-0 my-2">
                                                                    <i
                                                                        class="icon fa-solid fa-money-bill-wave mx-2"></i>&nbsp;{{ __('services/services.register-services-booking-price') }}:
                                                                    {{ $item->price }}
                                                                    {{ __('services/services.register-services-egp') }}
                                                                </h6>
                                                                <!-- End Address Price -->

                                                                <!-- Start Phones -->
                                                                @foreach ($item->user->clinicPhones as $itemPhone)
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
                                                        <div id="carouselExample-{{ $item->id }}"
                                                            class="carousel slide">
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
                                                            onclick="showMoreSchedule('{{ $item->id }}')">{{ __('website/web.provider-read-more') }}</button>
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

                </div>
                <!-- End Section two -->
            </div>
        </div>
    </section>
    <!-- End About Section -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/OAuth.js') }}"></script>

    <script>
        // Start filterResults
        function filterResults() {
            $.ajax({
                url: "{{ route('website.search.service-provider.filter') }}",
                type: 'GET',
                data: $('#filterForm').serialize(),
                success: function(response) {
                    // console.log(response);
                    $('#filteredResults').empty();
                    $('#filteredResults').html(response);
                },
                error: function(xhr, status, error) {
                    alert('Something is wrong, please try again later');
                }
            });
        }

        $('input[type="checkbox"]').change(function() {
            filterResults();
        });
        // End filterResults

        // Start to show more summaries for service 
        var summaries = [
            @foreach ($results as $item)
                "{{ $item->summary }}",
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

        function showMoreSchedule(userId) {
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
