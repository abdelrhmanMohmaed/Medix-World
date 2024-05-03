@extends('admin.layouts._app')


@section('title', __('dashboard.city-create'))

@section('main')



<form class="forms-sample">
  <div class="row mb-3">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email">
    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email">
    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
    </div>
  </div>
  <div class="row mb-3">
    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="exampleInputPassword2" autocomplete="off" placeholder="Password">
    </div>
  </div>
  <div class="form-check mb-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">
      Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button class="btn btn-secondary">Cancel</button>
</form>
<form action="{{ route('admins.cities.update', $city->id) }}" method="post">
  @csrf @method('PATCH')

  <label for="name_en">{{ __('dashboard.name-city-en') }}</label>

  <input type="text" name="name[en]" id="name_en" value="{{ $city->getTranslation('name', 'en') }}" @class(['form-control', 'is-invalid'=> $errors->has('name.en')])>
  @error('name.en')
  <span>{{ $message }}</span>
  @enderror

  <label for="name_ar">{{ __('dashboard.name-city-ar') }}</label>

  <input type="text" name="name[ar]" id="name_ar" value="{{ $city->getTranslation('name', 'ar') }}" @class(['form-control', 'is-invalid'=> $errors->has('name.ar')])>
  @error('name.ar')
  <span>{{ $message }}</span>
  @enderror

  <button type="submit">{{ __('dashboard.submit') }}</button>
</form>

@if ($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@endsection