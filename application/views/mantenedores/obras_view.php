<section role="main" class="content-body">
    <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <h2><?php echo $actualH; ?></h2>
    </header>
<div class="row">
    <div class="col-md-12">
        <section class="card">
            <div class="tabs">
                <header class="card-header">
                    <h2 class="card-title">Obras</h2>
                </header>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <a class="btn btn-primary" data-toggle="modal" id="btnRegistrar" href="#modalnuevo"> Nueva Obra <i class="fa fa-plus"></i> </a>                                
                            </div>
                        </div>
                    </div>
                        <table class="table table-bordered table-striped mb-none" id="datatableObras" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nombre Corto</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>Monto Inicial</th>
                                    <th>Opci&oacute;n</th>
                                </tr>
                            </thead>
                            <tbody id="listaObras">
                               
                            </tbody>
                        </table>


                    </div>
                    
                </div>
        </section>
    </div>
</div>
    <!-- end: page -->
    <!--******************* MODALS NUEVO ******************-->
    <a class="modal-with-form btn btn-default" href="#modalnuevo" id="modalnuevo" style="display: none;"></a>
    <div id="modalnuevo" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Nueva Obra</h2>
            </header>
            <div class="panel-body"> 
                 <form class="form-horizontal form-bordered" id="frmRegistrar" action="./Obras/obra_registrarAjax" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="textareaDefault">Nombre Corto de la Obra</label>
                                <div class="col-md-6">
                                    <input name="nombrecorto" id="nombrecorto" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: LOREMITSUM12345" required/>
                                    <p><code>Max. 15 letras</code></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nombre de la obra</label>
                                <div class="col-md-6">                                    
                                     <textarea class="form-control" rows="3" data-plugin-maxlength maxlength="400"  name="nombre" id="nombre" required></textarea>
                                    <p><code>M&aacute;ximo 400 caracteres.</code></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Empresa de la obra</label>
                                <div class="col-md-6">
                                    <input class="form-control text-uppercase" name="empresa" id="empresa" required>
                                </div>
                            </div>         
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Monto Inicial de la obra</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="montoinicial" name="montoinicial" required>
                                </div>
                            </div>         
                            <center>
                                <input type="submit" class="mb-xs mt-xs mr-xs btn btn-success" value = "Registrar Nuevo" />
                            </center>
                        </form>
            </div>
        </section>
    </div>
     
    <!--******************* MODALS EDITAR ******************-->
    <a class="modal-with-form btn btn-default" href="#mdlEditar" id="modalEditar" style="display: none;"></a>
    <div id="mdlEditar" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Editar Obra</h2>
            </header>
            <div class="panel-body"> 
                
                <form class="form-horizontal form-bordered" id="frmEditar" action="./Areas/area_registrarAjax" method="post" enctype="multipart/form-data">
                          
                    <div class="form-group">
                                <label class="col-md-3 control-label">Nombre Corto de la Obra</label>
                                <div class="col-md-6">
                                    <input name="edtnombrecorto" id="edtnombrecorto" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: LOREMITSUM12345" required/>
                                    <p>
                                        <code>Max. 15 letras</code>
                                    </p>
                                </div>
                            </div>
                                     
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nombre de la obra</label>
                                <div class="col-md-6">                                    
                                     <textarea class="form-control" rows="3" data-plugin-maxlength maxlength="400"  name="edtnombre" id="edtnombre" required></textarea>
                                    <p>
                                        <code>M&aacute;ximo 400 caracteres.</code>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Empresa de la obra</label>
                                <div class="col-md-6">
                                    <input class="form-control text-uppercase" name="edtempresa" id="edtempresa" required>
                                </div>
                            </div>         
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Monto Inicial de la obra</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="edtmontoinicial" name="edtmontoinicial" required>
                                </div>
                            </div>
                    
                            <input type="hidden" id="txtEdtIdobra" name="txtEdtIdobra">
                            <input type="hidden" id="txtEdtEstadoobra" name="txtEdtEstadoobra">
                            <br/>
                            <center>
                                <input type="submit" class="mb-xs mt-xs mr-xs btn btn-success" value = "Editar" />
                                <button class="btn btn-default btnEditarCancelar">Cancelar</button>
                            </center>
                        </form>
       </section>
    </div>
    
    <!--******************* MODALS ADVERTENCIA ESTADO ******************-->
    <a class="mb-xs mt-xs mr-xs modal-sizes btn btn-default" id="modalAdvertencia" href="#modalSM" style="display: none;"></a>
    <div id="modalSM" class="modal-block modal-block-sm mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Est&aacute; Seguro?</h2>
            </header>
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-icon">
                        <i class="fa fa-warning" style="color: #ed9c28;"></i>
                    </div>
                    <div class="modal-text">
                        <p>Est&aacute; seguro que desea realizar esta acci&oacute;n?</p>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary modalEstadoConfirmar">Confirmar</button>
                        <button class="btn btn-default modalEstadoCancelar">Cancelar</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    
