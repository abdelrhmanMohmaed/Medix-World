@extends('service.layout.master')
@section('title','My Profile')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/fullcalendar/main.min.css') }}" rel="stylesheet" />
    <style>
        .icon-gold {
            color: gold;
        }
    </style>
@endpush

@section('content')
    @php
        $totalRate = 0;
        $countBook = count($service->book);
        if ($countBook > 0) {
            $countRate = 0;
            foreach ($service->review as $review) {
                $countRate += $review->rate;
            }
            $totalRate = $countRate / $countBook;

            $totalRate = max(0, min($totalRate, 5));
        }
    @endphp

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">

                <div class="position-relative" style="height: 94px">
                    <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4"
                        style="margin-top: -4.5rem !important;">
                        <div>
                            <img class="wd-70 rounded-circle" src="{{ asset($service->serviceProviderDetails->img) }}"
                                alt="avatar">
                            <span class="h4 ms-3 text-dark">{{ $service->serviceProviderDetails->name }}</span>
                        </div>
                        <div class="d-none d-md-block">
                            <a href="{{ route('services.profile.edit', $service->id) }}"
                                class="btn btn-primary btn-icon-text">
                                <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($service->serviceProviderDetails->status == 'Approval')
        <div class="spinner-grow spinner-grow-sm text-success" role="status">
        </div>
        Approved
    @elseif($service->serviceProviderDetails->status == 'Pending')
        <div class="spinner-grow spinner-grow-sm text-primary" role="status">
        </div>
        <label for="defaultconfig" class="col-form-label text-muted">Pending</label>
    @else
        <div class="spinner-grow spinner-grow-sm text-danger" role="status">
        </div>
        <label for="defaultconfig" class="col-form-label text-muted">Reject</label>
        <br>
        <small class="ms-3  text-muted">Send a message to the service provider to know what's wrong with your data or check
            your
            mail.</small>
    @endif

    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="col-md-8 left-wrapper my-3">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">{{ __('services/services.register-services-title') }}</h6>
                    </div>
                    <p>{{ $service->serviceProviderDetails->title->title }}</p>
                    <div class="mt-3">
                        <label
                            class="tx-11 fw-bolder mb-0 text-uppercase">{{ __('services/services.register-services-summary') }}:</label>
                        <p class="text-muted">{{ $service->serviceProviderDetails->summary }}</p>
                    </div>
                    <div class="mt-3">
                        <label
                            class="tx-11 fw-bolder mb-0 text-uppercase">{{ __('services/services.register-services-major') }}:</label>
                        <p class="text-muted">{{ $service->serviceProviderDetails->major->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted">{{ \Carbon\Carbon::parse($service->create_at)->format('M  d, Y') }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                        <p class="text-muted">{{ $service->serviceProviderDetails->city->name }},
                            {{ $service->serviceProviderDetails->region->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label
                            class="tx-11 fw-bolder mb-0 text-uppercase">{{ __('services/services.register-services-email-address') }}:</label>
                        <p class="text-muted">{{ $service->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label
                            class="tx-11 fw-bolder mb-0 text-uppercase">{{ __('services/services.register-services-address') }}:</label>
                        <p class="text-muted">{{ $service->serviceProviderDetails->address }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->

        <!-- middle wrapper start -->
        <div class="col-md-4">
            <div class="row my-3 px-2">
                <div class="card rounded align-items-center">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="ms-2">
                                    <span>
                                        @php
                                            $goldStars = floor($totalRate);
                                            $remainingStars = 5 - $goldStars;
                                        @endphp

                                        @for ($i = 1; $i <= $goldStars; $i++)
                                            <i class="icon-gold fa-2x fa-solid fa-star"></i>
                                        @endfor

                                        @for ($i = 1; $i <= $remainingStars; $i++)
                                            <i class="fa-regular fa-2x fa-star"></i>
                                        @endfor
                                    </span>

                                    <div class="text-center">
                                        {{ __('website/web.provider-overall-rating') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3 px-2">
                <div class="card rounded">
                    <div class="card-body">
                        <div>
                            <label
                                class="tx-11 fw-bolder mb-0 text-uppercase">{{ __('website/web.provider-booking-price') }}:</label>
                            <p class="text-muted">{{ $service->serviceProviderDetails->price }}
                                {{ __('services/services.register-services-egp') }}</p>
                        </div>
                        <div class="mt-3">
                            <label
                                class="tx-11 fw-bolder mb-0 text-uppercase">{{ __('services/services.register-services-personal-information') }}:</label>
                            @forelse ($service->personalPhones as $itemPhone)
                                <p class="text-muted">{{ $itemPhone->tel }}
                                    {{ __('services/services.register-services-egp') }}</p>
                            @empty
                                You doesn't have a Personal Phones yet.
                            @endforelse
                        </div>
                        <div class="mt-3">
                            <label
                                class="tx-11 fw-bolder mb-0 text-uppercase">{{ __('services/services.register-services-clinic-tel') }}:</label>
                            @forelse ($service->clinicPhones as $itemPhone)
                                <p class="text-muted">{{ $itemPhone->tel }}
                                    {{ __('services/services.register-services-egp') }}</p>
                            @empty
                                You doesn't have a Clinic Phones yet.
                            @endforelse
                        </div>
                        <div class="mt-3">
                            <label
                                class="tx-11 fw-bolder mb-0 text-uppercase">{{ __('validation.attributes.medical_association_card') }}:</label>
                            <p class="text-muted">
                                <a href="{{ asset($service->serviceProviderDetails->medical_card) }}" download>Download
                                    Medical Card</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>

    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="col-md-12 left-wrapper">
            @forelse ($service->activeReview as $item)
                <div class="col-md-12 my-3">
                    <div class="card rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <span>
                                            @for ($i = 1; $i <= $item->rate; $i++)
                                                <i class="icon-gold fa-solid fa-star"></i>
                                            @endfor
                                            @for ($i = 1; $i <= 5 - $item->rate; $i++)
                                                <i class="fa-regular fa-star"></i>
                                            @endfor
                                        </span>
                                        <br>
                                        <p>{{ $item->comment }}</p>
                                        <small>{{ $item->client->name }}</small>
                                        <br>
                                        <small>{{ $item->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                You doesn't have a recommendation yet.
            @endforelse
        </div>
    </div>
@endsection
