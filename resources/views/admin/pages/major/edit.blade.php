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

<div class="card">
  <div class="example m-4">
    <form class="forms-sample" action="{{ route('admins.majors.update', $major->id) }}" method="post">
      @csrf @method('PATCH')
      <div class="row mb-3">
        <div class="col-lg-2">
          <label for="exampleInputUsername2" class="col-form-label">{{ __('dashboard.name-major-en') }}</label>
        </div>
        <div class="col-lg-8">
          <input type="text" class="form-control" name="name[en]" id="name_en" value="{{ $major->getTranslation('name', 'en') }}">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-2">
          <label for="exampleInputEmail2" class="col-form-label">{{ __('dashboard.name-major-ar') }}</label>
        </div>
        <div class="col-lg-8">
          <input type="text" class="form-control" name="name[ar]" id="name_ar" value="{{ $major->getTranslation('name', 'ar') }}">


          <!-- <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email"> -->
        </div>
      </div>

      <div class="action d-flex mt-5 justify-content-end">
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <a href="{{ route('admins.majors.index') }}" class="btn btn-secondary ">Cancel
        </a>
      </div>
    </form>
  </div>
</div>

@endsection