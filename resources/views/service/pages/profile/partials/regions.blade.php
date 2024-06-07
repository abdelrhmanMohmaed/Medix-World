<select id="region" class="form-select select2 w-100" name="area" id="areaSelect">
    <option selected disabled>{{ __('website/web.choose-area') }}</option>

    @foreach ($regions as $item)
        <option value="{{ $item->id }}" {{ $item->id == @$area ? 'selected' : '' }}>
            {{ $item->name }}
        </option>
    @endforeach
</select>
