<section role="main" class="content-body">
    <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <h2><?php echo $actualH; ?></h2>
    </header>
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <div class="tabs">
                    <header class="card-header">
                        <h2 class="card-title">Amortizaciones</h2>
                    </header>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">                            
                                <select data-plugin-selectTwo class="form-control" id="selectObra" data-plugin-options='{ "minimumInputLength": 2, "placeholder": "Elegir Obra", "allowClear": true}'>                                
                                    <option></option>                                    
                                </select>
                            </div>
                            <div class="col-md-6"></div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-group">
                                    <button id="btnRegistrar" class="modal-with-form btn btn-default btn btn-info" href="#mdlnuevo">Agregar Amortización <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 text-right" id="datatableButtons">
                            </div>
                        </div>
                        </br>
                        <table class="table table-bordered table-striped mb-none" id="tablaObras" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Fecha Factura</th>
                                    <th>N° Factura</th>
                                    <th>Total Valorizacion</th>
                                    <th>Reajuste Formula Polinómica</th>
                                    <th>Adelanto Directo</th>
                                    <th>Adelanto Materiales</th>
                                    <th>Deduccion Reajuste Ad. Directo</th>
                                    <th>Deduccion Reajuste Ad. Materiales</th>
                                    <th>Total</th>
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
    <!--id="copy_course_modal" tabindex="-1" role="dialog" aria-labelledby="copycourse" aria-hidden="true"-->
    <div id="mdlnuevo" class="modal-block modal-block-primary mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Nueva Amortizacion</h2>
            </header>
            <form action="#" class="form-horizontal" id="frmObra" method="POST">
                <div class="card-body">                 
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="nombreCortoObra">Nombre Corto de la Obra</label>
                        <div class="col-md-12">
                            <input name="nombreCortoObra" id="nombreCortoObra" class="form-control text-uppercase" data-plugin-maxlength placeholder="OBRA" required disabled/>
                            <input type="hidden" id="idObra" name="idObra">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="selectClienteProv">Cliente Prov</label>
                        <div class="col-md-12">
                            <select data-plugin-selectTwo class="form-control" id="selectClienteProv" name="selectClienteProv" data-plugin-options='{ "minimumInputLength": 2, "placeholder": "Elegir Cliente", "allowClear": true}'>                                                            
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="selectDescripcion">Descripción</label>
                        <div class="col-md-12">
                            <select data-plugin-selectTwo class="form-control" id="selectDescripcion" name="selectDescripcion" data-plugin-options='{"placeholder": "Tipo de Amortización", "allowClear": true}'>
                                <option></option>
                                <option>Adelanto Directo</option>
                                <option>Adelanto Materiales</option>
                                <option>Valorización</option>                               
                            </select>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="txtFechaFactura">Fecha Factura</label>                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input id="txtFechaFactura" name="txtFechaFactura" type="text" data-plugin-datepicker class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtNroFactura">Nro Factura</label>                            
                            <input name="txtNroFactura" id="txtNroFactura" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000" required/>                            
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="txtTotalValor">Total Valorización</label>
                            <input name="txtTotalValor" id="txtTotalValor" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtReajusteForm">Reajuste Formula Polinómica</label>
                            <input name="txtReajusteForm" id="txtReajusteForm" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="txtadelantDir">Adelanto Directo</label>
                            <input name="txtadelantDir" id="txtadelantDir" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtAdelantoMat">Adelanto Materiales</label>
                            <input name="txtAdelantoMat" id="txtAdelantoMat" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="txtDeduccionAdDir">Deduccion Reajuste Ad. Directo</label>
                            <input name="txtDeduccionAdDir" id="txtDeduccionAdDir" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtDeduccionAdMat">Deduccion Reajuste Ad. Materiales</label>
                            <input name="txtDeduccionAdMat" id="txtDeduccionAdMat" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="txtTotal">Total</label>
                        <div class="col-md-6">
                            <input name="txtTotal" id="txtTotal" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Total" required/>                            
                        </div>
                    </div>
                    <br>
                    <!--------------------------->                    
                    <input type="hidden" name="txtIdEditar" id="txtIdEditar">                                    
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-info btn-primary mt-3 mb-3 btn btn-success">Guardar</button>
                            <button type="button" class="btn btn-default modal-dismiss red btn-outline">Cancelar</button>
                        </div>
                    </div>
                </footer>
            </form>
        </section>
    </div>     
</section>



