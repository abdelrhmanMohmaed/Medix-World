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
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add medical file
                        </button>
                    </div>
                    @include('service.pages.patient.partials.createMedicalModel')
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('website/web.profile-create-title') }}</th>
                                    <th scope="col">{{ __('website/web.profile-create-description') }}</th>
                                    <th scope="col">{{ __('website/web.profile-create-by') }}</th>
                                    <th scope="col">{{ __('website/web.profile-action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicalDocument as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>


                                        <td>
                                            @if ($item->user_id == Auth::id())
                                                <a target="__blank"
                                                    href="{{ route('website.search.service-provider.show', $item->serviceProvider->serviceProviderDetails->id) }}">

                                                    {{ $item->serviceProvider->serviceProviderDetails->name }}
                                                </a>
                                            @elseif($item->serviceProvider->serviceProviderDetails)
                                                <a target="__blank"
                                                    href="{{ route('website.search.service-provider.show', $item->serviceProvider->serviceProviderDetails->id) }}">

                                                    {{ $item->serviceProvider->serviceProviderDetails->name }}
                                                </a>
                                            @else
                                                Patient
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('services.patients.download', $item->id) }}">
                                                <i class="icon fa-solid fa-download"></i>
                                            </a>
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
