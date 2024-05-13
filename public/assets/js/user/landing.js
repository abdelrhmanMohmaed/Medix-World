$(document).ready(function () {
    // Start To switch a class css in navbar visible and hidden
    const navEl = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY >= 680) {
            navEl.classList.add('navbar-scrolled');
            navEl.classList.remove('visible');
        } else {
            navEl.classList.remove('navbar-scrolled');
            navEl.classList.add('visible');
        }
    });
    // End To switch a class css in navbar visible and hidden
    // Start check the dir page to use in sider show condation
    var isRTL = $('html').attr('dir') === 'rtl';
    $(".owl-carousel").owlCarousel({
        rtl: isRTL,
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
    // End check the dir page to use in sider show condation
});