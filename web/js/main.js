jQuery(document).ready(function($) {
    /*
     * Добавление товара в корзину с использованием AJAX
     */
    $('.add-to-basket').on('submit', function (event) {
        var action = $(this).attr('action');
        var method = $(this).attr('method');
        if (method == undefined) {
            method = 'get';
        }
        var data = $(this).serialize();
        $.ajax({
            url: action,
            type: method,
            data: data,
            dataType: 'html',
            success: function (response) {
                $('#basket-modal .modal-body').html(response);
                $('#basket-modal').modal();
                if ($('#basket-modal .modal-footer .btn-warning').is(':hidden')) {
                    $('#basket-modal .modal-footer .btn-warning').show();
                }
            },
            error: function () {
                alert('Произошла ошибка при добавлении товара в корзину');
            }
        });
        event.preventDefault();
    });
    $('#basket-modal .modal-body').on('click', 'table a.text-danger', function (event) {
        var href = $(this).attr('href');
        $('#basket-modal .modal-body').load(href, function () {
            if ( ! $('#basket-modal .modal-body table').length) {
                $('#basket-modal .modal-footer .btn-warning').hide();
            }
        });

        event.preventDefault();
    });
    $('#basket-content').on('click', 'table a.text-danger', function (event) {
        var href = $(this).attr('href');
        $('#basket-content').load(href, function () {
            if ( ! $(this).find('table').length) {
                $('#basket-content').next('.btn-warning').hide();
            }
        });
        event.preventDefault();
    });

    $('#basket-modal .modal-body').on('click', 'p a.text-danger', function (event) {
        var href = $(this).attr('href');
        $('#basket-modal .modal-body').load(href);
        $('#basket-modal .modal-footer .btn-warning').hide();
        event.preventDefault();
    });

    $('#basket-content').on('click', 'p a.text-danger', function (event) {
        var href = $(this).attr('href');
        $('#basket-content').load(href);
        // корзина пуста, скрываем кнопку «Оформить заказ»
        $('#basket-content').next('.btn-warning').hide();
        event.preventDefault();
    });

    $('#basket-modal').on('submit', 'form', function (event) {
        var action = $(this).attr('action');
        var method = $(this).attr('method');
        if (method == undefined) {
            method = 'get';
        }
        var data = $(this).serialize();
        $.ajax({
            url: action,
            type: method,
            data: data,
            dataType: 'html',
            success: function (response) {
                $('#basket-modal .modal-body').html(response);
                if ( ! $('#basket-modal .modal-body table').length) {
                    $('#basket-modal .modal-footer .btn-warning').hide();
                }
            },
            error: function () {
                alert('Произошла ошибка при обновлении корзины');
            }
        });
        event.preventDefault();
    })

    $('#basket-content').on('submit', 'form', function (event) {
        var action = $(this).attr('action');
        var method = $(this).attr('method');
        if (method == undefined) {
            method = 'get';
        }
        var data = $(this).serialize();
        $.ajax({
            url: action,
            type: method,
            data: data,
            dataType: 'html',
            success: function (response) {
                $('#basket-content').html(response);

                if ( ! $('#basket-content table').length) {
                    $('#basket-content').next('.btn-warning').hide();
                }
            },
            error: function () {
                alert('Произошла ошибка при обновлении корзины');
            }
        });
        event.preventDefault();
    });
});