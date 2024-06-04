@extends('admin.layout.master')

@section('title', __('dashboard.service_provider_index'))

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('admins.service_provider.index') }}">{{ __('dashboard.service-provider') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.service-provider') }} </li>
        </ol>
    </nav>

    @include('admin.layout.flash')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-5">


                        <a href="{{ route('admins.service_provider.create') }}" class="btn-sm btn-primary btn-icon-text"> <i
                                class="fa-solid fa-plus"></i> Add New Service Provider
                        </a>
                        <!-- <button type="button" class="btn btn-inverse-primary"></button> -->
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.name-service-provider-en') }}</th>
                                    <th>{{ __('dashboard.name-service-provider-ar') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>

                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service_providers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->getTranslation('name', 'en') }}</td>
                                        <td>{{ $item->getTranslation('name', 'ar') }}</td>
                                        <td>

                                            <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                            </div>
                                            @if ($item->status == 'Approval')
                                                Approved
                                            @else
                                                {{ $item->status }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-middle">

                                                <a href="{{ route('admins.service_provider.show', $item->id) }}"
                                                    class="btn-sm btn-secondary btn-icon-text"> <i
                                                        class="fa-solid fa-eye p-1"></i>view
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('admins.service_provider.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-icon-text "
                                                        onclick="return confirm('Are you sure to delete this service provider')"><i
                                                            class="btn-icon-prepend fa-solid fa-trash"></i>Delete</button>
                                                </form>

                                            </div>
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
