@extends('admin.layouts._app')


@section('title', __('dashboard.city-create'))

@section('main')
    <form action="{{ route('admins.majors.update', $major->id) }}" method="post">
        @csrf @method('PATCH')

        <label for="name_en">{{ __('dashboard.name-major-en') }}</label>
        <input type="text" name="name[en]" id="name_en" value="{{ $major->getTranslation('name', 'en') }}"
        @class(['form-control', 'is-invalid' => $errors->has('name.en')])>
        @error('name.en')
            <span>{{ $message }}</span>
        @enderror

        <label for="name_ar">{{ __('dashboard.name-major-ar') }}</label>
        <input type="text" name="name[ar]" id="name_ar" value="{{ $major->getTranslation('name', 'ar') }}"
        @class(['form-control', 'is-invalid' => $errors->has('name.ar')])>
        @error('name.ar')
            <span>{{ $message }}</span>
        @enderror

        <button type="submit">{{ __('dashboard.submit') }}</button>
    </form>

    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
@endsection