<script>
    var datatable;
    var APP = function () {

        var plugins = function () {
        }

        var initDatatables = function (idObra) {
            $.LoadingOverlay("show");
            $('#tablaObras').dataTable().fnDestroy();
            datatable = $('#tablaObras').DataTable({
                "sAjaxSource": "./amortizaciones/Amortizacion_listaxObra?cboobra=" + idObra,
                "sServerMethod": "POST",
                "sAjaxDataProp": "",
                "scrollX": true,
                "aoColumns": [{"mData": "Descripcion"}, {"mData": "Fecha"}, {"mData": "Numero"}, {"mData": "ValorInicial"}, {"mData": "ReajusteFP"}, {"mData": "AdelantoDirecto"}, {"mData": "AdelantoMateriales"}, {"mData": "DeduccionRAD"}, {"mData": "DediccionRAM"}, {"mData": "MontoTotal"}, {"mData": null}],
                /*"aoColumnDefs": [
                 {
                 "aTargets": [5],
                 "mData": "download_link",
                 "mRender": function (data, type, full) {
                 return '<center><div class="btn-group">' +
                 '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acci&oacute;n <i class="fa fa-angle-down"></i></button>' +
                 '<ul class="dropdown-menu pull-left" role="menu">' +
                 '<li><a href="#" id="' + data.id + '" class="idEditar dropdown-item text-1"> <i class="fa fa-pencil"></i> Editar</a></li>' +
                 '<li><a href="#" id="' + data.id + '" estado="' + data.Estado + '" class="idEstado dropdown-item text-1"> <i class="fa fa-check"></i> Cambiar Estado</a>' +
                 '<li><a href="#" id="' + data.id + '" estado="' + data.Estado + '" class="idEliminar dropdown-item text-1"> <i class="fa fa-trash-o"></i> Eliminar</a></li>' +
                 '</ul></div></center>';
                 }
                 },
                 {
                 "aTargets": [4],
                 "mData": "download_link",
                 "mRender": function (data, type, full) {
                 if (data.Estado == 1) {
                 return '<center><span class="label label-sm label-info"> Activo </span></center>';
                 } else {
                 if (data.Estado == 2) {
                 return '<center><span class="label label-sm label-danger"> Inactivo </span></center>';
                 }
                 }
                 }
                 }
                 ],*/
                "order": [[1, "asc"]],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Filtrar resultados",
                },
                drawCallback: function (settings, json) {
                    //CargaInicial();
                    $.LoadingOverlay("hide");
                }

            });
            var botones = new $.fn.dataTable.Buttons(datatable, {
                buttons: [
                    {extend: "pdf", className: "btn btn-info", exportOptions: {columns: [0, 1, 2, 3]}}
                    , {extend: "excel", className: "btn btn-info", exportOptions: {columns: [0, 1, 2, 3]}}
                    , {extend: "print", className: "btn red btn-outline", text: "Imprimir", exportOptions: {columns: [0, 1, 2, 3]}}
                ],
            });
            botones.container().appendTo('#datatableButtons');
            $('div.dataTables_filter input').addClass('form-control input-sm');
        }

        var eventos = function () {
            registrarAJAX("#frmObra", "./Obras/Obra_registrar");
            $("#selectObra").change(function () {
                initDatatables($("#selectObra").val());
                $("#nombreCortoObra").val($("#selectObra option:selected").text());
                $("#idObra").val($("#selectObra").val());
                $("#btnRegistrar").removeAttr('disabled');
            });

            // EVENTO ABRE MODAL
            $("#btnRegistrar").on('click', function (e) {
                //            LISTA DATOS SELET2 CLIENTES
                listadoClientes = buscarxidAJAX('0', "../mantenedores/clieprovs/Clieprovs_lista");
                listaClientesHTML = "<option></option>";
                $.each(listadoClientes, function (index, datos) {
                    listaClientesHTML += "<option value='" + datos.id + "'>" + datos.Razon_Social + " - " + datos.ruc + "</option>";
                    $("#selectClienteProv").html(listaClientesHTML);
                });
                //            FIN LISTA DATOS SELET2 CLIENTES
            });
            // FIN EVENTO ABRE MODAL
        }

        var CargaInicial = function () {
            $("#btnRegistrar").attr('disabled', 'true');
            //            LISTA DATOS SELET2 OBRAS
            listadoObras = buscarxidAJAX('0', "../mantenedores/obras/Obras_lista");
            listaObrasHTML = "<option></option>";
            $.each(listadoObras, function (index, datos) {
                listaObrasHTML += "<option value='" + datos.id + "'>" + datos.NombreCorto + " - " + datos.Empresa + "</option>";
                $("#selectObra").html(listaObrasHTML);
            });
            //            FIN LISTA DATOS SELET2 OBRAS            
        };
        return {
            init: function () {
//                plugins();
                eventos();
                //initDatatables();
                CargaInicial();
            }
            ,
            recargaTabla: function () {
                //initDatatables();
                //CargaInicial();
            }
        };
    }();
</script>