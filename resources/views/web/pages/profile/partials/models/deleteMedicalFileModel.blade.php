<!-- start delete Modal -->
<div class="modal fade" id="deleteFile" tabindex="-1" aria-labelledby="deleteTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white bg-danger">
                <h5 class="modal-title" id="deleteTaskLabel">
                    <i class="fa-solid fa-trash-can"></i>
                    {{ __('website/web.profile-delete-btn') }}
                    <strong id="taskName">
                    </strong>
                </h5>
            </div>

            <form action="{{ route('website.medicals.destroy') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="file_id" id="file_id">
                    {{ __('website/web.profile-delete-alert') }} <br>
                    <small class="text-danger">
                        &#x2022; {{ __('website/web.profile-delete-alert-2') }}
                    </small>
                    <br>
                    <br>
                    <div class="modal-footer">
                        <button type="submit"
                            class="btn btn-sm btn-danger text-white">{{ __('website/web.profile-delete-btn') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end delete Modal -->
