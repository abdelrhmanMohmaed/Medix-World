@extends('admin.layouts._app')


@section('title', __('dashboard.region-create'))

@section('main')
    <form action="{{ route('admins.regions.store') }}" method="post">
        @csrf

        <label for="city">{{ __('dashboard.name-city-en') }}</label>
        <select name="city_id" id="city"
        @class(['form-control', 'is-invalid' => $errors->has('city_id')])>
            <option disabled selected>{{ __('dashboard.select-city') }}</option>
            @foreach ($cities as $item)
                <option value="{{ $item->id }}" @selected($item->id == old('city_id'))>
                    {{ $item->getTranslation('name', app()->getLocale()) }}
                <option>
            @endforeach
        </select>
        @error('city_id')
            <span>{{ $message }}</span>
        @enderror

        <label for="name_en">{{ __('dashboard.name-region-en') }}</label>
        <input type="text" name="name[en]" id="name_en"
        value="{{ old('name.en') }}" @class(['form-control', 'is-invalid' => $errors->has('name.en')])>
        @error('name.en')
            <span>{{ $message }}</span>
        @enderror

        <label for="name_ar">{{ __('dashboard.name-region-ar') }}</label>
        <input type="text" name="name[ar]" id="name_ar"
        value="{{ old('name.ar') }}" @class(['form-control', 'is-invalid' => $errors->has('name.ar')])>
        @error('name.ar')
            <span>{{ $message }}</span>
        @enderror

        <button type="submit">{{ __('dashboard.submit') }}</button>
    </form>

    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

@endsection
