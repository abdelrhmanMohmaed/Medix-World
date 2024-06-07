    <!-- start delete Modal -->
    <div class="modal fade" id="deleteProject" tabindex="-1" aria-labelledby="deleteProjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white bg-danger">
                    <h5 class="modal-title" id="deleteProjectLabel">
                        <i class="fa-solid fa-trash-can"></i>
                        Destroy Project
                        <strong id="nameProject">
                        </strong>
                    </h5>
                </div>

                <form action="{{ route('services.schedules.destroy') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="schedule_id" id="schedule_id">
                        Are you sure you want to delete this schedule ? <br>
                        <small class="text-danger">
                            &#x2022; The system will remove schedule.
                        </small>
                        <br>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-danger text-white">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit Modal -->
