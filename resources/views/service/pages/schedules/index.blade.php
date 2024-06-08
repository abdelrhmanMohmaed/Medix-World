@extends('service.layout.master')
@section('title', 'Schedule')

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
                <div class="col-md-4 d-none d-md-block">
                    <div class="card">
                        <div class="card-header">
                            <strong>My Schedule</strong>
                            <br>
                            <small class="text-gray">If you wish to cancel an booking that has already been booked, please
                                contact the customer or contact the Medix Service.</small>
                        </div>
                        <div class="card-body">
                            @forelse ($daySchedules as $item)
                                <tr role="row">
                                    <div class="form-group">
                                        <th scope="row">{{ $loop->iteration }} - </th>
                                        <strong data-toggle="modal" style="cursor: pointer" href="#detailsModel">
                                            {{ \Carbon\Carbon::parse($item->start_time)->format('H:m') }}
                                        </strong>
                                        &nbsp;-&nbsp;
                                        <strong data-toggle="modal" style="cursor: pointer" href="#detailsModel">
                                            {{ \Carbon\Carbon::parse($item->end_time)->format('H:m') }}
                                        </strong>
                                        @if (isset($item->book->client))
                                            <br>
                                            &nbsp;<strong> Booking By : </strong>
                                            <a href="{{ route('services.patients.show', $item->book->client->id) }}">
                                                {{ $item->book->client->name }}
                                            </a>
                                        @elseif (isset($item->book))
                                            <br>
                                            &nbsp;<strong> Booking By : </strong>{{ $item->book->name }}
                                        @else
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a type="button" data-bs-toggle="modal" href="#deleteProject"
                                                data-id="{{ $item->id }}" title="cancel">
                                                <i class="fa-solid fa-trash-can text-danger fa-lg"></i>
                                            </a>
                                        @endif

                                    </div>
                                    <br>
                                </tr>
                            @empty
                                <span>No meeting today.</span>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
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
    <!-- Start Create Model-->
    @include('service.pages.schedules.partials.models.delete')
    <!-- End Create Model-->
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
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
                            title: moment('{{ $item->start_time }}').format('HH:mm') + '-' + moment(
                                '{{ $item->end_time }}').format('HH:mm'),
                            start: '{{ $item->start_time }}',
                            end: '{{ $item->end_time }}',
                            backgroundColor: '{{ $item->book ? 'green' : 'gray' }}',
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
                    var selectedDate = moment(start).format('YYYY-MM-DD');
                    var currentTime = moment().format('HH:mm');
                    var startDateTime = selectedDate + 'T' + currentTime;
                    var endDateTime = selectedDate + 'T23:59';

                    $('#fromDate').val(startDateTime);
                    $('#to').val(endDateTime);
                    $('#createEventModal').modal('toggle');
                }
            });
        });
        $('#deleteProject').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)

            modal.find('.modal-body #schedule_id').val(id);
        })
    </script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
@endpush
