<option selected disabled>{{ __('website/web.choose-area') }}</option>
@foreach ($regions as $item)
    <option value="{{ $item->id }}">
        {{ $item->getTranslation('name', app()->getLocale()) }}
    </option>
@endforeach
