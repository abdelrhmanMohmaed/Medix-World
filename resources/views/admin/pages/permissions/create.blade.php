@extends('admin.layout.master')

@section('title', __('dashboard.permission-create'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('admins.permissions.index') }}">{{ __('dashboard.permission-index') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.permission-create') }}</li>
        </ol>
    </nav>
    @include('admin.layout.flash')

    <form class="forms-sample"action="{{ route('admins.permissions.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-permission') }}</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" id="name_en" value="{{ old('name') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-secondary">Cancel</button>
    </form>
@endsection
