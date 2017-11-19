
    function notificacion(tipo, mensaje) {
        if (tipo == 0) {
            toastr.error(mensaje, "ERROR");
        } else
        if (tipo == 1) {
            toastr.success(mensaje, "EXITO");
        } else
        if (tipo == 2) {
            toastr.warning(mensaje, "CUIDADO");
        } else
        if (tipo == 3) {
            toastr.info(mensaje, "INFO");
        }
    }

    function registrarAJAX(nombreFRM, AJAX_URL) {

        $(nombreFRM).on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: AJAX_URL,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function ()
                {
                    $.LoadingOverlay("show");
                },
                success: function (data)
                {
                    $.LoadingOverlay("hide");
                    notificacion(1, "Registro realizado con éxito.");
                    $(nombreFRM)[0].reset();
                    $(".modal").modal("hide");
                    datatable.ajax.reload();
                },
                error: function (e)
                {
                    $.LoadingOverlay("hide");
                    notificacion(0, "Hubo un error al realizar la acción solicitada.");
                    $(nombreFRM)[0].reset();
                    $(".modal").modal("hide");
                }
            });
        }));
    }

    function estadoAJAX(idAttr, AJAX_URL, estado) {

        $.ajax({
            url: AJAX_URL,
            type: 'GET',
            data: {
                id: idAttr,
                estado: estado
            },
            beforeSend: function () {
                $.LoadingOverlay("show");
            },
            success: function (data)
            {
                $.LoadingOverlay("hide");
                notificacion(1, "Acción realizada con éxito.");
                $(".modal").modal("hide");
                datatable.ajax.reload();
            },
            error: function (e)
            {
                $.LoadingOverlay("hide");
                notificacion(0, "Hubo un error al realizar la acción solicitada.");
                $(".modal").modal("hide");
            }
        });
    }

    function buscarxidAJAX(id, urlAJAX) {
        var resultado = [];
        $.ajax({
            url: urlAJAX,
            dataType: 'json',
            type: 'POST',
            async: false,
            data: {
                id: id
            },
            beforeSend: function () {
//                console.log("Procesando, espere por favor...");
            },
            success: function (response) {
                $(response).each(function (i, obj) {
                    resultado.push(obj);
                });
            },
            error: function (response) {
                resultado = "Error";

            }
        });
        return resultado;
    }
