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

