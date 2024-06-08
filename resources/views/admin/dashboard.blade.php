@extends('admin.layout.master')

@section('title', 'Admin Dashboard')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Admin Dashboard</h4>
        </div>
    </div>

    <!-- First row -->
    <div class="row">
        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Patients</h6>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4">
                            <i class="fa-solid fa-users fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <!-- <div class="col-6 "> -->
                        <div class="d-flex justify-content-between align-items-baseline mb-2">

                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Patients</label>
                                <h5 class="fw-bolder mb-0">{{ $all_users->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Active Patients</label>
                                <h5 class="fw-bolder mb-0">{{ $active_users->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-danger"></span> Inactive Patients</label>
                                <h5 class="fw-bolder mb-0">{{ $inactive_users->count() }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Service Providers</h6>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4">
                            <i class="fa-solid fa-user-doctor fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Service Providers</label>
                                <h5 class="fw-bolder mb-0">{{ $all_service_providers->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Active Service Providers</label>
                                <h5 class="fw-bolder mb-0">{{ $active_service_providers->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-danger"></span> Inactive Service
                                    Providers</label>
                                <h5 class="fw-bolder mb-0">{{ $inactive_service_providers->count() }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Requests</h6>
                    </div>

                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4"> 
                            <i class="fa-solid fa-folder-open fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Pending Requests</label>
                                <h5 class="fw-bolder mb-0">{{ $requestPending }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Total Approval Requests</label>
                                <h5 class="fw-bolder mb-0">{{ $requestApproval }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-danger"></span> Total Reject Requests
                                    Providers</label>
                                <h5 class="fw-bolder mb-0">{{ $requestReject }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- secand row -->

    <div class="row">
        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Majors</h6>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4">
                            <i class="fa-solid fa-capsules fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <!-- <div class="col-6 "> -->
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Majors</label>
                                <h5 class="fw-bolder mb-0">{{ $all_majors->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Active Majors</label>
                                <h5 class="fw-bolder mb-0">{{ $active_majors->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-danger"></span> Inactive Majors</label>
                                <h5 class="fw-bolder mb-0">{{ $inactive_majors->count() }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Cities</h6>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4">
                            <i class="fa-solid fa-location-dot fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <!-- <div class="col-6 "> -->
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Cities</label>
                                <h5 class="fw-bolder mb-0">{{ $all_cities->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Active Cities</label>
                                <h5 class="fw-bolder mb-0">{{ $active_cities->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-danger"></span> Inactive Cities</label>
                                <h5 class="fw-bolder mb-0">{{ $inactive_cities->count() }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Advices</h6>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex justify-content-center mt-4">
                            <i class="fa-solid fa-window-restore fa-beat fa-2xl" style="color: #6571ff;"></i>
                        </div>

                        <!-- <div class="col-6 "> -->
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <div class="mt-5">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Total Advices</label>
                                <h5 class="fw-bolder mb-0">{{ $all_advices->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-success"></span> Active Advices</label>
                                <h5 class="fw-bolder mb-0">{{ $active_advices->count() }}</h5>
                            </div>
                            <div class="mt-5 d-inline">
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-danger"></span> Inactive Advices</label>
                                <h5 class="fw-bolder mb-0">{{ $inactive_advices->count() }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
