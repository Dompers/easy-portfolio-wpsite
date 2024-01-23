import 'slick-carousel/slick/slick.min'

window.jQuery = window.$ = jQuery;

if ( $('.banner .banner-item').length > 1 ) {
    $(document).ready(function () {
        $('.banner').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
        });
    });
}
