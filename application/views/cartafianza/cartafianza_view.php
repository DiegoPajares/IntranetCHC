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
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-group">
                                    <button id="btnRegistrar" class="modal-with-form btn btn-default btn btn-info" disabled href="#mdlnuevo">Agregar Carta Fianza <i class="fa fa-plus"></i></button>
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
            <form action="#" class="form-horizontal" id="frmCartaFianza" method="POST">
                <div class="card-body">                 
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="nombreCortoObra">Obra</label>
                            <input name="nombreCortoObra" id="nombreCortoObra" class="form-control text-uppercase" data-plugin-maxlength placeholder="OBRA" required disabled/>
                            <input type="hidden" id="idObra" name="idObra">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txtFielCumplimiento">Fiel Cumplimiento</label>                            
                            <input name="txtFielCumplimiento" id="txtFielCumplimiento" class="form-control text-uppercase" data-plugin-maxlength maxlength="100" placeholder="Ejm: FAC-0001-00000000999" required/>                            
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txtNroCarta">Nro Cara Fianza</label>                            
                            <input name="txtNroCarta" id="txtNroCarta" class="form-control text-uppercase" data-plugin-maxlength maxlength="25" placeholder="Ejm: FAC-0001-00000000999" required/>                            
                        </div>                    
                        <div class="form-group col-md-6">
                            <label for="txtFechaIni">Fecha Inicio</label>                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <!--<input id="txtFechaFactura" name="txtFechaFactura" type="text" data-plugin-datepicker class="form-control">-->
                                <input id="txtFechaIni" name="txtFechaIni" type="text" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtFechaFin">Fecha Fin</label>                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <!--<input id="txtFechaFactura" name="txtFechaFactura" type="text" data-plugin-datepicker class="form-control">-->
                                <input id="txtFechaFin" name="txtFechaFin" type="text" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control">

                            </div>
                        </div>
                    </div>                                        
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="txtGastoFinanciero">Gasto Financiero</label>
                            <input type="number" min="0" step="0.01" name="txtGastoFinanciero" id="txtGastoFinanciero" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtRenovacion">Monto Renovación</label>
                            <input type="number" min="0" step="0.01" name="txtRenovacion" id="txtRenovacion" class="form-control text-uppercase" data-plugin-maxlength maxlength="15" placeholder="Ejm: 0000.00" required/>
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
                "sAjaxSource": "./CartaFianza/CartaFianza_listaxidObra?idObra=" + idObra,
                "sServerMethod": "POST",
                "sAjaxDataProp": "",
                "scrollX": true,
                "aoColumns": [{"mData": "id"}, {"mData": "FielCumplimiento"}, {"mData": "numero"}, {"mData": "gastofinac"}, {"mData": "montorenov"}, {"mData": "fechaemisionini"}, {"mData": "fechavencren"}, {"mData": null}],
                "order": [[0, "desc"]],
                drawCallback: function (settings, json) {
                    eventos();
                    $.LoadingOverlay("hide");
                }
            });
            var botones = new $.fn.dataTable.Buttons(datatable, {
                buttons: [
                    {extend: "pdf", className: "btn btn-info", exportOptions: {columns: [1, 2, 3, 4, 5, 6]}}
                    , {extend: "excel", className: "btn btn-info", exportOptions: {columns: [1, 2, 3, 4, 5, 6]}}
                    , {extend: "print", className: "btn red btn-outline", text: "Imprimir", exportOptions: {columns: [1, 2, 3, 4, 5, 6]}}
                ],
            });
            botones.container().appendTo('#datatableButtons');
            $('div.dataTables_filter input').addClass('form-control input-sm');
        }

        var eventos = function () {
            registrarAJAX("#frmCartaFianza", "./CartaFianza/CartaFianza_registrar");
            $("#selectObra").change(function () {

                var ids = $("#selectObra").val();
//                var a = buscarxidAJAX(ids, '../Mantenedores/Obras/Obra_listaxID');
//                monto = parseFloat(a[0].Monto_Inicial).toFixed(2);
//                $("#valorObra").val(monto);

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
                $("#selectDoc").change(function () {
                    $("#desc_doc").val($("#selectDoc option:selected").text());
                    $("#btnRegistrar").removeAttr('disabled');
                });
            });
            // FIN EVENTO ABRE MODAL
        }

        var CargaInicial = function () {
            //            LISTA DATOS SELET2 OBRAS
            listadoObras = buscarxidAJAX('0', "./Mantenedores/Obras/Obras_lista");
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
        };
    }();
</script>