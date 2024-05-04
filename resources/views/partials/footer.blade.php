<footer class="bg-dark pt-5 pb-4">
    <div class="constant text-center text-md-left">
        <div class="row text-center text-md-left">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Medix World</h5>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda possimus ex id accusantium quod.
                    Odit eaque similique temporibus asperiores sint deleniti, reiciendis cum magnam quasi nam alias,
                    voluptate ut numquam sequi veritatis explicabo officiis exercitationem perspiciatis. Dolore, a
                    labore quod consequuntur quasi, iure, beatae molestias magni odit culpa voluptatibus. Laboriosam sit
                    ad perspiciatis vel reiciendis voluptas exercitationem vitae quibusdam quisquam explicabo, nobis
                    nihil, distinctio repellendus? Veritatis enim laudantium ullam et.
                </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Production</h5>
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
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">test</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">test</a>
                </p>
            </div>
            
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">test2</h5>
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
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">test</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">test</a>
                </p>
            </div>
            
        </div>
    </div>
</footer>








<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<!-- OwlCarousel2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

@yield('scripts')
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            loop: true,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            }
        });
    });
</script>
</body>

</html>
