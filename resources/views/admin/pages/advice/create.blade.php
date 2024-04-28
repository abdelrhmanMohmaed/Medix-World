@extends('admin.layouts._app')


@section('title', __('dashboard.advice-create'))

@section('main')

    <form action="{{ route('admins.advices.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="title_en">{{ __('dashboard.title-advice-en') }}</label>
        <input type="text" name="title[en]" id="title_en"
        value="{{ old('title.en') }}" @class(['form-control', 'is-invalid' => $errors->has('title.en')])>

        <label for="title_ar">{{ __('dashboard.title-advice-ar') }}</label>
        <input type="text" name="title[ar]" id="title_ar"
        value="{{ old('title.ar') }}" @class(['form-control', 'is-invalid' => $errors->has('title.ar')])>

        <textarea name="description[en]" id="" 
            @class(['form-control', 'is-invalid' => $errors->has('description.en')])
            cols="30" rows="10">
            {{old("description.en")}}
        </textarea>

        <textarea name="description[ar]" id="" 
            @class(['form-control', 'is-invalid' => $errors->has('description.ar')])
            cols="30" rows="10">
            {{old("description.ar")}}
        </textarea>

        <input type="file" name="img" id="">
        <button type="submit">{{ __('dashboard.submit') }}</button>
    </form>

    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

@endsection
