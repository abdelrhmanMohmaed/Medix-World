@extends('admin.layout.master')

@section('title', 'Service Provider Pending Requests View')


@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('admins.service_provider.requests', 'pending') }}">{{ __('dashboard.service-provider-requests') }}
                </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.service-provider-view-request') }} </li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('admin.layout.flash')

                    <div class="example">
                        <div class="d-flex justify-content-end">
                            @if ($service_provider->status == 'Pending')
                                <label for="defaultconfig" class="col-form-label text-muted">Pending</label>
                                <div class="spinner-grow spinner-grow-sm text-primary m-2" role="status">
                                </div>
                            @elseif ($service_provider->status == 'Approval')
                                <div class="spinner-grow spinner-grow-sm text-success m-2" role="status">
                                </div>
                                <label for="defaultconfig" class="col-form-label text-muted">Approved</label>
                            @else
                                <div class="spinner-grow spinner-grow-sm text-danger m-2" role="status">
                                </div>
                                <label for="defaultconfig" class="col-form-label text-muted">Rejected</label>
                            @endif
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="personal_info-tab" data-bs-toggle="tab"
                                    data-bs-target="#personal_info" role="tab" aria-controls="personal_info"
                                    aria-selected="true">Personal Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="specialization-tab" data-bs-toggle="tab"
                                    data-bs-target="#specialization" role="tab" aria-controls="specialization"
                                    aria-selected="false">Specialization</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="clinic-tab" data-bs-toggle="tab" data-bs-target="#clinic"
                                    role="tab" aria-controls="clinic" aria-selected="false">Clinic Data</a>
                            </li>

                        </ul>
                        <div class="tab-content border border-top-0 p-3" id="myTabContent">
                            <!-- 1st tab -->
                            <div class="tab-pane fade show active" id="personal_info" role="tabpanel"
                                aria-labelledby="personal_info-tab">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="defaultconfig" class="col-form-label">Profile Image</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <img src="{{ asset($service_provider->img) }}"
                                            class="wd-100 wd-sm-150 ms-3 card-img" alt="profile image">
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Full Name (EN) </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig"
                                            type="text" value="{{ $service_provider->getTranslation('name', 'en') }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig-2" class="col-form-label">Full Name (AR)</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="20" name="defaultconfig-2"
                                            id="defaultconfig-2" type="text"
                                            value="{{ $service_provider->getTranslation('name', 'ar') }}" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig-3" class="col-form-label">Personal Tel Number</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="10" name="defaultconfig-3"
                                            id="defaultconfig-3" type="text"
                                            value="{{ $service_provider->user->phones->first()->tel }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig-3" class="col-form-label">Gender</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="10" name="defaultconfig-3"
                                            id="defaultconfig-3" type="text"
                                            value="{{ $service_provider->user->gender }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig-3" class="col-form-label">Birth Date</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="10" name="defaultconfig-3"
                                            id="defaultconfig-3" type="text"
                                            value="{{ $service_provider->user->dateOfBirth }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig-3" class="col-form-label">Email Address</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="10" name="defaultconfig-3"
                                            id="defaultconfig-3" type="text"
                                            value="{{ $service_provider->user->email }}" disabled>
                                    </div>
                                </div>

                            </div>
                            <!-- 2nd tab -->
                            <div class="tab-pane fade" id="specialization" role="tabpanel"
                                aria-labelledby="specialization-tab">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Specialization</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text"
                                            value="{{ $service_provider->major->getTranslation('name', 'en') }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Title</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text"
                                            value="{{ $service_provider->title->getTranslation('title', 'en') }}"
                                            disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Medical Association Card</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <a href="{{ asset($service_provider->medical_card) }}" target="_blank" class="form-control">
                                            <i class="fa-solid fa-file-export p-2"></i>view
                                        </a>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Summary (EN)</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text"
                                            value="{{ $service_provider->getTranslation('summary', 'en') }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Summary (AR)</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text"
                                            value="{{ $service_provider->getTranslation('summary', 'ar') }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- 3rd  tab -->
                            <div class="tab-pane fade" id="clinic" role="tabpanel" aria-labelledby="clinic-tab">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">City</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text"
                                            value="{{ $service_provider->city->getTranslation('name', 'en') }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Region</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text"
                                            value="{{ $service_provider->region->getTranslation('name', 'en') }}"
                                            disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Address (EN)</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text"
                                            value="{{ $service_provider->getTranslation('address', 'en') }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Address (AR)</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text"
                                            value="{{ $service_provider->getTranslation('address', 'en') }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Clinic Tel</label>
                                    </div>
                                    <div class="col-lg-8">
                                        @foreach ($service_provider->user->phones as $phone)
                                            <input class="form-control mt-3" maxlength="25" name="defaultconfig"
                                                id="defaultconfig" type="text" value="{{ $phone->tel }}" disabled>
                                        @endforeach
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="defaultconfig" class="col-form-label">Booking Price(EGP)</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" name="defaultconfig"
                                            id="defaultconfig" type="text" value="{{ $service_provider->price }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="action d-flex mt-5 justify-content-center">
                        <form
                            action="{{ route('admins.service_provider.update', ['service_provider' => $service_provider->id, 'oldStatus' => $service_provider->status]) }}"
                            method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="status" value="Approval">

                            <button type="submit" class="btn-sm btn-success btn-icon-text m-1">
                                <i class="fa-solid fa-thumbs-up p-1"></i>Approve
                            </button>
                        </form>

                        <form
                            action="{{ route('admins.service_provider.update', ['service_provider' => $service_provider->id, 'oldStatus' => $service_provider->status]) }}"
                            method="post">

                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            @if ($service_provider->status == 'Reject')
                                <input type="hidden" name="status" value="Pending">
                                <button type="submit" class="btn-sm btn-primary  btn-icon-text m-1">
                                    <i class="fa-solid fa-hourglass-half p-1"></i>Pending
                                </button>
                            @else
                                <input type="hidden" name="status" value="Reject">
                                <button type="submit" class="btn-sm btn-danger btn-icon-text m-1">
                                    <i class="fa-solid fa-thumbs-down p-1"></i>Reject
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
