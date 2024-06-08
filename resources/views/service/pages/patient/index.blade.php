@extends('service.layout.master')

@section('title', 'Patients')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Patients</li>
        </ol>
    </nav>
    @include('service.layout.flash')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-5">
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.phone') }}</th>
                                    <th>{{ __('dashboard.email') }}</th>
                                    <th>Date</th>
                                    <th>Medical History</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ @$item->name }}</td>

                                        <td>{{ @$item->tel }}</td>

                                        <td>{{ @$item->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse(@$item->schedule->start_time)->format('Y-m-d H:i') }}
                                            - {{ \Carbon\Carbon::parse(@$item->schedule->end_time)->format('Y-m-d H:i') }}
                                        </td>
                                        <td>
                                            @if ($item->client_id !== null)
                                                <a href="{{ route('services.patients.show', $item->client_id) }}"
                                                    class="btn-sm btn-secondary btn-icon-text">
                                                    <i class="fa-solid fa-eye p-1"></i>view
                                                </a>
                                            @else
                                                <small>He/She doesn't have an account at Medix.</small>
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
