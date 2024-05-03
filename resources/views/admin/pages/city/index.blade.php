@extends('admin.layout.master')

@section('title', __('dashboard.city-index'))

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">{{ __('dashboard.city-index')}} </a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>


                <th>{{ __('dashboard.name-city-en') }}</th>
                <th>{{ __('dashboard.name-city-ar') }}</th>
                <th>{{ __('dashboard.status') }}</th>

                <th>{{ __('dashboard.actions') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cities as $item)
              <tr>
                <td>{{ $item->getTranslation('name', 'en') }}</td>
                <td>{{ $item->getTranslation('name', 'ar') }}</td>
                <td href="{{ route('admins.cities.status', $item->id) }}">
                  @if ($item->active == 0)
                  Active
                  <a href="{{ route('admins.cities.status', $item->id) }}"> &nbsp;

                    <span><i class="link-arrow" data-feather="toggle-right"></i></span>
                  </a>
                  @else
                  In active
                  <a href="{{ route('admins.cities.status', $item->id) }}">&nbsp;
                    <span><i class="link-arrow" data-feather="toggle-left"></i></span> </a>
                  @endif
                </td>
                <td colspan="3">
                  <a href="{{ route('admins.cities.edit', $item->id) }}"> <i class="link-arrow" data-feather="edit"></i> edit
                  </a>

                  <!-- <a href="{{ route('admins.cities.destroy', $item->id) }}"> <i class="link-arrow" data-feather="trash" ></i> Delete
                  </a> -->
                  
                  <form method="POST" action="{{ route('admins.cities.destroy', $item->id) }}" onsubmit="return confirm('Are You sure?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn bg-gradient-danger btn-sm">
                      <i class="link-arrow" data-feather="trash"></i> Delete
                    </button>
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