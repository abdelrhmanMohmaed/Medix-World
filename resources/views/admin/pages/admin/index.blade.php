@extends('admin.layout.master')

@section('title', __('dashboard.admin-index'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.admins.index') }}">{{ __('dashboard.admin-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.admin-index')}} </li>
  </ol>
</nav>
@include('admin.layout.flash')

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-5">


          <a href="{{ route('admins.admins.create') }}" class="btn-sm btn-primary btn-icon-text"> <i class="fa-solid fa-plus"></i> Add New admin
          </a>
          <!-- <button type="button" class="btn btn-inverse-primary"></button> -->
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">

            <thead>
              <tr>
                <th>#</th>

                <th>{{ __('dashboard.name') }}</th>
                <th>{{ __('dashboard.email') }}</th>
                <th>{{ __('dashboard.status') }}</th>


                <th>{{ __('dashboard.actions') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($admins as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>

                <td>{{ $item->email }}</td>

                <td>@if ($item->active == 1) Active @else Inactive @endif</td>
                <td>
                  <a href="{{ route('admins.admins.show', $item->id) }}" class="btn-sm btn-secondary btn-icon-text"> <i class="fa-solid fa-eye p-1"></i>view
                  </a>

                  <a href="{{ route('admins.admins.edit', $item->id) }}" class="btn-sm btn-primary btn-icon-text m-1 "><i class="fa-solid fa-pen-to-square"></i> edit
                  </a>

                  @if($item->id != 1)
                  <form method="POST" action="{{ route('admins.admins.destroy', $item->id) }}" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-xs btn-icon-text p-1" onclick="return confirm('Are you sure to delete this user')"><i class="btn-icon-prepend fa-solid fa-trash"></i>Delete</button>
                  </form>
                  @endif
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