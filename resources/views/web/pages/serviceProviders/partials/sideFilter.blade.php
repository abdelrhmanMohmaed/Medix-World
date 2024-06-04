<!-- Start Section Filter One -->
<div class="col-md-2 pt-3">
    <div class="filter-box bg-white d-flex flex-column flex-shrink-0 p-3" style="position: sticky; top: 20px;">
        <button class="btn btn-primary filter-title">
            <i class="fa-solid fa-filter"></i> {{ __('website/web.provider-filter-title') }}
        </button>
        <hr>

        <form id="filterForm">
            <input type="hidden" name="major" value="{{ $major }}">
            <input type="hidden" name="city" value="{{ $city }}">
            <input type="hidden" name="area" value="{{ $area }}">


            <ul class="mynav nav nav-pills">
                <!-- Title -->
                <li class="sidebar-item nav-item mb-1">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#title"
                        aria-expanded="true" aria-controls="title">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span class="topic">{{ __('services/services.register-services-title') }}</span>
                    </a>
                    <ul id="title" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                        @foreach ($titles as $item)
                            <li class="sidebar-item">
                                <label>
                                    <input type="checkbox" name="title[]" value="{{ $item->id }}">
                                    {{ $item->title }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!-- Gender -->
                <li class="sidebar-item nav-item mb-1">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#gender"
                        aria-expanded="false" aria-controls="gender">
                        <i class="fa-solid fa-mars-and-venus"></i>
                        <span class="topic">{{ __('website/web.register-gender') }}</span>
                    </a>
                    <ul id="gender" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <label>
                                <input type="checkbox" name="gender[]" value="1">
                                {{ __('services/services.register-services-male') }}
                            </label>
                        </li>
                        <li class="sidebar-item">
                            <label>
                                <input type="checkbox" name="gender[]" value="2">
                                {{ __('services/services.register-services-female') }}
                            </label>
                        </li>
                    </ul>
                </li>

                <!-- Detection Price -->
                <li class="sidebar-item nav-item mb-1">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#price"
                        aria-expanded="false" aria-controls="price">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        <span class="topic">{{ __('services/services.register-services-booking-price') }}</span>
                    </a>
                    <ul id="price" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <!-- Start Add range input for price -->
                        <li class="sidebar-item">
                            <!-- Range 1 -->
                            <label>
                                <input type="checkbox" name="price_range[]" value="500-999">
                                500 - 999
                            </label>
                            <!-- Range 2 -->
                            <label>
                                <input type="checkbox" name="price_range[]" value="1000-1499">
                                1000 - 1499
                            </label>
                            <!-- Range 3 -->
                            <label>
                                <input type="checkbox" name="price_range[]" value="1501-1999">
                                1500 - 1999
                            </label>
                            <!-- Range 4 -->
                            <label>
                                <input type="checkbox" name="price_range[]" value="2001-8000">
                                2000 - 2999
                            </label>
                            <!-- Range 5 -->
                            <label>
                                <input type="checkbox" name="price_range[]" value="3000-4999">
                                3000 - 4999
                            </label>
                            <!-- Range 6 -->
                            <label>
                                <input type="checkbox" name="price_range[]" value="5000-7999">
                                5000 - 7999
                            </label>
                            <!-- Range 6 -->
                            <label>
                                <input type="checkbox" name="price_range[]" value="8000-10000">
                                8000 - 10000
                            </label>
                        </li>
                        <!-- End Add range input for price -->
                    </ul>
                </li>
            </ul>
        </form>

    </div>
</div>
<!-- End Section Filter One -->
