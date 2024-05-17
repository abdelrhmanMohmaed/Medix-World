@extends('admin.layout.master')

@section('title', __('dashboard.region-index'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />

@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.cities.index') }}">{{ __('dashboard.region-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.region-index')}} </li>
  </ol>
</nav>
@include('admin.layout.flash')

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-5">


          <a href="{{ route('admins.regions.create') }}" class="btn-sm btn-primary btn-icon-text"> <i class="fa-solid fa-plus"></i> Add New Region
          </a>
          <!-- <button type="button" class="btn btn-inverse-primary"></button> -->
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">

            <thead>
              <tr>
                <th>#</th>
                <th>{{ __('dashboard.name-region-en') }}</th>
                <th>{{ __('dashboard.name-region-ar') }}</th>
                <th>{{ __('dashboard.name-city-en') }}</th>

                <th>{{ __('dashboard.status') }}</th>

                <th>{{ __('dashboard.actions') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($regions as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->getTranslation('name', 'en') }}</td>
                <td>{{ $item->getTranslation('name', 'ar') }}</td>
                <td>{{ $item->city->getTranslation('name', 'ar') }}</td>

                <td>
                  <div class="form-check form-switch mb-2" id="status">
                    <form method="get" action="{{ route('admins.regions.status', $item->id) }}" class="d-inline">
                      @csrf
                      <input type="checkbox" class="form-check-input" id="active_status" onchange="this.form.submit()" name="active" value="1" {{ $item->active ? 'checked': ''}}>
                      <label class="form-check-label" id="status_label" for="formSwitch1">{{ $item->active ? 'Active': 'In-Active'}}</label>
                    </form>
                  </div>
                </td>
                
                <td colspan="3">

                  </a>
                  <a href="{{ route('admins.regions.edit', $item->id) }}" class="btn-sm btn-primary btn-icon-text m-2 "><i class="fa-solid fa-pen-to-square"></i> edit
                  </a>


                  <form method="POST" action="{{ route('admins.regions.destroy', $item->id) }}" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-xs btn-icon-text p-1" onclick="return confirm('Are you sure to delete this region')"><i class="btn-icon-prepend fa-solid fa-trash"></i>Delete</button>
                  </form>

                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/data-table.js') }}"></script>

@endpush