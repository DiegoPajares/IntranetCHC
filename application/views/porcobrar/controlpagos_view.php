<section role="main" class="content-body">
    <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <h2><?php echo $actualH; ?></h2>
    </header>
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <div class="tabs">
                    <header class="card-header">
                        <h2 class="card-title">Control de Pagos</h2>
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
                                </div>
                            </div>
                            <div class="col-md-6 text-right" id="datatableButtons">
                            </div>
                        </div>
                        </br>
                        <table class="table table-bordered table-striped mb-none" id="tablaObras" style="width: 100%; text-align:center; align:center;  " >
                            <thead>
                                <tr>
                                    <th COLSPAN="5">FACTURA</th>
                                    <th COLSPAN="2">CANCELACION</th>
                                    <th COLSPAN="2">RESUMEN</th>
                                    <th rowspan="2" >Detracci&oacute;n</th>
                                </tr>
                                <tr>
                                    <th>Numero</th>
                                    <th>Concepto</th>
                                    <th>Monto</th>
                                    <th>Deducción</th>
                                    <th>Emisión</th>
                                    
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    
                                    <th>Saldo</th>
                                    <th>Acumulado</th>
                                     
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
                    <footer class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-info btn-primary mt-3 mb-3 btn btn-success">Guardar</button>
                                <button type="button" class="btn btn-default modal-dismiss red btn-outline">Cancelar</button>
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
    $acumulado=0.0;
    $result=0.0;
    var APP = function () {

        var plugins = function () {
        }

        var initDatatables = function (idObra) {
            $.LoadingOverlay("show");
            $('#tablaObras').dataTable().fnDestroy();
            datatable = $('#tablaObras').DataTable({
                "sAjaxSource": "./porCobrar/PorCobrarAmortizacion_listaxObra?cboobra=" + idObra,
                "sServerMethod": "POST",
                "sAjaxDataProp": "",
                "scrollX": true,
                "aoColumns": [{"mData": "Numero"}, {"mData": "Descripcion"}, {"mData": "MontoTotal"}, {"mData": null}, {"mData": "Fecha"}, {"mData":null}, {"mData": "fechaCan"}, {"mData": "saldoResum"}, {"mData": null}, {"mData": "Detraccion"}],
                "aoColumnDefs": [
                 {
                    "aTargets": [8],
                    "mData": "download_link",
                    "mRender": function (data, type, full) {
                         
                        $acumulado = parseFloat(data.MontoCan) + parseFloat($acumulado) ;  
                      return '' +$acumulado+ '';
                    }
                 },
                 {
                    "aTargets": [3],
                    "mData": "download_link",
                    "mRender": function (data, type, full) {
                        $acumulado= parseFloat(data.MontoTotal) + parseFloat($acumulado) ;
                        $result = parseFloat(data.monto_Obra) - parseFloat($acumulado) ;  
                      return '' +$result+ '';
                    }
                 },
                 {
                 "aTargets": [5],
                 "mData": "download_link",
                 "mRender": function (data, type, full) {
                 return '<a href="#" id="' + data.id + '" class="idPagar dropdown-item text-1"> <i class="fa fa-check"></i> ' + data.MontoCan + '</a>' ;
                 }
                 }
                 ],
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
                "order": [[ 4, "asc" ]],
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
                var ids = $("#selectObra").val();
                var a = buscarxidAJAX( ids  , '../mantenedores/Obras/Obra_listaxID');
                monto = parseFloat(a[0].Monto_Inicial).toFixed(2);
                $("#valorObra").val(monto);
                initDatatables($("#selectObra").val());
            });
        }

        var CargaInicial = function () {
            $(".idPagar").click(function () {
                $("#btnRegistrar").click();
                var a = buscarxidAJAX(this.id, './PorCobrar/PorCobrar_listaxAmortizacion');
                $("#txtIdEditar").val(a[0].id);
                $("#nombrecorto").val(a[0].NombreCorto);
                $("#montoinicial").val(a[0].Monto_Inicial);
                $("#empresa").val(a[0].Empresa);
                $("#nombre").val(a[0].Nombre);
            });
            
            //            LISTA DATOS SELET2
            listadoObras = buscarxidAJAX('0', "../mantenedores/obras/Obras_lista");
            listaObrasHTML = "<option></option>";
            $.each(listadoObras, function (index, datos) {
                listaObrasHTML += "<option value='" + datos.id + "'>" + datos.NombreCorto + " - " + datos.Empresa + "</option>";
                $("#selectObra").html(listaObrasHTML);
            });
            //            FIN LISTA DATOS SELET2
            
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