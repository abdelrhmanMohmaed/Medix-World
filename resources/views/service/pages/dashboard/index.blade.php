@extends('service.layout.master')

@section('title', 'Dashboard')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @php
        $totalRate = 0;
        $countBook = count(Auth::user()->book);
        if ($countBook > 0) {
            $countRate = 0;
            foreach (Auth::user()->review as $review) {
                $countRate += $review->rate;
            }
            $totalRate = $countRate / $countBook;

            $totalRate = max(0, min($totalRate, 5));
        }
    @endphp

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>
    @if (Auth::user()->serviceProviderDetails?->status == 'Approval')
        <div class="spinner-grow spinner-grow-sm text-success" role="status">
        </div>
        Approved
    @elseif(Auth::user()->serviceProviderDetails?->status == 'Pending')
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
    <!-- First row -->
    <div class="row">
        <!-- Start SCHEDULES -->
        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Schedules</h6>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4">
                            <i class="fa-solid fa-user-doctor fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <div class="d-flex justify-content-between align-items-baseline mb-2">

                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Schedules</label>
                                <h5 class="fw-bolder mb-0">{{ $totalSchedules }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Day Schedules</label>
                                <h5 class="fw-bolder mb-0">{{ $totalTodaySchedules->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-danger"></span> Day Booking</label>
                                <h5 class="fw-bolder mb-0">{{ $dayBookingCount }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End SCHEDULES -->

        <!-- Start RATE -->
        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Rateing</h6>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4">
                            <i class="fa-solid fa-star fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Rating</label>
                                <h5 class="fw-bolder mb-0">{{ floor($totalRate) }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Total Comments</label>
                                <h5 class="fw-bolder mb-0">{{ Auth::user()->review->whereNotNull('comment')->count() }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End RATE -->

        <!-- Start Booking -->
        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Bookings</h6>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4">
                            <i class="fa-solid fa-ticket fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <div class="d-flex justify-content-between align-items-baseline mb-2">

                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Appointments</label>
                                <h5 class="fw-bolder mb-0">{{ $totalBooking }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Today Appointments</label>
                                <h5 class="fw-bolder mb-0">{{ $dayBookingCount }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-danger"></span> Tomorrow Appointments</label>
                                <h5 class="fw-bolder mb-0">{{ $totalTomorrowSchedulesBooking }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Booking -->
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
