@extends('admin.layout.master')

@section('title', __('dashboard.term-view'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.terms.index') }}">{{ __('dashboard.term-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.term-view')}}</li>
  </ol>
</nav>

<div class="row mb-3">
  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.title-term-en') }}</label>
  <div class="col-lg-8">
    <input type="text" class="form-control" name="title[en]" id="title_en" value="{{ $term->getTranslation('title', 'en')}}" disabled>

  </div>
</div>
<div class="row mb-3">
  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">{{ __('dashboard.title-term-ar') }}</label>
  <div class="col-lg-8">
    <input type="text" class="form-control" name="title[ar]" id="title_ar" value="{{ $term->getTranslation('title', 'ar')}}" disabled>
  </div>
</div>

<div class="row mb-3">
  <div class="col-lg-3">
    <label for="defaultconfig" class="col-form-label">sub_Description (EN)</label>
  </div>
  <div class="col-lg-8">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="sub_description[en]" disabled>{{ $term->getTranslation('sub_description', 'en')}}</textarea>
  </div>
</div>

<div class="row mb-3">
  <div class="col-lg-3">
    <label for="defaultconfig" class="col-form-label">sub_Description (AR)</label>
  </div>
  <div class="col-lg-8">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="sub_description[ar]" disabled>{{ $term->getTranslation('sub_description', 'en')}}</textarea>
  </div>
</div>

<div class="row mb-3">
  <div class="col-lg-3">
    <label for="defaultconfig" class="col-form-label">Description (EN)</label>
  </div>
  <div class="col-lg-8">
    <div class="card bg-light">
      <div class="card-body">
        {!! $term->getTranslation('description', 'en') !!}
      </div>
    </div>
  </div>
</div>

<div class="row mb-3">
  <div class="col-lg-3">
    <label for="defaultconfig" class="col-form-label">Description (AR)</label>
  </div>
  <div class="col-lg-8">
    <div class="card bg-light">
      <div class="card-body">
        {!! $term->getTranslation('description', 'ar') !!}
      </div>
    </div>
  </div>
</div>



@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/simplemde/simplemde.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/simplemde.js') }}"></script>
@endpush