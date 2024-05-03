$(document).ready(function() {
    // Start To switch a class css in navbar visible and hidden
    const navEl = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY >= 280) {
            navEl.classList.add('navbar-scrolled');
            navEl.classList.remove('visible');
        } else {
            navEl.classList.remove('navbar-scrolled');
            navEl.classList.add('visible');
        }
    });
    // End To switch a class css in navbar visible and hidden
});