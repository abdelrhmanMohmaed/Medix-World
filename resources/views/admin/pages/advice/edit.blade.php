@extends('admin.layout.master')

@section('title', __('dashboard.advice-edit'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admins.advices.index') }}">{{ __('dashboard.advice-index') }} </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.advice-edit') }}</li>
        </ol>
    </nav>
    @include('admin.layout.flash')

    <div class="card">
        <div class="example m-4">
            <form class="forms-sample" action="{{ route('admins.advices.update', $advice->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig-3" class="col-form-label">Image</label>
                    </div>
                    <div class="col-lg-8">
                        <img src="{{ asset($advice->img) }}" class="w-50">
                        <input type="file" id="img" name="img" value="{{ old('img') }}"
                            class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputUsername2"
                            class="col-form-label">{{ __('dashboard.title-advice-en') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="title[en]" id="title_en" required
                            value="{{ $advice->getTranslation('title', 'en') }}">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputEmail2" class="col-form-label">{{ __('dashboard.title-advice-ar') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="title[ar]" id="title_ar" required
                            value="{{ $advice->getTranslation('title', 'ar') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Description (EN)</label>
                    </div>
                    <div class="col-lg-8">
                        <textarea class="form-control" required id="exampleFormControlTextarea1" rows="5" name="description[en]">{{ $advice->getTranslation('description', 'en') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Description (AR)</label>
                    </div>
                    <div class="col-lg-8">
                        <textarea class="form-control" required id="exampleFormControlTextarea1" rows="5" name="description[ar]">{{ $advice->getTranslation('description', 'ar') }}</textarea>
                    </div>
                </div>

                <div class="action d-flex mt-5 justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admins.advices.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
