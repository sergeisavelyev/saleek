$(function() {

    $('#languages a').on('click', function (e) {
        e.preventDefault();
        const lang_code = $(this).data('langcode');
        window.location = PATH + '/language/change?lang=' + lang_code;
    });

    // Menu

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

    // Cart

    function showCart(cart) {
        $('#cart-modal .modal-cart-content').html(cart);
        const myModalEl = document.querySelector('#cart-modal');
        const modal = bootstrap.Modal.getOrCreateInstance(myModalEl);
        modal.show();
    }

    $('#add-to-cart').click(function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        $.ajax({
            url: "cart/add",
            method: "GET",
            data: {id: id},
            datatype: "html",
            success: function (data) {
                // $('#cart-info').html(data);
                showCart(data);
            }, 
            error: function () {
                alert('Error!');
            }
        })
    });

    //
});