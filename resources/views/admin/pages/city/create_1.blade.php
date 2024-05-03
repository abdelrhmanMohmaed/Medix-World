@extends('admin.layouts._app')


@section('title', __('dashboard.city-create'))

@section('main')

<form action="{{ route('admins.cities.store') }}" method="post">
    @csrf

    <label for="name_en">{{ __('dashboard.name-city-en') }}</label>

    <input type="text" name="name[en]" id="name_en" value="{{ old('name.en') }}" @class(['form-control', 'is-invalid'=> $errors->has('name.en')])>
    @error('name.en')
    <span>{{ $message }}</span>
    @enderror

    <label for="name_ar">{{ __('dashboard.name-city-ar') }}</label>

    <input type="text" name="name[ar]" id="name_ar" value="{{ old('name.ar') }}" @class(['form-control', 'is-invalid'=> $errors->has('name.ar')])>
    @error('name.ar')
    <span>{{ $message }}</span>
    @enderror

    <button type="submit">{{ __('dashboard.submit') }}</button>
</form>

@if ($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@endsection