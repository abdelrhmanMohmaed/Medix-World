@extends('web.layouts._app')

@section('title', __('website/web.register'))

@section('styles')
    <!-- Register -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/register.css') }}">
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">
@endsection

@section('main')
    <!-- register Container -->
    <section id="register" class="container d-flex justify-content-center align-items-center min-vh-100 pt-3 pb-5">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!-- Right Box -->
            <div class="col-md-12 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-center">
                        <h1 class="h3">{{ __('website/web.register-hello') }}</h1>
                        <p class="text-black-50">{{ __('website/web.register-happy') }}</p>
                    </div>

                    <form method="POST" action="{{ route('website.register') }}">
                        @csrf
                        <label for="FullName">{{ __('website/web.full-name') }}*</label>
                        <div class="input-group my-2">
                            <input type="text" required id="FullName" name="fullName" autofocus autocomplete="name"
                                value="{{ old('fullName') }}" placeholder="{{ __('website/web.full-name') }}"
                                @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('fullName'),
                                ])>
                        </div>
                        @error('fullName')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                            <br>
                        @enderror

                        <label for="tel">{{ __('website/web.register-tel') }}*</label>
                        <div class="input-group my-2">
                            <input type="tel" id="tel" name="tel" required autofocus autocomplete="tel"
                                value="{{ old('tel') }}" placeholder="+201123843996" @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('tel'),
                                ])>
                        </div>
                        @error('tel')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                            <br>
                        @enderror

                        <label for="tel">{{ __('website/web.register-tel') }}</label>
                        <div class="input-group my-2">
                            <input type="tel" id="tel" name="telTwo" autofocus autocomplete="tel"
                                value="{{ old('telTwo') }}" placeholder="+201123843996" @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('telTwo'),
                                ])>
                        </div>
                        @error('telTwo')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                            <br>
                        @enderror

                        <label for="email">{{ __('website/web.email-address') }}*</label>
                        <div class="input-group my-2">
                            <input type="email" id="email" required name="email" autofocus autocomplete="username"
                                value="{{ old('email') }}" @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('email'),
                                ]) placeholder="example@domin.com">
                        </div>
                        @error('email')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                            <br>
                        @enderror

                        <label for="date_of_birth">{{ __('website/web.register-date') }}*</label>
                        <div class="input-group my-2">
                            <input type="date" id="date_of_birth" required name="dateOfBirth" autofocus
                                autocomplete="bday-day" value="{{ old('dateOfBirth') }}" @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('dateOfBirth'),
                                ])>
                        </div>
                        @error('dateOfBirth')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                            <br>
                        @enderror

                        <label for="gender">{{ __('website/web.register-gender') }}*</label>
                        <div class="my-2">
                            <select name="gender" required @class([
                                'form-control form-control-lg bg-light fs-6',
                                'is-invalid' => $errors->has('gender'),
                            ]) aria-label="gender">
                                <option selected disabled>{{ __('website/web.register-menu') }}</option>
                                <option value="1" @selected(old('gender') == 1)>
                                    {{ __('website/web.register-male') }}
                                </option>
                                <option value="2" @selected(old('gender') == 2)>
                                    {{ __('website/web.register-female') }}
                                </option>
                            </select>
                        </div>
                        @error('gender')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                            <br>
                        @enderror


                        <label for="password">{{ __('website/web.register-password') }}</label>
                        <div class="input-group my-2">
                            <input type="password" id="password" name="password" autocomplete="new-password" required
                                @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('password'),
                                ])>
                        </div>
                        @error('password')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                            <br>
                        @enderror

                        <label for="password_confirmation">{{ __('website/web.register-confirm-password') }}</label>
                        <div class="input-group my-2">
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                autocomplete="new-password" @class([
                                    'form-control form-control-lg bg-light fs-6',
                                    'is-invalid' => $errors->has('password_confirmation'),
                                ])>
                        </div>
                        @error('password_confirmation')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                            <br>
                        @enderror

                        <div class="input-group mt-2">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="term" name="term" required>
                                <label class="form-check-label" for="term">{{ __('website/web.register-terms') }}
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

                        <div class="input-group my-2">
                            <button style="background-color: rgb(239, 15, 15);" type="submit"
                                class="btn btn-lg w-100 fs-6 text-white">
                                {{ __('website/web.register') }}
                            </button>
                        </div>
                    </form>
                    {{-- <div class="input-group my-2">
                        <button class="btn btn-lg btn-light w-100 fs-6">
                            <img src="{{ asset('assets/images/user/login/google.png') }}" style="width:20px"
                                class="me-2"><small>Sign In with Google</small>
                        </button>
                    </div> --}}
                    <div class="row">
                        <small>{{ __('website/web.register-already-registered') }}
                            <a href="{{ route('website.login') }}">
                                {{ __('website/web.login') }}
                            </a>
                        </small>
                    </div>
                </div>
            </div>
            <!-- End Right Box -->
        </div>
    </section>
    <!-- End register Container -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user/OAuth.js') }}"></script>
@endsection
