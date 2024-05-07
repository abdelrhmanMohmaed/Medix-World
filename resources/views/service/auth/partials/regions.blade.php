<option selected disabled> {{ __('services/services.register-services-menu') }}</option>
@foreach ($regions as $item)
    <option value="{{ $item->id }}">
        {{ $item->getTranslation('name',  app()->getLocale()) }}
    </option>
@endforeach
