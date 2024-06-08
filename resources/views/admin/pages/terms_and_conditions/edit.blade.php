@extends('admin.layout.master')

@section('title', __('dashboard.term-edit'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admins.terms.index') }}">{{ __('dashboard.term-index') }} </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.term-edit') }}</li>
        </ol>
    </nav>
    @include('admin.layout.flash')

    <div class="card">
        <div class="example m-4">
            <form class="forms-sample" action="{{ route('admins.terms.update', $term) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputUsername2" class="col-form-label">{{ __('dashboard.title-en') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="title[en]" id="title_en" placeholder="Title (EN)"
                            value="{{ $term->getTranslation('title', 'en') }}">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="exampleInputEmail2" class="col-form-label">{{ __('dashboard.title-ar') }}</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="title[ar]" id="title_ar" placeholder="Title (AR)"
                            value="{{ $term->getTranslation('title', 'ar') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Description (EN)</label>
                    </div>
                    <div class="col-lg-8">
                        <textarea placeholder="Description (EN)" class="form-control simpleMdeExample" id="tinymceExample"
                            name="description[en]" readonly>{{ $term->getTranslation('description', 'en') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Description (AR)</label>
                    </div>
                    <div class="col-lg-8">
                        <textarea placeholder="Description (AR)" class="form-control simpleMdeExample" id="tinymceExample"
                            name="description[ar]">{{ $term->getTranslation('description', 'ar') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Sub Description (EN)</label>
                    </div>

                    <div class="col-lg-8">
                        <textarea placeholder="Sub-Description (EN)" class="form-control simpleMdeExample" id="tinymceExample"
                            name="sub_description[en]">{{ $term->getTranslation('sub_description', 'en') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="defaultconfig" class="col-form-label">Sub Description (AR)</label>
                    </div>
                    <div class="col-lg-8">
                        <textarea placeholder="Sub-Description (AR)" class="form-control simpleMdeExample" id="tinymceExample"
                            name="sub_description[ar]">{{ $term->getTranslation('sub_description', 'ar') }}</textarea>
                    </div>
                </div>

                <div class="action d-flex mt-5 justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admins.terms.index') }}" class="btn btn-secondary ">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
