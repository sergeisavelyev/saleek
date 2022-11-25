$(function() {

    $('#languages a').on('click', function (e) {
        e.preventDefault();
        const lang_code = $(this).data('langcode');
        window.location = PATH + '/language/change?lang=' + lang_code;
    });

});