</section>
</div>		
</section>


<script>
    var datatable;    
    var APP = function () {

    var initDatatables = function () {

            $.LoadingOverlay("show");
            datatable = $('#datatableObras').DataTable({
                "sAjaxSource": "./Mantenedores/Obras/listaObras",
                "sServerMethod": "POST",
                "sAjaxDataProp": "",
                "aoColumns": [{"mData": "NombreCorto"}, {"mData": null}, {"mData": null}, {"mData": null}, {"mData": null}, {"mData": null}],
                
                dom: 'Blfrtip',
                buttons: [
                    {extend: "print", className: "btn dark btn-outline", text: "Imprimir", exportOptions: {columns: [0, 1, 2, 3, 4, 5]}}, {extend: "copy", className: "btn red btn-outline", text: "Copiar", exportOptions: {columns: ':visible'}}, {extend: "pdf", className: "btn green btn-outline", exportOptions: {columns: [0, 1, 2, 3, 4, 5]}}, {extend: "excel", className: "btn yellow btn-outline ", exportOptions: {columns: [0, 1, 2, 3, 4, 5]}}, {extend: "colvis", className: "btn purple btn-outline", text: "Columnas"}
                ],
                drawCallback: function (settings, json) {
                    $.LoadingOverlay("hide");
                    CargaInicial();
                }
            });
        }

        var eventos = function () {
            registrarAJAX("#frmRegistrar", "./Mantenedores/Obras/obra_registrarAjax");
        }

        var CargaInicial = function () {
            //Sets
            $("#btnRegistrar").click(function(){
                $("#frmRegistrar")[0].reset();
                //$("#txtIdEditar").val(null);
            });
            /*
            $(".idEditar").click(function () {
                $("#btnRegistrar").click();
                var a = buscarxidAJAX(this.id, './Trabajador/trabajador_lista_xid');
                $("#txtIdEditar").val(a[0].id);
                $("#txtDni").val(a[0].dni);
                $("#txtNombres").val(a[0].nombres);
                $("#txtApepat").val(a[0].apellido_p);
                $("#txtApemat").val(a[0].apellido_m);
                $("#txtTelf").val(a[0].telefono);
                
                var frmtFecha = new Date(a[0].fecha_nacimiento);
                frmtFecha = (frmtFecha.getDate() + 1) + "/" + (frmtFecha.getMonth() + 1) + "/" + frmtFecha.getFullYear();
                $("#txtFechaNac").datepicker("setDate", frmtFecha);
                if (a[0].es_jefe == "1") {
                    $("#chkJefe").prop("checked", true);
                } else if (a[0].es_jefe == "0") {
                    $("#chkJefe").prop("checked", false);
                }
                if (a[0].es_soltero == "1") {
                    $("#chkSoltero").prop("checked", true);
                } else if (a[0].es_jefe == "0") {
                    $("#chkSoltero").prop("checked", false);
                }
                if (a[0].genero == "M") {
                    $("#chkGenero").prop("checked", true);
                } else if (a[0].es_jefe == "F") {
                    $("#chkGenero").prop("checked", false);
                }
            });

            $(".idEstado").click(function () {
                //estadoAJAX(id, urlAjax, setEstado)
                if ($(this).attr("estado") == 1) {
                    estadoAJAX(this.id, "./Trabajador/trabajador_cambiarEstado", 0);
                } else
                if ($(this).attr("estado") == 0) {
                    estadoAJAX(this.id, "./Trabajador/trabajador_cambiarEstado", 1);
                }
            });

            $(".idEliminar").click(function () {
                estadoAJAX(this.id, "./Trabajador/trabajador_cambiarEstado", 2);
            });*/
        };

        return {
            init: function () {
                eventos();
                initDatatables();
                CargaInicial();
            },
            recargaTabla: function () {
                initDatatables();
                CargaInicial();
            }
        };
    }();
    </script>

   
    
</body>