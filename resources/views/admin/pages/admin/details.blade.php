@extends('admin.layout.master')

@section('title', __('dashboard.admin-view'))

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
                    Show My Profile
                @else
                    {{ __('dashboard.admin-view') }}
                @endif
            </li>
        </ol>
    </nav>


    <div class="card">
        <div class="example m-4">
            <div class="d-flex justify-content-end mb-5">
                <a href="{{ route('admins.admins.edit', $user->id) }}" class="btn-sm btn-primary btn-icon-text m-1 "><i
                        class="fa-solid fa-pen-to-square"></i> edit
                </a>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <label for="exampleInputadminname2" class=" col-form-label">{{ __('dashboard.name') }}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title[en]" id="title_en" value="{{ $user->name }}"
                        disabled>

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <label for="exampleInputEmail2" class=" col-form-label">{{ __('dashboard.phone') }}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title[ar]" id="title_ar"
                        value="{{ $user->personalPhones->first()?->tel }}" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-2">
                    <label for="exampleInputEmail2" class=" col-form-label">{{ __('dashboard.email') }}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title[ar]" id="title_ar" value="{{ $user->email }}"
                        disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <label for="exampleInputEmail2" class=" col-form-label">{{ __('dashboard.date_of_birth') }}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title[ar]" id="title_ar"
                        value="{{ $user->dateOfBirth }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <label for="exampleInputEmail2" class=" col-form-label">{{ __('dashboard.gender') }}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title[ar]" id="title_ar"
                        value="@if ($user->gender == 1) male @else female @endif" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <label for="exampleInputEmail2" class=" col-form-label">{{ __('dashboard.status') }}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title[ar]" id="title_ar"
                        value="@if ($user->active == 1) Active @else Inactive @endif" disabled>
                </div>
            </div>
        </div>
    </div>
@endsection
