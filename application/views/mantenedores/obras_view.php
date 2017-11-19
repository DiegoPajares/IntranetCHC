<section role="main" class="content-body">
    <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <h2><?php echo $actualH; ?></h2>
    </header>
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <div class="tabs">
                    <header class="card-header">
                        <h2 class="card-title">Proyectos/Obras</h2>
                    </header>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-group">
                                    <a id="btnRegistrar" class="modal-with-form btn btn-default" href="#mdlnuevo">Nueva Obra <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6" id="datatableButtons">
                            </div>
                        </div>
                        </br>
                        <table class="table table-bordered table-striped mb-none" id="tablaObras" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nombre Corto</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>Monto Inicial</th>
                                    <th>Estado</th>
                                    <th>Opci&oacute;n</th>
                                </tr>
                            </thead>
                            <tbody >

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
    <!--******************* MODALS NUEVO ******************-->   
 <div id="mdlnuevo" class="modal-block modal-block-primary mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Nueva Obra</h2>
            </header>
            <div class="card-body"> 
               <form action="#" class="form-horizontal" id="frmObra" method="POST">
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="textareaDefault">Nombre Corto de la Obra</label>
                                <div class="col-md-6">
                                    <input name="nombrecorto" id="nombrecorto" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: LOREMITSUM12345" required/>
                                    <p><code>Max. 15 dígitos</code></p>
                                </div>
                    </div>   
                    <div class="form-group">
                        <label class="col-md-6 control-label" >Monto Inicial de la obra</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="montoinicial" name="montoinicial" required>
                                </div>
                    </div>
                   <div class="form-group">
                        <label class="col-md-12 control-label" >Empresa de la obra</label>
                        <div class="col-md-12">
                            <input class="form-control text-uppercase" name="empresa" id="empresa" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Nombre de la obra</label>
                        <div class="col-md-12">                                    
                            <textarea class="form-control" rows="4" data-plugin-maxlength maxlength="400"  name="nombre" id="nombre" required></textarea>
                            <p><code>M&aacute;ximo 400 caracteres.</code></p>
                        </div>
                    </div>
                            <input type="hidden" name="txtIdEditar" id="txtIdEditar">
                            <input type="hidden" name="txtIdCreador" id="txtIdCreador" value="<?php echo $this->session->userdata('id') ?>">     
                    <!--<center>
                        <input type="submit" class="mb-xs mt-xs mr-xs btn btn-success" value = "Registrar Nuevo" />
                    </center>-->
                    <footer class="card-footer">
			<div class="row">
			    <div class="col-md-12 text-right">
				<button type="submit" class="btn green btn-primary modal-confirm">Guardar</button>
				<button type="button" class="btn btn-default modal-dismiss">Cancelar</button>
                            </div>
			</div>
                    </footer>
                </form>

            </div>
        </section>
    </div>     
</section>



<script>
    var datatable;
    var APP = function () {

        var plugins = function () {
        }

        var initDatatables = function () {
            $.LoadingOverlay("show");
            datatable = $('#tablaObras').DataTable({
                "sAjaxSource": "./Obras/Obras_lista",
                "sServerMethod": "POST",
                "sAjaxDataProp": "",
                "aoColumns": [{"mData": "NombreCorto"}, {"mData": "Nombre"}, {"mData": "Empresa"}, {"mData": "Monto_Inicial"}, {"mData": null}, {"mData": null}],
                "aoColumnDefs": [
                    {
                        "aTargets": [5],
                        "mData": "download_link",
                        "mRender": function (data, type, full) {
                            return '<center><div class="btn-group">' +
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acci&oacute;n <i class="fa fa-angle-down"></i></button>' +
                                    '<ul class="dropdown-menu pull-left" role="menu">' +
                                    //<a class="modal-with-form btn btn-default"
                                    '<li><a href="#" id="' + data.id + '" class="idEditar"><i class="icon-pencil"></i> Editar </a></li>' +
                                    '<li><a href="#" id="' + data.id + '" estado="' + data.estado + '" class="idEstado"><i class="icon-check"></i> Cambiar Estado </a>' +
                                    '<li><a href="#" id="' + data.id + '" estado="' + data.estado + '" class="idEliminar"><i class="icon-trash"></i> Eliminar </a></li>' +
                                    '</ul></div></center>';
                        }
                    },
                    {
                        "aTargets": [4],
                        "mData": "download_link",
                        "mRender": function (data, type, full) {
                            if (data.estado == 1) {
                                return '<center><span class="label label-sm label-info"> Activo </span></center>';
                            } else {
                                return '<center><span class="label label-sm label-danger"> Inactivo </span></center>';
                            }
                        }
                    }
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Filtrar resultados",
                },
//                dom: 'Blfrtip',
//                buttons: [
//                    {extend: "print", className: "btn dark btn-outline", text: "Imprimir", exportOptions: {columns: [0, 1, 2, 3]}}, {extend: "copy", className: "btn red btn-outline", text: "Copiar", exportOptions: {columns: ':visible'}}, {extend: "pdf", className: "btn green btn-outline", exportOptions: {columns: [0, 1, 2, 3]}}, {extend: "excel", className: "btn yellow btn-outline ", exportOptions: {columns: [0, 1, 2, 3]}}
//                ],
                drawCallback: function (settings, json) {
                    CargaInicial();
                    $.LoadingOverlay("hide");
                }

            });

            var botones = new $.fn.dataTable.Buttons(datatable, {
                buttons: [
                    {extend: "pdf", className: "btn btn-info", exportOptions: {columns: [0, 1, 2, 3]}}
                    , {extend: "excel", className: "btn btn-info", exportOptions: {columns: [0, 1, 2, 3]}}
                    , {extend: "print", className: "btn dark btn-outline", text: "Imprimir", exportOptions: {columns: [0, 1, 2, 3]}}
                    //, {extend: "copy", className: "btn red btn-outline", text: "Copiar", exportOptions: {columns: ':visible'}}
                ],
            });
            botones.container().appendTo('#datatableButtons');
            $('div.dataTables_filter input').addClass('form-control input-sm');
        }

        var eventos = function () {
            //registrarAJAX("#frmObra", "./Obras/obra_registrar");
        }

        var CargaInicial = function () {
       /*
        $("#btnRegistrar").click(function () {
                $("#frmObra")[0].reset();
               $("#txtIdEditar").val(null);
            });

 */
        /*
            $(".idEditar").click(function () {
                $("#btnRegistrar").click();
                var a = buscarxidAJAX(this.id, './Obras/getObra_x_ID');
                $("#txtIdEditar").val(a[0].id);
                $("#nombrecorto").val(a[0].NombreCorto);
                $("#montoinicial").val(a[0].Monto_Inicial);
                $("#empresa").val(a[0].empresa);
                $("#nombre").val(a[0].nombre);
            });

            $(".idEstado").click(function () {
                //estadoAJAX(id, urlAjax, setEstado)
                if ($(this).attr("estado") == 1) {
                    estadoAJAX(this.id, "./Obras/actualizaEstadoObra", 0);
                } else
                if ($(this).attr("estado") == 0) {
                    estadoAJAX(this.id, "./Obras/actualizaEstadoObra", 1);
                }
            });

            $(".idEliminar").click(function () {
                estadoAJAX(this.id, "./Consumidores/consumidor_cambiarEstado", 2);
            });
    */    
    };

        return {
            init: function () {
//                plugins();
//                eventos();
                initDatatables();
//                CargaInicial();
            }
           /* ,
            recargaTabla: function () {
                initDatatables();
                CargaInicial();
            }
            */
        };
    }();
</script>
