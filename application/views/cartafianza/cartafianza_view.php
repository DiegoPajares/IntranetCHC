<section role="main" class="content-body">
    <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <h2><?php echo $actualH; ?></h2>
    </header>
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <div class="tabs">
                    <header class="card-header">
                    </header>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"> 
                                <select data-plugin-selectTwo class="form-control" id="selectObra" data-plugin-options='{ "minimumInputLength": 2, "placeholder": "Elegir Obra", "allowClear": true}'>                                
                                    <option></option>                                    
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input name="valorObra" id="valorObra" class="form-control text-uppercase" required disabled/>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-group">
                                    <button id="btnRegistrar" class="modal-with-form btn btn-default btn btn-info" href="#mdlnuevo">Agregar Carta Fianza <i class="fa fa-plus"></i></button>
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
                                    <th>Fiel Cmpl</th>
                                    <th>N° CF</th>
                                    <th>Gasto</th>
                                    <th>Monto</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>                                    
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
                <h2 class="card-title">Nueva Carta Fianza</h2>
            </header>
            <form action="#" class="form-horizontal" id="frmAmortizacion" method="POST">
                <div class="card-body">                 
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="nombreCortoObra">Obra</label>
                            <input name="nombreCortoObra" id="nombreCortoObra" class="form-control text-uppercase" data-plugin-maxlength placeholder="OBRA" required disabled/>
                            <input type="hidden" id="idObra" name="idObra">
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="selectClienteProv">Cliente/Proveedor</label>
                            <select data-plugin-selectTwo class="form-control" id="selectClienteProv" name="selectClienteProv" data-plugin-options='{ "minimumInputLength": 2, "placeholder": "Elegir Cliente/Proveedor", "allowClear": true}'>                                                            
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group  col-md-4">
                            <label for="selectDoc">Documento</label>
                            <select data-plugin-selectTwo class="form-control" id="selectDoc" name="selectDoc" data-plugin-options='{ "placeholder": "Elegir Documento", "allowClear": true}'>                                                            
                                <option></option>
                            </select>
                            <input type="hidden" id="desc_doc" name="desc_doc">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtDescripcion">Descripcion</label>                            
                            <input name="txtDescripcion" id="txtDescripcion" class="form-control text-uppercase" data-plugin-maxlength maxlength="30" placeholder="Ejm: LOREM IPSUM" required/>                            
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtFechaFactura">Fecha Factura</label>                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <!--<input id="txtFechaFactura" name="txtFechaFactura" type="text" data-plugin-datepicker class="form-control">-->
                                <input id="txtFechaFactura" name="txtFechaFactura" type="text" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control">

                            </div>
                        </div>
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for="txtNroFactura">Nro Factura</label>                            
                        <input name="txtNroFactura" id="txtNroFactura" class="form-control text-uppercase" data-plugin-maxlength maxlength="25" placeholder="Ejm: FAC-0001-00000000999" required/>                            
                    </div>                     
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-4">
                            <label for="txtTotalValor">Total Valorización</label>
                            <input type="number" min="0" step="0.01" name="txtTotalValor" id="txtTotalValor" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtadelantDir"> Adelanto Directo</label>
                            <input type="number" min="0" step="0.01" name="txtadelantDir" id="txtadelantDir" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtAdelantoMat"> Adelanto Materiales</label>
                            <input type="number" min="0" step="0.01" name="txtAdelantoMat" id="txtAdelantoMat" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-4">
                            <label for="txtReajusteForm"> Reaj. Formula Polinómica</label>
                            <input type="number" min="0" step="0.01" name="txtReajusteForm" id="txtReajusteForm" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtDeduccionAdDir"> Deduc. Reaj. Ad. Directo</label>
                            <input type="number" min="0" step="0.01" name="txtDeduccionAdDir" id="txtDeduccionAdDir" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtDeduccionAdMat"> Deduc. Reaj. Ad. Materiales</label>
                            <input type="number" min="0" step="0.01" name="txtDeduccionAdMat" id="txtDeduccionAdMat" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                    </div>
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
                "sAjaxSource": "./cartafianza/CartaFianza_listaxidObra?idObra=" + idObra,
                "sServerMethod": "POST",
                "sAjaxDataProp": "",
                "scrollX": true,
                "aoColumns": [{"mData": "id"}, {"mData": "FielCumplimiento"}, {"mData": "numero"}, {"mData": "gastofinac"}, {"mData": "montorenov"}, {"mData": "fechaemisionini"}, {"mData": "fechavencren"}, {"mData": null}],
                "order": [[1, "asc"]],
                drawCallback: function (settings, json) {
                    eventos();
                    $.LoadingOverlay("hide");
                }
            });
            var botones = new $.fn.dataTable.Buttons(datatable, {
                buttons: [
                    {extend: "pdf", className: "btn btn-info", exportOptions: {columns: [0, 1, 2, 3, 4]}}
                    , {extend: "excel", className: "btn btn-info", exportOptions: {columns: [0, 1, 2, 3, 4]}}
                    , {extend: "print", className: "btn red btn-outline", text: "Imprimir", exportOptions: {columns: [0, 1, 2, 3, 4]}}
                ],
            });
            botones.container().appendTo('#datatableButtons');
            $('div.dataTables_filter input').addClass('form-control input-sm');
        }

        var eventos = function () {
            registrarAJAX("#frmAmortizacion", "./Amortizaciones/Amortizacion_registrar");
            $("#selectObra").change(function () {

                var ids = $("#selectObra").val();
                var a = buscarxidAJAX(ids, '../mantenedores/Obras/Obra_listaxID');
                monto = parseFloat(a[0].Monto_Inicial).toFixed(2);
                $("#valorObra").val(monto);

                initDatatables($("#selectObra").val());
                $("#nombreCortoObra").val($("#selectObra option:selected").text());
                $("#idObra").val($("#selectObra").val());
                $("#btnRegistrar").removeAttr('disabled');
            });

            $(".idEliminar").click(function () {
                eliminarAJAX(this.id, "./Amortizaciones/Amortizacion_Eliminar");
            });

            // EVENTO ABRE MODAL
            $("#btnRegistrar").on('click', function (e) {
                //$("#frmAmortizacion")[0].reset();
                //            LISTA DATOS SELET2 CLIENTES
                listadoClientes = buscarxidAJAX('0', "../mantenedores/clieprovs/Clieprovs_lista");
                listaClientesHTML = "<option></option>";
                $.each(listadoClientes, function (index, datos) {
                    listaClientesHTML += "<option value='" + datos.id + "'>" + datos.Razon_Social + " - " + datos.ruc + "</option>";
                    $("#selectClienteProv").html(listaClientesHTML);
                });
                //            FIN LISTA DATOS SELET2 CLIENTES
                //            LISTA DATOS SELECT2 DOCUMENTOS
                listado = buscarxidAJAX('0', "../mantenedores/documentos/Documentos_lista");
                listaHTML = "<option></option>";
                $.each(listado, function (index, datos) {
                    listaHTML += "<option value='" + datos.id + "'>" + datos.Descripcion + "</option>";
                    $("#selectDoc").html(listaHTML);
                });
                //            FIN LISTA DATOS SELET2 DOCUMENTOS
                $("#selectDoc").change(function () {
                    $("#desc_doc").val($("#selectDoc option:selected").text());
                    $("#btnRegistrar").removeAttr('disabled');
                });
            });
            // FIN EVENTO ABRE MODAL
        }

        var CargaInicial = function () {
            //            LISTA DATOS SELET2 OBRAS
            listadoObras = buscarxidAJAX('0', "./Mantenedores/obras/Obras_lista");
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
                CargaInicial();
            }
        };
    }();
</script>