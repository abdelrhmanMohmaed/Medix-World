@extends('admin.layout.master')

@section('title', __('dashboard.city-create'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.cities.index') }}">{{ __('dashboard.city-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.city-create')}}</li>
  </ol>
</nav>
@include('admin.layout.flash')

<form class="forms-sample"action="{{ route('admins.cities.store') }}" method="post">
    @csrf

  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-city-en') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name[en]" id="name_en" value="{{ old('name.en') }}" @class(['form-control', 'is-invalid'=> $errors->has('name.en')])>
      @error('name.ar')
    <span>{{ $message }}</span>
    @enderror
    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">{{ __('dashboard.name-city-ar') }}</label>
    <div class="col-sm-9">
    <input type="text" class="form-control" name="name[ar]" id="name_ar" value="{{ old('name.ar') }}" @class(['form-control', 'is-invalid'=> $errors->has('name.ar')])>
  @error('name.ar')
  <span>{{ $message }}</span>
  @enderror

      <!-- <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email"> -->
    </div>
  </div>

  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button class="btn btn-secondary">Cancel</button>
</form>
@endsection