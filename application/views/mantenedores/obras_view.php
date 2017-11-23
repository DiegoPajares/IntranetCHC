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
                            <div class="col-sm-6">
                                <div class="btn-group">
                                    <a id="btnRegistrar" class="modal-with-form btn btn-default btn btn-info" href="#mdlnuevo">Nueva Obra <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6 text-right" id="datatableButtons">
                            </div>
                        </div>
                        </br>
                        <table class="table table-bordered table-striped mb-none" id="tablaObras" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre Corto</th>
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
    <!--id="copy_course_modal" tabindex="-1" role="dialog" aria-labelledby="copycourse" aria-hidden="true"-->
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
                            <!--<input class="form-control text-uppercase" name="empresa" id="empresa" required>-->                            
                            <select data-plugin-selectTwo class="form-control" id="selectEmpresa" data-plugin-options='{ "minimumInputLength": 2, "placeholder": "Elegir empresa", "allowClear": true, "noResults": "poiqwe"}'>                                
                                <option></option>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option><option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>                            
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
    var APP = function () {

        var plugins = function () {
        }

        var initDatatables = function () {
            $.LoadingOverlay("show");
            datatable = $('#tablaObras').DataTable({
                "sAjaxSource": "./Obras/Obras_lista",
                "sServerMethod": "POST",
                "sAjaxDataProp": "",
                "aoColumns": [{"mData": "id"}, {"mData": "NombreCorto"}, {"mData": "Empresa"}, {"mData": "Monto_Inicial"}, {"mData": null}, {"mData": null}],
                "aoColumnDefs": [
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
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Filtrar resultados",
                },
                drawCallback: function (settings, json) {
                    CargaInicial();
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
        }

        var CargaInicial = function () {

            $("#btnRegistrar").click(function () {
                $("#frmObra")[0].reset();
                $("#txtIdEditar").val(null);
            });

            $(".idEditar").click(function () {
                $("#btnRegistrar").click();
                var a = buscarxidAJAX(this.id, './Obras/Obra_listaxID');
                $("#txtIdEditar").val(a[0].id);
                $("#nombrecorto").val(a[0].NombreCorto);
                $("#montoinicial").val(a[0].Monto_Inicial);
                $("#empresa").val(a[0].Empresa);
                $("#nombre").val(a[0].Nombre);
            });

            $(".idEstado").click(function () {
                if ($(this).attr("estado") == 1) {
                    estadoAJAX(this.id, "./Obras/Obra_actualizaEstado", 2);
                } else
                if ($(this).attr("estado") == 2) {
                    estadoAJAX(this.id, "./Obras/Obra_actualizaEstado", 1);
                }
            });

            $(".idEliminar").click(function () {
                estadoAJAX(this.id, "./Obras/Obra_actualizaEstado", 0);
            });

        };

        return {
            init: function () {
//                plugins();
                eventos();
                initDatatables();
                CargaInicial();
            }
            ,
            recargaTabla: function () {
                initDatatables();
                CargaInicial();
            }
        };
    }();
</script>
