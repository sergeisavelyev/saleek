$(function() {

    function showMessage(status, text) {
        const noty = new Noty({
            theme: 'bootstrap-v4',
            progressBar: false,
            type: status,
            timeout: 500,
            layout: 'topCenter',
            text: text,
        }).show();
    }

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
                const url = window.location.toString();
                if(url.indexOf('cart/view') !== -1) {
                    window.location = url;
                } else {
                    showCart(data);
                }
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

    $('#to-checkout').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'cart/checkout',
            method: 'POST',
            data: new FormData(this),
			processData: false,
			contentType: false,
            success: function(result) {
                const info = JSON.parse(result);
                showMessage(info.status, info.message);
            },
            error: function () {
                showMessage('error', 'Error');
            }
        });
    });

    // Sort

    $('#input-sort').change(function () {
        const value = $(this).val();
        window.location = PATH + window.location.pathname + '?' + value;
    })

    // Search

    $('#livesearch').keyup(function () {
        const search = $(this).val();
        if (search == '') {
            $('#drop-livesearch').removeClass('active');
        } else {
            $.ajax({
                url: 'search/livesearch',
                method: 'POST',
                data: {search: search},
                datatype: 'html',
                success: function (data) {
                    $('#search-result').html(data);
                    $('#drop-livesearch').addClass(' active');
                }
            });
        }
    });

    $('#drop-livesearch').on('click', '#search', function () {
        const search = $('#livesearch').val();
        window.location = PATH + window.location.pathname + '?search=' + search;
    });


    // Wishlist

    $('.product-sidebar').on('click', '#add-to-wishlist', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'wishlist/add',
            method: 'GET',
            data: {id: id},
            success: function (result) {
                info = JSON.parse(result);
                showMessage(info.status, info.message);
                $('#add-to-wishlist').html(info.newText);
                $('#add-to-wishlist').removeAttr('id').attr('id', 'delete-from-wishlist');
            },
            error: function () {
                showMessage('error', 'Error');
            }
        });
    });

    $('.product-sidebar').on('click', '#delete-from-wishlist', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'wishlist/delete',
            method: 'GET',
            data: {id: id},
            success: function (result) {
                info = JSON.parse(result);
                showMessage('success', info.message);
                $('#delete-from-wishlist').html(info.newText);
                $('#delete-from-wishlist').removeAttr('id').attr('id', 'add-to-wishlist');
            },
            error: function () {
                showMessage('error', 'Error');
            }
        });
    });

    // Auth

    $('#signup').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'user/signup',
            type: 'POST',
            data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
            success: function (result) {
                const info = JSON.parse(result);
                showMessage(info.status, info.message);
                if (info.status == 'success') {
                    $('#signup')[0].reset();
                }
            },
            error: function () {
                showMessage('error', 'Error');
            }
        });
    });

    $('#login').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'user/login',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                const info = JSON.parse(result);
                showMessage(info.status, info.message);
                if (info.status == 'success') {
                    setTimeout(() => window.location = PATH + window.location.pathname, 750);
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });

});