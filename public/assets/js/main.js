$(function() {

    $('#languages a').on('click', function (e) {
        e.preventDefault();
        const lang_code = $(this).data('langcode');
        window.location = PATH + '/language/change?lang=' + lang_code;
    });

    $('#dropdown-menu').click(function () {
        $('.drop-menu').toggleClass(' active');
    });

    $('.menu-link').hover(function () {
        $(this).next('.sub-menu-list').toggleClass(' active');
    });

    $('.sub-menu-link').hover(function () {
        $(this).next('.sub-sub-menu-list').toggleClass(' active');
    });

    $('.sub-menu-list').hover(function () {
        $(this).toggleClass(' active');
    })

    $('.sub-sub-menu-list').hover(function () {
        $(this).toggleClass(' active');
    })


});