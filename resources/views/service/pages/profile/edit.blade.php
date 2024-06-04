@extends('service.layout.master')
@section('title', 'Update Profile')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/fullcalendar/main.min.css') }}" rel="stylesheet" />
    <style>
        .icon-gold {
            color: gold;
        }
    </style>
@endpush

@section('content')
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
                    </div>
                </div>

                <div class="card-header">
                    <div class="d-flex align-items-center row">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="example">

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="personal_info-tab" data-bs-toggle="tab"
                                                        data-bs-target="#personal_info" role="tab"
                                                        aria-controls="personal_info" aria-selected="true">Personal Info</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="specialization-tab" data-bs-toggle="tab"
                                                        data-bs-target="#specialization" role="tab"
                                                        aria-controls="specialization"
                                                        aria-selected="false">Specialization</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="clinic-tab" data-bs-toggle="tab"
                                                        data-bs-target="#clinic" role="tab" aria-controls="clinic"
                                                        aria-selected="false">Clinic Data</a>
                                                </li>
                                            </ul>

                                            <form action="{{ route('services.profile.update', $service->id) }}"
                                                method="post" enctype="multipart/form-data">
                                                @method('patch')
                                                @csrf
                                                <div class="tab-content border border-top-0 p-3" id="myTabContent">

                                                    <!-- 1st tab -->
                                                    <div class="tab-pane fade show active" id="personal_info"
                                                        role="tabpanel" aria-labelledby="personal_info-tab">

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig" class="col-form-label">Full Name
                                                                    (EN)</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" id="defaultconfig"
                                                                    type="text" name="name[en]"
                                                                    value="{{ $service->serviceProviderDetails->getTranslation('name', 'en') }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig-2" class="col-form-label">Full
                                                                    Name (AR)</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="text" name="name[ar]"
                                                                    value="{{ $service->serviceProviderDetails->getTranslation('name', 'ar') }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig-3" class="col-form-label">Personal
                                                                    Tel Number</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="text" name="tel"
                                                                    value="{{ old('tel') }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig-3" class="col-form-label">Personal
                                                                    Tel Number</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="text" name="telTwo"
                                                                    value="{{ old('telTwo') }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig-3"
                                                                    class="col-form-label">Gender</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="radio" class="form-check-input"
                                                                    name="gender" id="radioDefault1" value="1"
                                                                    @checked($service->gender == 1)>
                                                                <label class="form-check-label" for="radioDefault1">
                                                                    Male
                                                                </label>
                                                                <input type="radio" class="form-check-input"
                                                                    name="gender" id="radioDefault1" value="2"
                                                                    @checked($service->gender == 2)>
                                                                <label class="form-check-label" for="radioDefault1">
                                                                    Female
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig-3" class="col-form-label">Birth
                                                                    Date</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="date"
                                                                    value="{{ $service->dateOfBirth }}"
                                                                    name="dateOfBirth">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig-3" class="col-form-label">Email
                                                                    Address</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="email" name="email"
                                                                    value="{{ $service->email }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig-3"
                                                                    class="col-form-label">Profile Image</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="file" id="img" name="profileImage">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- 2nd tab -->
                                                    <div class="tab-pane fade" id="specialization" role="tabpanel"
                                                        aria-labelledby="specialization-tab">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig"
                                                                    class="col-form-label">Specialization</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <select name="major_id" id="major"
                                                                    class="form-select">
                                                                    <option disabled>
                                                                        Select Specialization
                                                                    </option>

                                                                    @foreach ($allMajors as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            @selected($item->id == $service->serviceProviderDetails->major_id)>
                                                                            {{ $item->getTranslation('name', app()->getLocale()) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig"
                                                                    class="col-form-label">Title</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <select name="title_id" id="title"
                                                                    class="form-select">
                                                                    <option selected disabled>
                                                                        Select Title
                                                                    </option>

                                                                    @foreach ($titles as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            @selected($item->id == $service->serviceProviderDetails->title_id)>
                                                                            {{ $item->getTranslation('title', app()->getLocale()) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig" class="col-form-label">Medical
                                                                    Association
                                                                    Card</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input name="medical_association_card"
                                                                    id="medical_association_card"
                                                                    value="{{ old('medical_association_card') }}"
                                                                    type="file">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig" class="col-form-label">Summary
                                                                    (EN)</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="summary[en]">{{ $service->serviceProviderDetails->getTranslation('summary', 'en') }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig" class="col-form-label">Summary
                                                                    (AR)</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="summary[ar]">{{ $service->serviceProviderDetails->getTranslation('summary', 'ar') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- 3rd  tab -->
                                                    <div class="tab-pane fade" id="clinic" role="tabpanel"
                                                        aria-labelledby="clinic-tab">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig"
                                                                    class="col-form-label">City</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <select name="city_id" class="form-select"
                                                                    id="city">
                                                                    <option selected disabled>
                                                                        Select City
                                                                        @foreach ($allCities as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->getTranslation('name', app()->getLocale()) }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig"
                                                                    class="col-form-label">Region</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <select name="region_id" id="region"
                                                                    class="form-select">
                                                                    <option selected disabled>
                                                                        Select Region

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig" class="col-form-label">Address
                                                                    (EN)</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="text"
                                                                    name="address[en]">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig" class="col-form-label">Address
                                                                    (AR)</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="text"
                                                                    name="address[ar]">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig" class="col-form-label">Clinic
                                                                    Tel</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="tel" id="clinic_tel"
                                                                    value="{{ old('clinicTel') }}" name="clinicTel"
                                                                    autocomplete="tel" class="form-control"
                                                                    placeholder="telephone 1">
                                                                <input type="tel" id="clinic_tel_two"
                                                                    value="{{ old('clinicTelTwo') }}" name="clinicTelTwo"
                                                                    autocomplete="tel" class="form-control mt-1"
                                                                    placeholder="telephone 2">

                                                            </div>

                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-lg-3">
                                                                <label for="defaultconfig" class="col-form-label">Booking
                                                                    Price(EGP)</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="number"
                                                                    id="booking_price" step="0.5" min="0.00"
                                                                    name="bookingPrice" placeholder="price in LE"
                                                                    value="{{ old('bookingPrice') }}">
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end">

                                                            <button type="submit"
                                                                class="btn btn-primary me-2">Submit</button>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
