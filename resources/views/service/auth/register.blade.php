<!DOCTYPE html>
@php
    $dir = 'ltr';
    if (str_replace('_', '-', app()->getLocale()) == 'ar') {
        $dir = 'rtl';
    }
@endphp
<html dir="{{ $dir }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('services/services.register-services') }}</title>

        <link href="https://www.nobleui.com/laravel/template/demo1/assets/plugins/jquery-steps/jquery.steps.css"
            rel="stylesheet" />

        <!-- common css -->
        <link href="https://www.nobleui.com/laravel/template/demo1/css/app.css" rel="stylesheet" />
        <!-- end common css -->

        <!-- Select 2 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
            integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <style>
            body {
                background: #EEF0F2;
            }

            .select2-container {
                width: 100% !important;
            }

            .select2-selection {
                height: 41px !important;
            }

            .major .select2-selection__arrow {
                margin-top: 11px !important;
            }

            .major .select2-container--open .select2-dropdown

            /* .select2-dropdown--below */
                {
                top: -10.387px !important;
            }

            #wizard .content {
                min-height: 35em !important;
                border: 0;
            }

            #wizard-t-2 {
                margin-inline-start: 10px;
            }

            /*  open this condation after finish */
            /* @if ($dir == 'rtl')
            .wizard>.actions {
                text-align: left;
            }
            @endif
            */
        </style>
    </head>

