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
            url: 'cart/add',
            method: 'GET',
            data: {id: id},
            datatype: 'html',
            success: function (data) {
                showCart(data);
            }, 
            error: function () {
                alert('Error!');
            }
        });
    });

    $('#cart-show').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'cart/show',
            method: 'GET',
            success: function (data) {
                showCart(data);
            },
            error: function () {
                alert('Error!');
            }
        });
    });
    
    $('#cart-modal .modal-cart-content').on('click', '.delete-from-cart', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $.ajax({
            url: 'cart/delete',
            method: 'GET',
            data: {id: id},
            datatype: 'html',
            success: function (data) {
                showCart(data);
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    
    $('#cart-modal .modal-cart-content').on('click', '#clear-cart', function () {
        $.ajax({
            url: 'cart/clear',
            method: 'GET',
            datatype: 'html',
            success: function (data) {
                showCart(data);
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    // Sort

    $('#input-sort').change(function () {
        const value = $(this).val();
        window.location = PATH + window.location.pathname + '?' + value;
    })
});