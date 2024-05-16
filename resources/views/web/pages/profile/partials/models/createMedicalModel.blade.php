<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('website/web.profile-create-medical') }}</h1>
            </div>
            <form method="post" action="{{ route('website.medicals.store') }}" class="modal-body"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1"
                        class="form-label">{{ __('services/services.register-services-major') }}*</label>
                    <select name="major" id="specification" class="form-control form-control-sm">
                        <option selected disabled">{{ __('website/web.choose-specialty') }}</option>
                        @foreach ($allMajors as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>


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
                    <textarea class="form-control" name="description" id="" cols="30" rows="10"
                        placeholder="{{ __('website/web.profile-create-description') }}"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('dashboard.submit') }}</button>
            </form>
        </div>
    </div>
</div>
