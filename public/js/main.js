$(document).ready(function () {

    // Показать пароль
    $('.password-checkbox-in').click(function () {
        if ($(this).is(':checked')) {
            $('#password-in').attr('type', 'text');
            $('.show-in').addClass('open').removeClass('lock');

        } else {
            $('#password-in').attr('type', 'password');
            $('.show-in').addClass('lock').removeClass('open');
        }
    });

    $('.password-checkbox-one').click(function () {
        if ($(this).is(':checked')) {
            $('#password-one').attr('type', 'text');
            $('.show-one').addClass('open').removeClass('lock');

        } else {
            $('#password-one').attr('type', 'password');
            $('.show-one').addClass('lock').removeClass('open');
        }
    });

    $('.password-checkbox-two').click(function () {
        if ($(this).is(':checked')) {
            $('#confrim-password').attr('type', 'text');
            $('.show-two').addClass('open').removeClass('lock');

        } else {
            $('#confrim-password').attr('type', 'password');
            $('.show-two').addClass('lock').removeClass('open');
        }
    });

    $('.feedback').click(function () {
        $('.feedback').attr('disabled')
    });

    // Меню бургер
    $('.burger__button').click(function (e) {
        e.preventDefault();
        $('.burger').toggleClass('burger__active')
        $('.main__menu, .cat__menu').toggleClass('menu__active')
    });

    // Кнопка наверх

    $(window).scroll(function () {
        if ($(window).scrollTop() > 20) {
            $('.btn-top').fadeIn();
        } else {
            $('.btn-top').fadeOut();
        }
    });

    $('.btn-top').click(function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 700);
    });

    // Подтвердить удаление
    $('.btn-danger').click(function () {
        return confirm('Confirm your action');
    });

    // Убрать алерт
    let fade_out = function() {
        $('.fade-out').fadeOut().empty();
    }
    setTimeout(fade_out, 3000);

    // Слайдер на главной
    $('.slider-main').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        responsive:
            [
                {
                    breakpoint: 1150,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ]

    });



    // Слайдер в карточке товара
    $('.slider-product-card').slick({
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
    });

});
