@extends('admin.layout.master')

@section('title', __('dashboard.admin-create'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admins.admins.index') }}">{{ __('dashboard.admin-index') }} </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.admin-create') }}</li>
        </ol>
    </nav>
    @include('admin.layout.flash')


    <form class="forms-sample" action="{{ route('admins.admins.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="example m-4">
                <div class="row mb-3 mt-5">
                    <div class="col-lg-2">
                        <label for="exampleInputadminname2" class="col-form-label">{{ __('dashboard.name') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Ahmed Atef"
                            value="{{ old('fullName') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputEmail2" class="col-form-label">{{ __('dashboard.phone') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="tel" class="form-control" name="tel" id="tel" placeholder="+201123843996"
                            value="{{ old('tel') }}">
                        <small>Don't forget add +2 before phone number.</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Email</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="email" class="form-control" name="email" placeholder="example@domain.com"
                            value="{{ old('email') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Date of Birth</label>
                    </div>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" id="date_of_birth" name="dateOfBirth"
                            value="{{ old('dateOfBirth') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig-3" class="col-form-label">Gender</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="radio" class="form-check-input" name="gender" id="radioMale" value="1"
                            @checked(old('gender') == 1)>
                        <label class="form-check-label" for="radioMale">
                            Male
                        </label>
                        <input type="radio" class="form-check-input" name="gender" id="radioFemale" value="2"
                            @checked(old('gender') == 2)>
                        <label class="form-check-label" for="radioFemale">
                            Female
                        </label>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig-3" class="col-form-label">Status</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="radio" class="form-check-input" name="active" id="radioActive" value="1"
                            @checked(old('active') == 1)>
                        <label class="form-check-label" for="radioActive">
                            Active
                        </label>
                        <input type="radio" class="form-check-input" name="active" id="radioInactive" value="0"
                            @checked(old('active') == 0)>
                        <label class="form-check-label" for="radioInactive">
                            Inactive
                        </label>
                    </div>
                </div>

                <div class="action d-flex mt-5 justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admins.admins.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </div>
        </div>
    </form>
@endsection
