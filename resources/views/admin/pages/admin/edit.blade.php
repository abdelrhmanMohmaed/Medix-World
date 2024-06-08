@extends('admin.layout.master')

@section('title', __('dashboard.admin-edit'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admins.admins.index') }}">{{ __('dashboard.admin-index') }} </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                @if ($user->id == auth()->user()->id)
                    Edit My Profile
                @else
                    {{ __('dashboard.admin-edit') }}
                @endif
            </li>
        </ol>
    </nav>
    @include('admin.layout.flash')

    <div class="card">
        <div class="example m-4">

            <form class="forms-sample" action="{{ route('admins.admins.update', $user->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputadminname2" class=" col-form-label">{{ __('dashboard.name') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="fullName" id="fullName"
                            value="{{ $user->name }}">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputEmail2" class=" col-form-label">{{ __('dashboard.phone') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="tel" class="form-control" name="tel" id="tel"
                            value="{{ $user->phones->first()?->tel }}" placeholder="+201123843996">

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
                @if (Auth::id() == $user->id)
                    <div class="row mb-3">
                        <div class="col-lg-2">
                            <label for="password" class="col-form-label">
                                {{ __('services/services.register-services-password') }}
                            </label>
                        </div>
                        <div class="col-lg-8">
                            <input type="password" id="password" name="password" required autocomplete="new-password"
                                placeholder="Password" required class='form-control'>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-2">
                            <label for="password" class="col-form-label">
                                {{ __('services/services.register-services-password') }}
                            </label>
                        </div>
                        <div class="col-lg-8">
                            <input type="password" id="password" name="password_confirmation" required
                                placeholder="Password" autocomplete="new-password" required class='form-control'>
                        </div>
                    </div>
                @endif

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
                @if ($user->id != 1)
                    <div class="row mb-3">
                        <div class="col-lg-2">
                            <label for="defaultconfig-3" class="col-form-label">Status</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="radio" class="form-check-input" name="active" id="radioDefault1"
                                value="1" @if ($user->active == 1) checked @endif>
                            <label class="form-check-label" for="radioDefault1">
                                Active
                            </label>
                            <input type="radio" class="form-check-input" name="active" id="radioDefault1"
                                value="0" @if ($user->active == 0) checked @endif>
                            <label class="form-check-label" for="radioDefault1">
                                Inactive
                            </label>
                        </div>
                    </div>
                @endif

                <div class="action d-flex mt-5 justify-content-end">

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admins.admins.index') }}" class="btn btn-secondary ">Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
