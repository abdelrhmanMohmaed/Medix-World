@extends('admin.layout.master')

@section('title', __('dashboard.user-index'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route ('admins.cities.index') }}">{{ __('dashboard.user-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.user-index')}} </li>
  </ol>
</nav>
@include('admin.layout.flash')

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-5">


          <a href="{{ route('admins.users.create') }}" class="btn-sm btn-primary btn-icon-text"> <i class="fa-solid fa-plus"></i> Add New user
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


                <th>{{ __('dashboard.actions') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>

                <td>{{ $item->email }}</td>

                <td>
                  <a href="{{ route('admins.users.show', $item->id) }}" class="btn-sm btn-secondary btn-icon-text"> <i class="fa-solid fa-eye p-1"></i>view
                  </a>

                  <a href="{{ route('admins.users.edit', $item->id) }}" class="btn-sm btn-primary btn-icon-text m-1 "><i class="fa-solid fa-pen-to-square"></i> edit
                  </a>


                  <form method="POST" action="{{ route('admins.users.destroy', $item->id) }}" class="d-inline"> 
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-xs btn-icon-text p-1"><i class="btn-icon-prepend fa-solid fa-trash"></i>Delete</button>
                  </form>
                  

                  <!-- <form method="POST" action="{{ route('admins.cities.destroy', $item->id) }}" onsubmit="return confirm('Are You sure?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn bg-gradient-danger btn-sm">
                      <i class="link-arrow" data-feather="trash"></i> Delete
                    </button>
                  </form> -->

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
