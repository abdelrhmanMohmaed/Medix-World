<div id="createEventModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle2" class="modal-title">Add Schedule</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><span
                        class="visually-hidden">close</span></button>
            </div>
            <div id="modalBody2" class="modal-body">
                <form method="post" action="{{ route('services.schedules.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="fromDate" class="form-label">Start</label>
                        <input type="datetime-local" class="form-control" name="from" id="fromDate" required>
                    </div>

                    <div class="mb-3">
                        <label for="to" class="form-label">End</label>
                        <input type="datetime-local" class="form-control" id="to" name="to" required>
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Detection Duration</label>
                        <input type="time" class="form-control" id="duration" name="duration" required>
                        <small>Enter your screening duration and we'll split the bookings.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
