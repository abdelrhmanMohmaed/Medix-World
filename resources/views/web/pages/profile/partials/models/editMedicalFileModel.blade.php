<div class="modal fade" id="editFile" tabindex="-1" aria-labelledby="editFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editFileLabel">{{ __('website/web.profile-update-medical') }}</h1>
            </div>
            <form method="post" action="{{ route('website.medicals.update') }}" class="modal-body"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('website/web.profile-create-title') }}*</label>
                    <input type="text" class="form-control" name="title" id="title"
                        placeholder="{{ __('website/web.profile-create-title') }}">
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">{{ __('website/web.profile-create-file') }}*</label>
                    <input type="file" class="form-control" name="file" id="file">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('website/web.profile-create-description') }}</label>
                    <textarea class="form-control" id="description" name="description" id="" cols="30" rows="10"
                        placeholder="{{ __('website/web.profile-create-description') }}"></textarea>
                </div>
                <input type="hidden" name="file_id" id="file_id">

                <button type="submit" class="btn btn-primary">{{ __('website/web.profile-update-btn') }}</button>
            </form>
        </div>
    </div>
</div>