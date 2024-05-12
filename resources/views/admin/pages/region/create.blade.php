@extends('admin.layout.master')

@section('title', __('dashboard.region-create'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.regions.index') }}">{{ __('dashboard.region-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.region-create')}}</li>
  </ol>
</nav>
@include('admin.layout.flash')

<form class="forms-sample" action="{{ route('admins.regions.store') }}" method="post">
  @csrf

  <div class="row mb-3">

    <label for="city" class="col-sm-3 col-form-label">{{ __('dashboard.name-city-en') }}</label>
    <div class="col-sm-9">
      <select name="city_id" id="city" class="form-control form-select">
        <option disabled selected>{{ __('dashboard.select-city') }}</option>
        @foreach ($cities as $item)
        <option value="{{ $item->id }}">
          {{ $item->getTranslation('name', app()->getLocale()) }}
        </option>
        @endforeach
      </select>
    </div>

  </div>
  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-region-en') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name[en]" id="name_en" value="{{ old('name.en') }}">

    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">{{ __('dashboard.name-region-ar') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name[ar]" id="name_ar" value="{{ old('name.ar') }}">


      <!-- <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email"> -->
    </div>
  </div>

  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button class="btn btn-secondary">Cancel</button>
</form>
@endsection