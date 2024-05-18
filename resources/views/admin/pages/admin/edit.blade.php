@extends('admin.layout.master')

@section('title', __('dashboard.admin-edit'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.admins.index') }}">{{ __('dashboard.admin-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.admin-edit')}}</li>
  </ol>
</nav>
@include('admin.layout.flash')

<form class="forms-sample" action="{{ route('admins.admins.update', $user->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="row mb-3">
    <label for="exampleInputadminname2" class="col-sm-3 col-form-label">{{ __('dashboard.name') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="fullName" id="fullName" value="{{ $user->name }}">

    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">{{ __('dashboard.phone') }}</label>
    <div class="col-sm-9">
      <input type="tel" class="form-control" name="tel" id="tel" value="{{ $user->phones->first()?->tel }}">
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-3">
      <label for="defaultconfig" class="col-form-label">Email</label>
    </div>
    <div class="col-lg-8">
      <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-3">
      <label for="defaultconfig" class="col-form-label">Date of Birth</label>
    </div>
    <div class="col-lg-8">
      <input class="form-control" type="date" id="date_of_birth" name="dateOfBirth" value="{{ $user->dateOfBirth }}">
    </div>
  </div>

  <div class="row mb-3">
      <div class="col-lg-3">
        <label for="defaultconfig-3" class="col-form-label">Gender</label>
      </div>
      <div class="col-lg-8">
        <input type="radio" class="form-check-input" name="gender" id="radioDefault1" value="1" @if($user->gender ==1) checked @endif>
        <label class="form-check-label" for="radioDefault1">
          Male
        </label>
        <input type="radio" class="form-check-input" name="gender" id="radioDefault1" value="2" @if( $user->gender ==2) checked @endif>
        <label class="form-check-label" for="radioDefault1">
          Female
        </label>
      </div>
    </div>

  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button class="btn btn-secondary">Cancel</button>
</form>
@endsection