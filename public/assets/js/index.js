$(document).ready(function () {
    let navbar_btn = $('#navbar-btn');
    let navbar_bool = false;
    navbar_btn.click(function () {
        if(navbar_bool == false) {
            $('#mobile_navbar').addClass('active');
            navbar_bool = true;
        } else {
            $('#mobile_navbar').removeClass('active');
            navbar_bool = false;
        }
    });
    let y = window.scrollY;
    if(y > 100) {
        $('.burgergod-navbar').addClass('active')
    } else {
        $('.burgergod-navbar').removeClass('active')
    }
    $(window).on('scroll', function () {
        y = window.scrollY;
        if(y > 100) {
            $('.burgergod-navbar').addClass('active')
        } else {
            $('.burgergod-navbar').removeClass('active')
        }
    });
});