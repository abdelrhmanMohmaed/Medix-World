@extends('service.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/fullcalendar/main.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <style>
        .fc-content .fc-time {
            display: none;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 d-none d-md-block">
                    <div class="card">
                        <div class="card-body  ">
                            @forelse ($daySchedules as $item)
                                <tr role="row">
                                    <div class="form-group">
                                        <th scope="row">{{ $loop->iteration }} - </th>
                                        <strong data-toggle="modal" style="cursor: pointer" href="#detailsModel">
                                            {{ \Carbon\Carbon::parse($item->start_time)->format('H:i A') }}
                                        </strong>
                                        &nbsp;-&nbsp;
                                        <strong data-toggle="modal" style="cursor: pointer" href="#detailsModel">
                                            {{ \Carbon\Carbon::parse($item->end_time)->format('H:i A') }}
                                        </strong>
                                        <button class="btn btn-sm btn-danger bg-gradient-danger float-right"
                                            data-toggle="modal" href="#deleteModel" title="delete">
                                            Delete
                                        </button>
                                    </div>
                                    <br>
                                </tr>
                            @empty
                                <span>No meeting today.</span>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div id='fullcalendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle1" class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"><span
                            class="visually-hidden">close</span></button>
                </div>
                <div id="modalBody1" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Event Page</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Create Model-->
    @include('service.pages.schedules.partials.models.create')
    <!-- End Create Model-->
@endsection



@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/main.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#fullcalendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaWeek,agendaDay,month,listWeek'
                },
                height: 650,
                events: [
                    @foreach ($schedules as $item)
                        {
                            title: moment('{{ $item->start_time }}').format('hh:mma') + '-' + moment(
                                '{{ $item->end_time }}').format('hh:mma'),
                            start: '{{ $item->start_time }}',
                            end: '{{ $item->end_time }}',
                            backgroundColor: 'red',
                            borderColor: '#ffffff',
                            extendedProps: {
                                department: 'BioChemistry'
                            }
                        },
                    @endforeach
                ],
                initialView: 'listWeek',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {
                    $('#createEventModal').modal('toggle');
                }
            });
        });
    </script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
@endpush
