<!-- Start footer Section -->
<footer class="text-white pt-3 pb-2" style="background-color: #0070CD">
    <div class="container text-md-left">
        <div class="row text-md-left">
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Medix World</h5>
                <p>
                    <a href="{{ route('website.about.index') }}" class="text-white">
                        {{ __('website/web.footer-about-us') }}
                    </a>
                </p>
                <p>
                    <a href="{{ route('website.welcome') }}#contact-us" class="text-white">
                        {{ __('website/web.footer-contactUs') }}
                    </a>
                </p>
                <p>
                    <a href="{{ route('website.terms.index') }}" class="text-white">
                        {{ __('website/web.terms-of-use') }}
                    </a>
                </p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold ">{{ __('website/web.footer-service-provider') }}</h5>
                <p><a href="{{ route('services.register') }}"
                        class="text-white">{{ __('website/web.footer-sign-up') }}</a></p>
                <p><a href="{{ route('website.register') }}"
                        class="text-white">{{ __('website/web.footer-user-sign-up') }}</a></p>
            </div>

            <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold ">{{ __('website/web.footer-contactUs') }}</h5>
                <p>
                    <i class="fas fa-home mr-3"></i> &nbsp; {{ __('website/web.footer-address') }}
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> &nbsp; <a class="text-white"
                        href="mailto:medix@world.com">medix@world.com</a>
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
    <hr class="mb-2">

    <div class="container text-md-left">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
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

    <!-- Start arrow back-home -->
    <a href="#" class="back-home">
        <i class="fa fa-chevron-up"></i>
    </a>
    <!-- End arrow back-home -->
</footer>
<!-- End footer Section -->

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- Select 2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
<!-- typedJs -->
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<!-- toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- To select to the current area -->
@if (@$city != 'allCities')
    <script>
        $(document).ready(function() {

            var cityId = '{{ @$city }}';
            var areaId = '{{ @$area }}';
            if (cityId != 'allCities') {
                var axiosUrl = "{{ route('website.axios.region', ':cityId') }}";
                axiosUrl = axiosUrl.replace(':cityId', cityId);
                axios.get(axiosUrl)

                    .then(function(response) {

                        var regionsHtml = response.data;
                        $('.region').html(regionsHtml);

                        if (areaId) {
                            $('.region option').each(function() {
                                if ($(this).val() == areaId) {
                                    $(this).attr('selected', 'selected');
                                }
                            });
                        }
                    })
                    .catch(function(error) {
                        console.error('Error fetching areas: ' + error);
                    });
            }
        });
    </script>
@endif
<script>
    $(document).ready(function() {
        // Select 2
        $('.select2').select2();
        // Select 2
        // Start Back Home 
        window.addEventListener('scroll', function() {
            if (window.scrollY > 0) {
                $(".back-home").fadeIn(350);
            } else {
                $(".back-home").fadeOut(350);
            }
        })
        // End Back Home 
        // get a areas with axios request
        $('.city').change(function() {
            var cityId = $(this).val();

            if (cityId != 'allCities') {
                var axiosUrl = "{{ route('website.axios.region', ':cityId') }}";
                axiosUrl = axiosUrl.replace(':cityId', cityId);

                axios.get(axiosUrl)
                    .then(function(response) {
                        var regionsHtml = response.data;

                        $('.region').html(regionsHtml);
                    })
                    .catch(function(error) {
                        console.error('Error fetching areas: ' + error);
                    });
            }
        });
        // get a areas with axios request
    });
</script>
@yield('scripts')

@include('web.partials.partials.toastr')
</body>

</html>
