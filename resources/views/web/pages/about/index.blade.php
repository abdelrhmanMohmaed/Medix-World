@extends('web.layouts._app')


@section('main')
    <!-- Start Contact us Section -->
<section id="contact-us" class="contact-us-section" style="margin-top: 60px">
    <div class="container py-5">
        <h2 class="text-center">{{ __('website/web.contact-us') }}</h2>
        <p class="text-center">{{ __('website/web.contact-sub-title') }}</p>
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
            <div class="col-md-12">

                <form method="post" action="{{ route('website.contact.store') }}">
                    @csrf
                    <div class="mb-1">
                        <label for="full_name" class="form-label">{{ __('website/web.full-name') }}</label>
                        <input type="name" name="fullName" value="{{ old('fullName') }}"
                            @class(['form-control', 'is-invalid' => $errors->has('fullName')]) id="full_name">
                        @error('fullName')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="email" class="form-label">{{ __('website/web.email-address') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" @class(['form-control', 'is-invalid' => $errors->has('email')])
                            id="email">
                        @error('email')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="subject" class="form-label">{{ __('website/web.subject') }}</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" @class(['form-control', 'is-invalid' => $errors->has('subject')])
                            id="subject">
                        @error('subject')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label">{{ __('website/web.message') }}</label>
                        <textarea name="message" id="message" cols="30" rows="10" @class(['form-control', 'is-invalid' => $errors->has('message')])>
                                        {{ old('message') }}
                            </textarea>
                        @error('message')
                            <small class="text-danger">
                                &#x2022; {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn form-control text-white"
                        style="background-color: rgb(239, 15, 15)">
                        {{ __('website/web.send-now') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Contact us Section -->
@endsection