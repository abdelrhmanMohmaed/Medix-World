@extends('admin.layout.master')

@section('title', __('dashboard.user-edit'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admins.users.index') }}">{{ __('dashboard.user-index') }} </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.user-edit') }}</li>
        </ol>
    </nav>
    @include('admin.layout.flash')

    <div class="card">
        <div class="example m-4">
            <form class="forms-sample" action="{{ route('admins.users.update', $user->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputUsername2" class="col-form-label">{{ __('dashboard.name') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="fullName" id="fullName"
                            value="{{ $user->name }}">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputEmail2" class="col-form-label">{{ __('dashboard.phone') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="tel" class="form-control" name="tel" id="tel" placeholder="+201*********"
                            value="{{ $user->phones->first()?->tel }}">

                        <small>Don't forget add +2 before phone number.</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Email</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ $user->email }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Date of Birth</label>
                    </div>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" id="date_of_birth" name="dateOfBirth"
                            value="{{ $user->dateOfBirth }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig-3" class="col-form-label">Gender</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="radio" class="form-check-input" name="gender" id="radioDefault1" value="1"
                            @if ($user->gender == 1) checked @endif>
                        <label class="form-check-label" for="radioDefault1">
                            Male
                        </label>
                        <input type="radio" class="form-check-input" name="gender" id="radioDefault1" value="2"
                            @if ($user->gender == 2) checked @endif>
                        <label class="form-check-label" for="radioDefault1">
                            Female
                        </label>
                    </div>
                </div>

                <div class="action d-flex mt-5 justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admins.users.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
