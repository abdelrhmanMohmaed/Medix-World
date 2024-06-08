@extends('admin.layout.master')

@section('title', __('dashboard.city-create'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admins.cities.index') }}">{{ __('dashboard.city-index') }} </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.city-create') }}</li>
        </ol>
    </nav>
    @include('admin.layout.flash')

    <div class="card">
        <div class="example m-4">
            <form class="forms-sample" action="{{ route('admins.cities.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputUsername2" class="col-form-label">{{ __('dashboard.name-city-en') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="name[en]" id="name_en"
                            value="{{ old('name.en') }}">
                        @error('name.ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputEmail2" class="col-form-label">{{ __('dashboard.name-city-ar') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="name[ar]" id="name_ar"
                            value="{{ old('name.ar') }}">
                        @error('name.ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="action d-flex mt-5 justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admins.cities.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
