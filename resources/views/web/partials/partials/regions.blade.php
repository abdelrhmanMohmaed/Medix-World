<option selected disabled>{{ __('website/web.choose-area') }}</option>
<option value="allAreas">
    {{ __('website/web.website/web.choose-area-all') }}
</option>
@foreach ($regions as $item)
    <option value="{{ $item->id }}">
        {{ $item->getTranslation('name', app()->getLocale()) }}
    </option>
@endforeach
