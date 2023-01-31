$(document).ready(function(){
    $('.offers__slider').slick({
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        fade: true,
        speed: 1000,
    });
    $('.recomend-list').slick({
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        centerMode: true,
        variableWidth: true,
        dots: true,
        arrows: true,
    });
    $('.reviews__banner_slider').slick({
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        fade: true,
        speed: 1000,
    });
})

$(window).on('load resize', function() {
    if ($(window).width() < 1165) {
        $('.related .good__items').slick({
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            centerMode: true,
            variableWidth: true,
            dots: true,
            autoplay: true,
        });
    } else {
      $(".related .good__items").slick("unslick");
    }

    if ($(window).width() < 768) {
        $('.gallery__thumbnails').slick({
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
        });
    } else {
      $(".gallery__thumbnails").slick("unslick");
    }
  })

