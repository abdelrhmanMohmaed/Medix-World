<div class="tab-pane fade" id="medical_history" role="tabpanel" aria-labelledby="medical_history-tab">
    <!-- Content for Medical History Tab -->
    <h4>
        <i class="icon fa-solid fa-file-medical"></i>
        {{__('website/web.profile-medical-history')}}
    </h4>
    
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        {{__('website/web.profile-create-add')}}
    </button>
    

    <!-- specialty -->
    <div class="row my-2">
        <label for="specialty"
            class="col-md-3 col-form-label">{{ __('services/services.register-services-major') }}*</label>

        <div class="col-md-9">
            <select name="specification" id="specification" class="form-control form-control-sm">
                <option selected disabled">{{ __('website/web.choose-specialty') }}</option>
                @foreach ($allMajors as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- document table -->
    <div class="row my-2">
        <div class="col-md-12">
            <div class="specialty">
                {{-- display document --}}
            </div>
        </div>
    </div>
</div>
