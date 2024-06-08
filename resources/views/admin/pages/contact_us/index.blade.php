@extends('admin.layout.master')

@section('title', 'Contact Us Messeges')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admins.messages.index') }}">{{ __('dashboard.message-index') }}
                </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.message-index') }} </li>
        </ol>
    </nav>
    @include('admin.layout.flash')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">

                            <thead>
                                <tr>
                                    <th>#</th>

                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.subject') }}</th>

                                    <th>{{ __('dashboard.status') }}</th>
                                    <th>{{ __('dashboard.send_time') }}</th>

                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>

                                        <td>{{ $item->subject }}</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" id="active_status"
                                                {{ $item->active ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" id="status_label"
                                                for="formSwitch1">{{ $item->active ? 'seen' : 'not seen' }}</label>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admins.messages.show', $item->id) }}"
                                                class="btn-sm btn-secondary btn-icon-text m-1"> <i
                                                    class="fa-solid fa-eye p-1"></i>view
                                            </a>
                                            <form method="POST" action="{{ route('admins.messages.destroy', $item->id) }}"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-xs btn-icon-text p-1 "
                                                    onclick="return confirm('Are you sure to delete this message')"><i
                                                        class="btn-icon-prepend fa-solid fa-trash"></i>Delete</button>
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
