<section id="nav_search" style="padding-top: 1.5rem;">
    <div class="w-100 contad-flex d-flex align-items-center justify-content-center fs-1 text-white flex-column">
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5 w-100">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-bady-search card-body rounded-5 position-relative">
                        <div class="w-100" style="max-height: 250px; overflow: hidden;">
                            <img src="{{ asset('assets/images/user/landing/default.jpg') }}" loading="lazy"
                                class="img-fluid" style="width: 100%; height: 250px; background-size:cover">
                        </div>
                        <form action="{{ route('website.search.service-provider') }}" method="get">

                            <div class="button-container position-absolute  translate-middle" style="z-index: 2;">
                                <div class="btn-custom btn-group w-25">
                                    <select class="form-select select2 w-100" name="major">
                                        <option selected disabled>{{ __('website/web.choose-specialty') }}</option>
                                        <option value="allMajors" @selected('allMajors' == @$major)>
                                            {{ __('website/web.provider-all-specialty') }}
                                        </option>
                                        @foreach ($allMajors as $item)
                                            <option value="{{ $item->id }}" @selected($item->id == @$major)>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="btn-custom btn-group w-25">
                                    <select class="city form-select select2 w-100" name="city">
                                        <option selected disabled>{{ __('website/web.choose-city') }}</option>
                                        <option value="allCities" @selected('allCities' == @$city)>
                                            {{ __('website/web.website/web.choose-specialty-all') }}
                                        </option>
                                        @foreach ($allCities as $item)
                                            <option value="{{ $item->id }}" @selected($item->id == @$city)>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="btn-custom btn-group w-25">
                                    <select class="region form-select select2 w-100" name="area" id="areaSelect">
                                        <option selected disabled>{{ __('website/web.choose-area') }}</option>

                                        <option value="allAreas">
                                            {{ __('website/web.website/web.choose-area-all') }}
                                        </option>
                                        <!-- Display as us axios -->
                                    </select>
                                </div>

                                <div class="btn-custom btn-group w-25">
                                    <button type="submit" class="btn searh-btn p-2 text-center"
                                        title="{{ __('website/web.choose-search') }}">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        {{ __('website/web.choose-search') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
