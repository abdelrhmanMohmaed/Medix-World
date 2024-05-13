@extends('admin.layout.master')

@section('title', __('dashboard.advice-view'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.advices.index') }}">{{ __('dashboard.advice-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.advice-view')}}</li>
  </ol>
</nav>


  <div class="row mb-3">
    <div class="col-lg-3">
      <label for="defaultconfig-3" class="col-form-label">Image</label>
    </div>
    <div class="col-lg-8">
      <img src="{{asset($advice->img)}}" class="w-50">
    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.title-advice-en') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="title[en]" id="title_en" value="{{ $advice->getTranslation('title', 'en')}}" disabled>

    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">{{ __('dashboard.title-advice-ar') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="title[ar]" id="title_ar" value="{{ $advice->getTranslation('title', 'ar')}}" disabled>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-3">
      <label for="defaultconfig" class="col-form-label">Description (EN)</label>
    </div>
    <div class="col-lg-8">
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description[en]" disabled>{{ $advice->getTranslation('description', 'en')}}</textarea>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-3">
      <label for="defaultconfig" class="col-form-label">Description (AR)</label>
    </div>
    <div class="col-lg-8">
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description[ar]" disabled>{{ $advice->getTranslation('description', 'en')}}</textarea>
    </div>
  </div>
  
  
@endsection