<body>
    <!-- Register Container -->
    <section class="container py-3 d-flex justify-content-center align-items-center min-vh-100 ">
        <div class="row border rounded-5 p-3 bg-white shadow box-area w-100 h-100">
            <!-- Left Box -->
            <div class="col-md-3 my-2 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #9EBFC8;">
                <div class="featured-image mb-3">
                    <img src="{{ asset('assets/images/user/register/default.jpg') }}" class="img-fluid"
                        style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-weight: 600;">
                    {{ __('website/web.login-be-verified') }}
                </p>
                <small class="text-white text-wrap text-center" style="font-family: 'Courier New', Courier, monospace;">
                    {{ __('website/web.login-be-verified-summary') }}
                </small>
            </div>
            <!-- End Left Box -->

            <!-- Right Box -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 my-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('services/services.register-services') }}</h4>
                                <p class="text-muted mb-3">
                                    {{ __('services/services.register-services-hello') }}
                                    <br>
                                    <small>{{ __('website/web.register-already-registered') }}
                                        <a href="{{ route('services.login') }}">
                                            {{ __('website/web.login') }}
                                        </a>
                                    </small>
                                </p>


                                <form id="form" action="{{ route('services.register') }}" method="post"
                                    enctype="multipart/form-data" class="h-100">
                                    @csrf

                                    <div id="wizard">
                                        <h2>{{ __('services/services.register-services-personal-information') }}</h2>
                                        <section class="w-100">
                                            <!-- names -->
                                            <div class="row my-2">
                                                <label for="name_en"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-full-name') }}
                                                    (EN)*</label>

                                                <div class="col-md-9">
                                                    <input type="text" class="form-control  form-control-sm"
                                                        name="name[en]" required autofocus autocomplete="name"
                                                        id="name_en" value="{{ old('name.en') }}"
                                                        placeholder="{{ __('services/services.register-services-full-name') }} (EN)"
                                                        @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('name.en')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <label for="name_ar"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-full-name') }}
                                                    (AR)*</label>

                                                <div class="col-md-9">
                                                    <input type="text" class="form-control  form-control-sm"
                                                        name="name[ar]" required
                                                        placeholder="{{ __('services/services.register-services-full-name') }} (AR)"
                                                        autocomplete="cc-name" id="name_ar"
                                                        value="{{ old('name.ar') }}" @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('name.ar')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- names -->

                                            <!-- phone -->
                                            <div class="row my-2">
                                                <label for="tel"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-tel') }}*</label>

                                                <div class="col-md-9">
                                                    <input type="tel" name="tel" id="tel"
                                                        autocomplete="tel" required value="{{ old('tel') }}"
                                                        placeholder="+201123843996" @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('tel')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <label for="tel"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-tel') }}*</label>

                                                <div class="col-md-9">
                                                    <input type="tel" name="telTwo" id="tel"
                                                        autocomplete="tel" value="{{ old('telTwo') }}"
                                                        placeholder="+201123843996" @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('telTwo')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- phone -->

                                            <!-- Gender BirthDay Profile Image-->
                                            <div class="row my-2">
                                                <label for="male_radio"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-gender') }}*</label>

                                                <div class="col-md-3 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            required id="male_radio" value="1"
                                                            @checked(old('gender') == 1)>
                                                        <label class="form-check-label"
                                                            for="male_radio">{{ __('services/services.register-services-male') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            required id="female_radio" value="2"
                                                            @checked(old('gender') == 2)>

                                                        <label class="form-check-label"
                                                            for="female_radio">{{ __('services/services.register-services-female') }}</label>
                                                    </div>
                                                    @error('gender')
                                                        <br>
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>

                                                <label for="date_of_birth"
                                                    class="col-md-2 col-form-label">{{ __('services/services.register-services-date') }}*</label>

                                                <div class="col-md-4">
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="dateOfBirth" required id="date_of_birth"
                                                        value="{{ old('dateOfBirth') }}" @class(['form-control bg-light fs-6'])>
                                                    @error('dateOfBirth')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <label for="img"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-profile-image') }}*</label>

                                                <div class="col-md-9">
                                                    <input type="file" id="img" required name="profileImage"
                                                        value="{{ old('profileImage') }}" required
                                                        @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('profileImage')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Gender BirthDay Profile Image-->

                                            <!-- Email Password -->
                                            <div class="row my-2">
                                                <label for="email"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-email-address') }}*</label>

                                                <div class="col-md-9">
                                                    <input type="email" class="form-control  form-control-sm"
                                                        name="email" id="email" required autofocus
                                                        value="{{ old('email') }}" autocomplete="email"
                                                        placeholder="example@domin.com">
                                                    @error('email')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <label for="password"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-password') }}</label>

                                                <div class="col-md-9">
                                                    <input type="password" id="password" name="password" required
                                                        autocomplete="new-password" required
                                                        @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('password')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <label for="password_confirmation"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-confirm-password') }}</label>

                                                <div class="col-md-9">
                                                    <input type="password" id="password_confirmation" required
                                                        name="password_confirmation" required
                                                        autocomplete="new-password" @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('password_confirmation')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Email Password -->
                                        </section>


                                        <h2>{{ __('services/services.register-services-major') }}</h2>
                                        <section class="w-100">
                                            <!-- Title, Specialization -->
                                            <div class="row my-2">
                                                <label for="major"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-major') }}*</label>

                                                <div class="col-md-9">
                                                    <select name="major_id" id="major" required
                                                        @class(['form-control form-control-sm bg-light fs-6 select2 major'])>
                                                        <option selected disabled>
                                                            {{ __('services/services.register-services-menu') }}
                                                        </option>

                                                        @foreach ($majors as $item)
                                                            <option value="{{ $item->id }}"
                                                                @selected($item->id == old('major_id'))>
                                                                {{ $item->getTranslation('name', app()->getLocale()) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('major_id')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <label for="title"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-title') }}*</label>

                                                <div class="col-md-9">
                                                    <select name="title_id" id="title" required
                                                        @class(['form-control form-control-sm bg-light fs-6 select2 title'])>
                                                        <option selected disabled>
                                                            {{ __('services/services.register-services-menu') }}
                                                        </option>

                                                        @foreach ($titles as $item)
                                                            <option value="{{ $item->id }}"
                                                                @selected($item->id == old('title_id'))>
                                                                {{ $item->getTranslation('title', app()->getLocale()) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('title_id')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Title, Specialization -->
                                            <!-- medical_association_card -->
                                            <div class="row my-2">
                                                <label for="medical_association_card"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-medical-association-card') }}*</label>

                                                <div class="col-md-9">
                                                    <input name="medical_association_card"
                                                        id="medical_association_card" required
                                                        value="{{ old('medical_association_card') }}"
                                                        @class(['form-control form-control-sm bg-light fs-6 title']) type="file">

                                                    @error('medical_association_card')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- medical_association_card -->

                                            <!-- Summarys -->
                                            <div class="row my-2 ">
                                                <label for="summary_en"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-summary') }}
                                                    (EN)*</label>
                                                <div class="col-md-9 my-2">
                                                    <textarea class="form-control form-control-sm" name="summary[en]"
                                                        placeholder="{{ __('services/services.register-services-summary-details') }} (EN)" id="summary_en"
                                                        style="height: 100px">{{ old('summary.en') }}</textarea>
                                                    @error('summary.en')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <label for="summary_ar"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-summary') }}
                                                    (AR)*</label>
                                                <div class="col-md-9 my-2">
                                                    <textarea class="form-control form-control-sm" name="summary[ar]"
                                                        placeholder="{{ __('services/services.register-services-summary-details') }} (AR)" id="summary_ar"
                                                        style="height: 100px">{{ old('summary.ar') }}</textarea>
                                                    @error('summary.ar')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Summarys -->
                                        </section>


                                        <h2>{{ __('services/services.register-services-information-about-the-clinic') }}
                                        </h2>
                                        <section class="w-100">
                                            <!-- Cities Regions -->
                                            <div class="row my-2">
                                                <label for="city"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-cities') }}*</label>

                                                <div class="col-md-9">
                                                    <select name="city_id" required
                                                        class="city form-control form-control-sm form-control-sm bg-light fs-6 select2 city">
                                                        <option selected disabled>
                                                            {{ __('services/services.register-services-menu') }}
                                                        </option>
                                                        @foreach ($cities as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->getTranslation('name', app()->getLocale()) }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('city_id')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <label for="region"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-regions') }}*</label>

                                                <div class="col-md-9">
                                                    <select name="region_id" id="region" required
                                                        class="form-control  form-control-sm form-control-sm bg-light fs-6 select2 region">
                                                        <option selected disabled>
                                                            {{ __('services/services.register-services-menu') }}
                                                        </option>

                                                    </select>

                                                    @error('region_id')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Cities Regions -->

                                            <!-- Address -->
                                            <div class="row my-2">
                                                <label for="address_en"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-address') }}
                                                    (EN)*</label>

                                                <div class="col-md-9">
                                                    <input type="text" id="address_en" required name="address[en]"
                                                        placeholder="{{ __('services/services.register-services-address-detailed') }}"
                                                        value="{{ old('address.en') }}" autocomplete="address-level1"
                                                        @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('address.en')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <label for="address_ar"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-address') }}
                                                    (AR)*</label>

                                                <div class="col-md-9">
                                                    <input type="text" id="address_ar" required name="address[ar]"
                                                        placeholder="{{ __('services/services.register-services-address-detailed') }}"
                                                        value="{{ old('address.ar') }}" autocomplete="address-level1"
                                                        @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('address.ar')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Address -->

                                            <div class="row my-2">
                                                <label for="clinic_tel"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-clinic-tel') }}*</label>
                                                <div class="col-md-9">
                                                    <input type="tel" id="clinic_tel" required
                                                        value="{{ old('clinicTel') }}" name="clinicTel"
                                                        placeholder="+2001123549745" autocomplete="tel"
                                                        class="form-control form-control-sm bg-light fs-6 @error('clinicTel') is-invalid @enderror">
                                                    @error('clinicTel')
                                                        <small class="text-danger">&#x2022; {{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <label for="clinic_tel_two"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-clinic-tel') }}</label>
                                                <div class="col-md-9">
                                                    <input type="tel" id="clinic_tel_two"
                                                        value="{{ old('clinicTelTwo') }}" name="clinicTelTwo"
                                                        placeholder="+2001123549745" autocomplete="tel"
                                                        class="form-control form-control-sm bg-light fs-6 @error('clinicTelTwo') is-invalid @enderror">
                                                    @error('clinicTelTwo')
                                                        <small class="text-danger">&#x2022; {{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="row my-2">
                                                <label for="booking_price"
                                                    class="col-md-3 col-form-label">{{ __('services/services.register-services-booking-price') }}({{ __('services/services.register-services-egp') }})*</label>

                                                <div class="col-md-9">
                                                    <input type="number" id="booking_price" required step="0.01"
                                                        min="0.00" name="bookingPrice" required placeholder="250"
                                                        value="{{ old('bookingPrice') }}"
                                                        @class(['form-control form-control-sm bg-light fs-6'])>
                                                    @error('bookingPrice')
                                                        <small class="text-danger">
                                                            &#x2022; {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="input-group mt-2">
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="term" name="term" required>
                                                        <label class="form-check-label"
                                                            for="term">{{ __('website/web.register-terms') }}
                                                            <a href="#">
                                                                {{ __('website/web.register-terms-condations') }}
                                                            </a>
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('term')
                                                    <small class="text-danger">
                                                        &#x2022; {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>

                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Right Box -->
        </div>
    </section>
    <!-- End Login Container -->

    <script src="https://www.nobleui.com/laravel/template/demo1/js/app.js"></script>
    <script src="https://www.nobleui.com/laravel/template/demo1/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
    <script src="{{ asset('assets/js/services/wizard.js') }}"></script>
    <!-- Select 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('.city').change(function() {
                var cityId = $(this).val();

                var axiosUrl = "{{ route('services.axios.region', ':cityId') }}";
                axiosUrl = axiosUrl.replace(':cityId', cityId);

                axios.get(axiosUrl)
                    .then(function(response) {
                        var regionsHtml = response.data;

                        $('#region').html(regionsHtml);
                        $('.select2-afterLoad').select2();

                    })
                    .catch(function(error) {
                        console.error('Error fetching regions: ' + error);
                    });
            });
        });
    </script>
</body>

</html>
