
<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    @include('web.partials.partials.error')
    <!-- Profile Tab -->
    <h4 class="mb-5">
        <i class="icon fa-solid fa-user-shield "></i>
        {{ __('website/web.profile-data') }}</h4>

    <section class="w-100">
        <form action="{{ route('website.profile.update', Auth::id()) }}" method="POST">
            @csrf
            @method('patch')
            <!-- names -->
            <div class="row my-2">
                <label for="name"
                    class="col-md-3 col-form-label">{{ __('services/services.register-services-full-name') }}*</label>

                <div class="col-md-9">
                    <input type="text" class="form-control  form-control-sm" name="fullName" required autofocus
                        autocomplete="name" id="name" value="{{ Auth::user()->name }}"
                        placeholder="{{ __('services/services.register-services-full-name') }}"
                        @class(['form-control form-control-sm bg-light fs-6'])>
                    @error('fullName')
                        <small class="text-danger">
                            &#x2022; {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <!-- phone -->
            <div class="row my-2">
                <label for="tel"
                    class="col-md-3 col-form-label">{{ __('services/services.register-services-tel') }}*</label>

                <div class="col-md-9">
                    <input type="tel" name="tel" id="tel" autocomplete="tel" required
                        value="{{ @Auth::user()->personalPhones->first()->tel }}" placeholder="+201523853693"
                        @class(['form-control form-control-sm bg-light fs-6'])>
                    @error('tel')
                        <small class="text-danger">
                            &#x2022; {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>

            <div class="row my-2">
                <label for="telTwo"
                    class="col-md-3 col-form-label">{{ __('services/services.register-services-tel') }}*</label>

                <div class="col-md-9">
                    <input type="telTwo" name="telTwo" id="telTwo" autocomplete="tel"
                        value="{{ @Auth::user()->personalPhones()->orderBy('id', 'DESC')->first()->tel }}"
                        placeholder="+201523853693" @class(['form-control form-control-sm bg-light fs-6'])>
                    @error('telTwo')
                        <small class="text-danger">
                            &#x2022; {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <!-- phone -->

            <!-- Gender BirthDay -->
            <div class="row my-2">
                <label for="male_radio"
                    class="col-md-3 col-form-label">{{ __('services/services.register-services-gender') }}*</label>

                <div class="col-md-3 mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" required id="male_radio"
                            value="1" @checked(Auth::user()->gender == 1)>
                        <label class="form-check-label"
                            for="male_radio">{{ __('services/services.register-services-male') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" required id="female_radio"
                            value="2" @checked(Auth::user()->gender == 2)>

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
                    <input type="date" class="form-control form-control-sm" name="dateOfBirth" required
                        id="date_of_birth" value="{{ Auth::user()->dateOfBirth }}" @class(['form-control bg-light fs-6'])>
                    @error('dateOfBirth')
                        <small class="text-danger">
                            &#x2022; {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <!-- Gender BirthDay -->

            <!-- Email Password -->
            <div class="row my-2">
                <label for="email"
                    class="col-md-3 col-form-label">{{ __('services/services.register-services-email-address') }}*</label>

                <div class="col-md-9">
                    <input type="email" class="form-control  form-control-sm" name="email" id="email" required
                        autofocus value="{{ Auth::user()->email }}" autocomplete="email"
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
                    <input type="password" id="password" name="password" autocomplete="new-password"
                        placeholder="{{ __('website/web.register-password') }}" @class(['form-control form-control-sm bg-light fs-6'])>
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
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="{{ __('website/web.register-confirm-password') }}" autocomplete="new-password"
                        @class(['form-control form-control-sm bg-light fs-6'])>
                    @error('password_confirmation')
                        <small class="text-danger">
                            &#x2022; {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-9">
                    <button class="btn btn-primary" type="submit">{{ __('dashboard.submit') }}</button>
                </div>
            </div>
            <!-- Email Password -->
        </form>
    </section>
</div>
