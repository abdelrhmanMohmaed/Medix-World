<!-- Start footer Section -->
<footer class="text-white pt-5 pb-4" style="background-color: #5459CE">
    <div class="container-fluid text-md-left">
        <div class="row text-md-left">
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Medix World</h5>
                <p>
                    <a href="{{ route('website.about.index') }}" class="text-white" style="text-decoration: none;">
                        {{ __('website/web.footer-about-us') }}
                    </a>
                </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold ">Production</h5>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">test</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">test</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">test</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">test</a>
                </p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold ">{{ __('website/web.footer-service-provider') }}
                </h5>
                <p>
                    <a href="{{ route('services.login') }}" class="text-white" style="text-decoration: none;">
                        {{ __('website/web.footer-sign-up') }}
                    </a>
                </p>
            </div>

            <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold ">{{ __('website/web.footer-contactUs') }}</h5>
                <p>
                    <i class="fas fa-home mr-3"></i> &nbsp; {{ __('website/web.footer-address') }}
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> &nbsp; medix-wold@hotmail.com
                </p>
                <p>
                    <i class="fas fa-phone mr-3"></i> &nbsp; +20123456878
                </p>
                <p>
                    <i class="fas fa-print mr-3"></i> &nbsp; +20123456878
                </p>
            </div>
        </div>
    </div>
    <hr class="mb-4">

    <div class="container text-md-left">
        <div class="row align-items-center ">
            <div class="col-md-7 col-lg-8 ">
                <p>
                    {{ __('website/web.footer-copyright') }}
                    <a href="#" style="text-decoration: none">
                        <strong class="text-dark">
                            {{ __('website/web.footer-owners') }} </strong>
                    </a>
                </p>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px">
                                <i class="fab fa-google-plus"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End footer Section -->

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Fonts Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
    integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<!-- OwlCarousel2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Navbar -->
<script src="{{ asset('assets/js/user/navbar.js') }}"></script>


@yield('scripts')
</body>

</html>
