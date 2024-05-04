@extends('admin.layouts._app')


@section('title', __('dashboard.city-create'))

@section('main')
    <form action="{{ route('admins.advices.update', $advice->id) }}" method="post">
        @csrf @method('PATCH')

        <label for="title_en">{{ __('dashboard.title-advice-en') }}</label>
        <input type="text" name="title[en]" id="title_en" value="{{ $advice->getTranslation('title', 'en')}}" @class(['form-control', 'is-invalid' => $errors->has('title.en')])>

        <label for="title_ar">{{ __('dashboard.title-advice-ar') }}</label>
        <input type="text" name="title[ar]" id="title_ar" value="{{ $advice->getTranslation('title', 'ar')}}" @class(['form-control', 'is-invalid' => $errors->has('title.ar')])>

        <textarea name="description[en]" id="" @class([
            'form-control',
            'is-invalid' => $errors->has('description.en'),
        ]) cols="30" rows="10">
            {{ $advice->getTranslation('description', 'en') }}
        </textarea>

        <textarea name="description[ar]" id="" @class([
            'form-control',
            'is-invalid' => $errors->has('description.ar'),
        ]) cols="30" rows="10">
            {{ $advice->getTranslation('description', 'ar') }}
        </textarea>


        <img src="{{asset($advice->img)}}" alt="Medical Advice" srcset=""> 
        <input type="file" name="img" id="">
        <button type="submit">{{ __('dashboard.submit') }}</button>
    </form>

    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
@endsection
