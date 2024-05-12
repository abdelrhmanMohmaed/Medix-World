@extends('admin.layout.master')

@section('title', __('dashboard.major-edit'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.majors.index') }}">{{ __('dashboard.major-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.major-edit')}}</li>
  </ol>
</nav>
@include('admin.layout.flash')

<form class="forms-sample" action="{{ route('admins.majors.update', $major->id) }}" method="post">
  @csrf @method('PATCH')
  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-major-en') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name[en]" id="name_en" value="{{ $major->getTranslation('name', 'en') }}">
    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">{{ __('dashboard.name-major-ar') }}</label>
    <div class="col-sm-9">
    <input type="text" class="form-control" name="name[ar]" id="name_ar" value="{{ $major->getTranslation('name', 'ar') }}" >


      <!-- <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email"> -->
    </div>
  </div>

  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button class="btn btn-secondary">Cancel</button>
</form>
@endsection