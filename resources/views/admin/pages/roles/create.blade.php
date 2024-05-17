@extends('admin.layout.master')

@section('title', __('dashboard.role-create'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.roles.index') }}">{{ __('dashboard.role-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.role-create')}}</li>
  </ol>
</nav>
@include('admin.layout.flash')

<form class="forms-sample" action="{{ route('admins.roles.store') }}" method="post">
  @csrf

  <!-- <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-role') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name" id="name_en" value="{{ old('name') }}">
    </div>
  </div>



  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-permissions') }}</label>
    <div class="col-sm-9">
      @foreach ($permissions as $item)
      <div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" name="permission[]" id="name_en" value="{{ $item->id }}"> {{ $item->name }}
      </div>
      @endforeach
    </div> -->


    @php
  $mid = ceil($permissions->count() / 2);
  $leftColumn = $permissions->slice(0, $mid);
  $rightColumn = $permissions->slice($mid);
  @endphp

  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-permissions') }}</label>
    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-6">
          @foreach ($leftColumn as $item)
          <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" name="permissions[]" id="permission_{{ $item->id }}" value="{{ $item->name }}">
            <label class="form-check-label" for="permission_{{ $item->id }}">{{ $item->name }}</label>
          </div>
          @endforeach
        </div>
        <div class="col-md-6">
          @foreach ($rightColumn as $item)
          <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" name="permissions[]" id="permission_{{ $item->id }}" value="{{ $item->name }}">
            <label class="form-check-label" for="permission_{{ $item->id }}">{{ $item->name }}</label>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button class="btn btn-secondary">Cancel</button>
</form>
@endsection