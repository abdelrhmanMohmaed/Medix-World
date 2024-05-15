<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand me-auto" href="#">Medix World Logo</a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Medix World Logo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">

                        <a class="nav-link mx-lg-2" aria-current="page" href="{{ route('website.welcome') }}">
                            {{ __('website/web.home') }}
                        </a>
                    </li>
                    @if (auth()->guard('web')->check())
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2"
                                href="{{ route('website.profile.index') }}">{{ __('website/web.profile') }}</a>
                        </li>
                    @endif

                    @if (auth()->guard('service_provider')->check())
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="{{ route('services.dashboard.index') }}">
                                {{ __('website/web.profile') }}
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="{{ route('services.register') }}">
                                {{ __('website/web.Join') }}
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link mx-lg-2"
                            href="{{ route('website.welcome') }}#contact-us">{{ __('website/web.contact-us') }}</a>
                    </li>

                    @if (app()->getLocale() == 'en')
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2"
                                href="{{ LaravelLocalization::getLocalizedURL('ar') }}">عربي</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2"
                                href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>

        @if (auth()->guard('web')->check())
            <a class="login-button" href="{{ route('website.logout') }}">
                {{ __('website/web.logout') }}
            </a>
        @elseif (auth()->guard('service_provider')->check())
            <a class="login-button" href="{{ route('services.logout') }}">
                {{ __('website/web.logout') }}
            </a>
        @else
            <a class="login-button" href="{{ route('website.login') }}">{{ __('website/web.login') }}</a>
            <a class="signUp-button" href="{{ route('website.register') }}">
                {{ __('website/web.sign-up') }}
            </a>
        @endif
    </div>

    <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<!-- Navbar Section -->
