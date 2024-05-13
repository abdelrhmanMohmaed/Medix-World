@extends('admin.layout.master')

@section('title', __('dashboard.role-edit'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.roles.index') }}">{{ __('dashboard.role-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.role-edit')}}</li>
  </ol>
</nav>
@include('admin.layout.flash')

<form class="forms-sample" action="{{ route('admins.roles.update', $role->id) }}" method="post">
  @csrf @method('PATCH')
  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-role') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name" id="name_en" value="{{ $role->name }}" >
    </div>
  </div>

  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('dashboard.name-permissions') }}</label>
    <div class="col-sm-9">
      @php 
      $items = json_decode($role->permissions, true);

// Array to store only the "id" values
$ids = array();

// Loop through each item and extract the "id" value
foreach ($items as $item) {
    $ids[] = $item['id'];
}

      echo $role->permission
      @endphp
      @foreach ($permissions as $item)
      <div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" name="permissions[]" id="name_en" value="{{ $item->name }}" {{ in_array($item->id, $ids) ? 'checked' : '' }}> {{ $item->name }}
      </div>
      @endforeach
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button class="btn btn-secondary">Cancel</button>
</form>
@endsection