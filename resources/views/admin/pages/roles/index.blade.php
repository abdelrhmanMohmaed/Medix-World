@extends('admin.layout.master')

@section('title', __('dashboard.role-index'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admins.roles.index') }}">{{ __('dashboard.role-index') }} </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.role-index') }} </li>
        </ol>
    </nav>
    @include('admin.layout.flash')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-5">
                        <a href="{{ route('admins.roles.create') }}" class="btn-sm btn-primary btn-icon-text"> <i
                                class="fa-solid fa-plus"></i> Add role
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td colspan="3">

                                            </a>
                                            <a href="{{ route('admins.roles.edit', $item->id) }}"
                                                class="btn-sm btn-primary btn-icon-text m-2 "><i
                                                    class="fa-solid fa-pen-to-square"></i> edit
                                            </a>


                                            <form method="POST" action="{{ route('admins.roles.destroy', $item->id) }}"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-xs btn-icon-text p-1"><i
                                                        class="btn-icon-prepend fa-solid fa-trash"></i>Delete</button>
                                            </form>
                                            <!-- <form method="POST" action="{{ route('admins.roles.destroy', $item->id) }}" onsubmit="return confirm('Are You sure?')">
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
