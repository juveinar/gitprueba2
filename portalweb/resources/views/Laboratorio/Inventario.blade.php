@extends('PageMaster')
@section('content')
    <style>
        .dataTables_filter {
            float: left !important;
        }
        .footerMenuMobile .nasloviFootera[aria-expanded="true"] .fa {
            transform: rotate(-90deg);
        }

        .container {
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            font-size: 15px;
            font-weight: normal;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
    </style>

    <div style="margin-top:-25px; display: flex; justify-content:left; align-items: flex-end;">

        <h2><i class="fa fa-line-chart"></i> Reporte Inventario</h2>
    </div>

    <div class="box-body" style="margin-top: -20px">
        <div class="col-lg-12 box box-primary">
            <div class="">
                <div class="col-lg-12">

                    <div class="col-lg-12 footerMenuMobile text-left" STYLE="margin-top: 10px">
                        <a class="nasloviFootera" data-toggle="collapse" href="#ver" aria-expanded="false">
                            FILTROS <i id="btn" class="fa fa-arrow-circle-left pull-right" style="font-size: 30px; color: #0b97c4"></i>
                        </a>
                        <hr>
                    </div>

                </div>

                <div id="ver" class="collapse" style="height: 0px;">
                    <div class="col-lg-12" style="margin-top: 10px">

                        <div class="col-lg-6">
                            <label for="" class="control-label">{{ __('Fecha Inicio ') }}<i class="glyphicon glyphicon-calendar"></i></label>
                            <input type="date" name="Fechainial" id="Fechainial" class="labelform" required="required">

                        </div>

                        <div class="col-lg-6">
                            <label for="" class="control-label">{{ __('Fecha Fin ') }}<i class="glyphicon glyphicon-calendar"></i></label>
                            <input type="date" name="FechaFin" id="FechaFin" class="labelform" required="required">
                        </div>

                    </div>

                    <div class="col-lg-12" style="margin-top: -10px">
                        <hr>
                    </div>
                    <div class="col-lg-12">

                        <div class="col-lg-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Tipo Reporte</div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <label class="container">Lectura Entradas
                                            <input type="radio" id="radioentrada" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="container">Lectura Salidas
                                            <input type="radio" id="radiosalida" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="container">Ajustes
                                            <input type="radio" id="radioajuste" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="container">Entradas y Salidas
                                            <input type="radio" id="radioentradasalida" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="container">Entradas y Ajustes
                                            <input type="radio" id="radioentradaajuste" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="container">Salida y Ajustes
                                            <input type="radio" id="radiosalidaajuste" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="container">Entrada Salida y Ajustes
                                            <input type="radio" id="radioentradasalidaajuste" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="display: flex; justify-content:center; align-items: center;">
                                    CAMPOS DISPONIBLES
                                </div>
                                <div class="panel-body" style="display: none" id="diventrada">
                                    <div class="col-lg-3">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="custom-switch-input" name="lectEntrada" id="CodigovariEntrada"> Codigo Var
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="VariedadEntr"> Variedad
                                            </label>

                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="GeneroEntr"> Genero
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="BarcodeEntr"> Codigo Barras
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="IdentificadorEntr"> Identificador
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="BreederEntr"> Breeder
                                            </label>

                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="FaseActualEntr"> Fase Actual
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="ContenedorEntr"> Contenedor
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="FechaEntradaEntr"> Fe Entrada
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="SemanaEntradaEntr"> Se Entrada
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="UbicacionActEntr"> Ubicacion
                                            </label>

                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="CantidadEntr"> Cantidad
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="PatinadorEntr"> Patinador
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="OperarioEntr"> Operario
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="RadicadoEntr"> Radicado
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectEntrada" class="custom-switch-input" id="ClienteEntr"> Cliente
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-top: 10px">
                                        <div class="col-lg-5"></div>
                                        <div class="col-lg-2">
                                            <label class="checkbox-inline">
                                                <h3><input type="checkbox" id="TodosEntrada">Todos</h3>
                                            </label>
                                        </div>
                                        <div class="col-lg-5"></div>
                                    </div>

                                    <div style="margin-top: 100px">
                                        <form id="Fechas" method="POST" action="{{ route('ReporteEntradaLab') }}">
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                            <button id="btnEntradas" type="submit" class="btn btn-primary btn-lg btn-block">Cargar</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="panel-body" style="display: none" id="divsalidad">

                                    <div class="col-lg-3">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="custom-switch-input" name="lectSalida" id="CodigovariSalida"> Codigo Var
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="VariedadSalida"> Variedad
                                            </label>

                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="GeneroSalida"> Genero
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="BarcodeSalida"> Codigo Barras
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="IdentificadorSalida"> Identificador
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="BreederrSalida"> Breeder
                                            </label>

                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="FaseActualrSalida"> Fase Actual
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="ContenedorSalida"> Contenedor
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="FechaSalida"> Fe Salida
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="SemanaSalida"> Se Salida
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="CantidadSalida"> Cantidad
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="PatinadorSalida"> Patinador
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="OperarioSalida"> Operario
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="TipoSalida"> Tipo Salida
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="lectSalida" class="custom-switch-input" id="TipoCancelado"> Tipo Cancelacion
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-top: 10px">
                                        <div class="col-lg-5"></div>
                                        <div class="col-lg-2">
                                            <label class="checkbox-inline">
                                                <h3><input type="checkbox" id="TodosSalida">Todos</h3>
                                            </label>
                                        </div>
                                        <div class="col-lg-5"></div>
                                    </div>

                                    <div style="margin-top: 100px">
                                        <form id="ReporteSalidas" method="POST" action="{{ route('ReporteSalidaLab') }}">
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                            <button id="btnSalidas" type="submit" class="btn btn-primary btn-lg btn-block">Cargar</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="panel-body" style="display: none" id="divajuste">
                                    <h1>ajuste</h1>
                                </div>

                                <div class="panel-body" style="display: none" id="diventradasalida">
                                    <h1>entrada salida</h1>
                                </div>

                                <div class="panel-body" style="display: none" id="diventradaajuste">
                                    <h1>entrada ajuste</h1>
                                </div>

                                <div class="panel-body" style="display: none" id="divsalidaajuste">
                                    <h1>salida ajuste</h1>
                                </div>

                                <div class="panel-body" style="display: none" id="diventradasalidaajuste">
                                    <h1>los tres</h1>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box-body" style="margin-top: -38px; display: none" id="tablaReporteEntrada">
        <div class="box box-body table-responsive">
            <table id="TableReportEntrada" class="display nowrap col-md-12 col-lg-12 col-xl-12 cell-border" style="width:100%;">
                <thead>
                <tr>
                    <th>Codigo Variedad</th>
                    <th>Variedad</th>
                    <th>Genero</th>
                    <th>Codigo Barras</th>
                    <th>Identificador</th>
                    <th>Breeder</th>
                    <th>Fase</th>
                    <th>Contenedor</th>
                    <th>Fecha Ingreso</th>
                    <th>Semana Ingreso</th>
                    <th>Ubicacion Actual</th>
                    <th>Can PLantas</th>
                    <th>Patinador</th>
                    <th>Operario</th>
                    <th>Estado</th>
                    {{-- <th>Radicado</th>
                     <th>Cliente</th>--}}
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="box-body" style="margin-top: -38px; display: none" id="tablaReporteSalida">
        <div class="box box-body table-responsive">
            <table id="TablaReporteSalidas" class="display nowrap col-md-12 col-lg-12 col-xl-12 cell-border"  style="width:100%">
                <thead>
                <tr>
                    <th>Codigo Variedad</th>
                    <th>Variedad</th>
                    <th>Genero</th>
                    <th>Codigo Barras</th>
                    <th>Identificador</th>
                    <th>Breeder</th>
                    <th>Fase</th>
                    <th>Contenedor</th>
                    <th>Fecha Salida</th>
                    <th>Semana Salida</th>
                    <th>Can PLantas</th>
                    <th>Tipo Salida</th>
                    <th>Patinador</th>
                    <th>Operario</th>
                    <th>Causal Salida</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>

    <div class="box-body" style="margin-top: -38px; display: none" id="tablaReporteAjuste">
        <div class="box box-body">
            <div class="table" style="margin-top: 10px;">

                {{-- <table class="" id="TableLoadInventory" style="width:100%">
                     <thead>
                     <tr>
                         <th class="text-center">item</th>
                         <th class="text-center">Codigo Variedad</th>
                         <th class="text-center">Genero</th>
                         <th class="text-center">Variedad</th>
                         <th class="text-center">Identificacion</th>
                         <th class="text-center">Breeder</th>
                         <th class="text-center">Fase Actual</th>
                         <th class="text-center">Semana Ult Movi</th>
                         <th class="text-center">Semana Ingreso</th>
                         <th class="text-center">Ubicacion</th>
                         <th class="text-center">Cantidad</th>
                     </tr>
                     </thead>
                 </table>--}}
            </div>
        </div>
    </div>

    <div class="box-body" style="margin-top: -38px; display: none" id="tablaReporteEntradaSalida">
        <div class="box box-body">
            <div class="table" style="margin-top: 10px;">

                <table class="" id="TableLoadInventory" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-center">item</th>
                        <th class="text-center">Codigo Variedad</th>
                        <th class="text-center">Genero</th>
                        <th class="text-center">Variedad</th>
                        <th class="text-center">Identificacion</th>
                        <th class="text-center">Breeder</th>
                        <th class="text-center">Fase Actual</th>
                        <th class="text-center">Semana Ult Movi</th>
                        <th class="text-center">Semana Ingreso</th>
                        <th class="text-center">Ubicacion</th>
                        <th class="text-center">Cantidad</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="box-body" style="margin-top: -38px; display: none" id="tablaReporteEntradaAjuste">
        <div class="box box-body">
            <div class="table" style="margin-top: 10px;">

                <table class="" id="TableLoadInventory" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-center">item</th>
                        <th class="text-center">Codigo Variedad</th>
                        <th class="text-center">Genero</th>
                        <th class="text-center">Variedad</th>
                        <th class="text-center">Identificacion</th>
                        <th class="text-center">Breeder</th>
                        <th class="text-center">Fase Actual</th>
                        <th class="text-center">Semana Ult Movi</th>
                        <th class="text-center">Semana Ingreso</th>
                        <th class="text-center">Ubicacion</th>
                        <th class="text-center">Cantidad</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="box-body" style="margin-top: -38px; display: none" id="tablaReporteSalidaAjuste">
        <div class="box box-body">
            <div class="table" style="margin-top: 10px;">

                <table class="" id="TableLoadInventory" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-center">item</th>
                        <th class="text-center">Codigo Variedad</th>
                        <th class="text-center">Genero</th>
                        <th class="text-center">Variedad</th>
                        <th class="text-center">Identificacion</th>
                        <th class="text-center">Breeder</th>
                        <th class="text-center">Fase Actual</th>
                        <th class="text-center">Semana Ult Movi</th>
                        <th class="text-center">Semana Ingreso</th>
                        <th class="text-center">Ubicacion</th>
                        <th class="text-center">Cantidad</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="box-body" style="margin-top: -38px; display: none" id="tablaReporteEntradaSalidaAjuste">
        <div class="box box-body">
            <div class="table" style="margin-top: 10px;">

                <table class="" id="TableLoadInventory" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-center">item</th>
                        <th class="text-center">Codigo Variedad</th>
                        <th class="text-center">Genero</th>
                        <th class="text-center">Variedad</th>
                        <th class="text-center">Identificacion</th>
                        <th class="text-center">Breeder</th>
                        <th class="text-center">Fase Actual</th>
                        <th class="text-center">Semana Ult Movi</th>
                        <th class="text-center">Semana Ingreso</th>
                        <th class="text-center">Ubicacion</th>
                        <th class="text-center">Cantidad</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{ csrf_token() }}" name="token" id="token">

    <script>

        $(function () {
            $("#radioentrada").click(function () {
                if ($(this).is(":checked")) {
                    $("#diventrada").show();
                    $("#divsalidad").hide();
                    $("#divajuste").hide();
                    $("#diventradasalida").hide();
                    $("#diventradaajuste").hide();
                    $("#divsalidaajuste").hide();
                    $("#diventradasalidaajuste").hide();
                }
            });
            $("#radiosalida").click(function () {
                if ($(this).is(":checked")) {
                    $("#diventrada").hide();
                    $("#divsalidad").show();
                    $("#divajuste").hide();
                    $("#diventradasalida").hide();
                    $("#diventradaajuste").hide();
                    $("#divsalidaajuste").hide();
                    $("#diventradasalidaajuste").hide();
                }
            });
            $("#radioajuste").click(function () {
                if ($(this).is(":checked")) {
                    $("#diventrada").hide();
                    $("#divsalidad").hide();
                    $("#divajuste").show();
                    $("#diventradasalida").hide();
                    $("#diventradaajuste").hide();
                    $("#divsalidaajuste").hide();
                    $("#diventradasalidaajuste").hide();

                }
            });
            $("#radioentradasalida").click(function () {
                if ($(this).is(":checked")) {
                    $("#diventrada").hide();
                    $("#divsalidad").hide();
                    $("#divajuste").hide();
                    $("#diventradasalida").show();
                    $("#diventradaajuste").hide();
                    $("#divsalidaajuste").hide();
                    $("#diventradasalidaajuste").hide();

                }
            });
            $("#radioentradaajuste").click(function () {
                if ($(this).is(":checked")) {
                    $("#diventrada").hide();
                    $("#divsalidad").hide();
                    $("#divajuste").hide();
                    $("#diventradasalida").hide();
                    $("#diventradaajuste").show();
                    $("#divsalidaajuste").hide();
                    $("#diventradasalidaajuste").hide();

                }
            });
            $("#radiosalidaajuste").click(function () {
                if ($(this).is(":checked")) {
                    $("#diventrada").hide();
                    $("#divsalidad").hide();
                    $("#divajuste").hide();
                    $("#diventradasalida").hide();
                    $("#diventradaajuste").hide();
                    $("#divsalidaajuste").show();
                    $("#diventradasalidaajuste").hide();

                }
            });
            $("#radioentradasalidaajuste").click(function () {
                if ($(this).is(":checked")) {
                    $("#diventrada").hide();
                    $("#divsalidad").hide();
                    $("#divajuste").hide();
                    $("#diventradasalida").hide();
                    $("#diventradaajuste").hide();
                    $("#divsalidaajuste").hide();
                    $("#diventradasalidaajuste").show();

                }
            });
        });

        $(document).ready(function () {

            let token = $('#token').val();


            $('.collapse').collapse({
                toggle: true

            });

            $("#btnEntradas").on("click", function () {
                $('#btn').click();
                if ($('#ver').is(':hidden'))
                    $('#tablaReporteEntrada').hide();
                else
                    $('#tablaReporteEntrada').show(); //muestro mediante id$
                $('#tablaReporteSalida').hide(); //muestro mediante id

            });

            $("#btnSalidas").on("click", function () {
                $('#btn').click();
                if ($('#ver').is(':hidden'))
                    $('#tablaReporteSalida').hide();
                else
                    $('#tablaReporteEntrada').hide(); //muestro mediante id$
                $('#tablaReporteSalida').show(); //muestro mediante id
            });

            $('#btn').click(function () {
                if ($('#ver').is(':hidden'))
                    $('#tablaReporteEntrada').hide();
                $('#tablaReporteSalida').hide();
                $('#tablaReporteAjuste').hide();
                $('#tablaReporteEntradaSalida').hide();
                $('#tablaReporteEntradaAjuste').hide();
                $('#tablaReporteSalidaAjuste').hide();
                $('#tablaReporteEntradaSalidaAjuste').hide();

            });

            let ReporEntradas = $("#Fechas").submit(function (event) {
                event.preventDefault();
                let token = $('#token').val();
                let FechaInicial = $('#Fechainial').val();
                let FechaFinal = $('#FechaFin').val();
                let dataform = {FechaInicial, FechaFinal};

                if (FechaInicial === '' || FechaFinal === '') {
                    swal("Error", "Valide Fechas de Filtros", "error");
                    $('#tablaReporteEntrada').hide(); //muestro mediante id$
                    $('#tablaReporteSalida').hide(); //muestro mediante id
                } else {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': token},
                        data: dataform,
                        url: '{{ route('ReporteEntradaLab') }}',
                        type: 'post',
                        dataType: 'json',
                        success: function (Result) {
                            // console.log(Result);
                            var TableRepor = $('#TableReportEntrada').DataTable({
                                "info": false,
                                dom: 'Bfrtip',
                                destroy: true,
                                paging: false,
                                //columns: Result.data,
                                data: Result.data,

                                columns: [
                                    {data: 'Codigo'},
                                    {data: 'Nombre_Variedad'},
                                    {data: 'NombreGenero'},
                                    {data: 'CodigoBarras'},
                                    {data: 'Identificador'},
                                    {data: 'Breeder'},
                                    {data: 'NombreFase'},
                                    {data: 'TipoContenedor'},
                                    {data: 'created_at'},
                                    {data: 'SemanaEntrada'},
                                    {data: 'UbicacionActual'},
                                    {data: 'Plantas'},
                                    {data: 'NombrePatinador'},
                                    {data: 'NombreOperario'},
                                    {
                                        data: 'Flag_Activo',
                                        render: function (data) {
                                            if (data == 1) {
                                                return '<span class="label label-success">Activo</span>';
                                            } else {
                                                return ' <span class="label label-danger">Inactivo</span>';
                                            }
                                        }
                                    },
                                ],
                                aoColumnDefs: [
                                    {
                                        "visible": ($('#CodigovariEntrada').prop('checked')) ? true : false,
                                        "aTargets": [0]
                                    },
                                    {
                                        "visible": ($('#VariedadEntr').prop('checked')) ? true : false,
                                        "aTargets": [1]
                                    },
                                    {
                                        "visible": ($('#GeneroEntr').prop('checked')) ? true : false,
                                        "aTargets": [2]
                                    },
                                    {
                                        "visible": ($('#BarcodeEntr').prop('checked')) ? true : false,
                                        "aTargets": [3]
                                    },
                                    {
                                        "visible": ($('#IdentificadorEntr').prop('checked')) ? true : false,
                                        "aTargets": [4]
                                    },
                                    {
                                        "visible": ($('#BreederEntr').prop('checked')) ? true : false,
                                        "aTargets": [5]
                                    },
                                    {
                                        "visible": ($('#FaseActualEntr').prop('checked')) ? true : false,
                                        "aTargets": [6]
                                    },
                                    {
                                        "visible": ($('#ContenedorEntr').prop('checked')) ? true : false,
                                        "aTargets": [7]
                                    },
                                    {
                                        "visible": ($('#FechaEntradaEntr').prop('checked')) ? true : false,
                                        "aTargets": [8]
                                    },
                                    {
                                        "visible": ($('#SemanaEntradaEntr').prop('checked')) ? true : false,
                                        "aTargets": [9]
                                    },
                                    {
                                        "visible": ($('#UbicacionActEntr').prop('checked')) ? true : false,
                                        "aTargets": [10]
                                    },
                                    {
                                        "visible": ($('#CantidadEntr').prop('checked')) ? true : false,
                                        "aTargets": [11]
                                    },
                                    {
                                        "visible": ($('#PatinadorEntr').prop('checked')) ? true : false,
                                        "aTargets": [12]
                                    },
                                    {
                                        "visible": ($('#OperarioEntr').prop('checked')) ? true : false,
                                        "aTargets": [13]
                                    },
                                    {
                                        "visible": true,
                                        "aTargets": [14]
                                    }

                                ],
                                buttons: [
                                    {
                                        extend: 'excelHtml5',
                                        text: ' <i class="fa fa-file-excel-o"> &nbsp Excel</i>',
                                        titleAttr: 'Excel',
                                        messageTop: 'Fecha incial '+ FechaInicial +'  Fecha Final '+ FechaFinal
                                    },
                                ],
                            });
                        }
                    });
                }
            });

            let ReporeSalida = $("#ReporteSalidas").submit(function (event) {
                event.preventDefault();
                let token = $('#token').val();
                let FechaInicial = $('#Fechainial').val();
                let FechaFinal = $('#FechaFin').val();
                let dataform = {FechaInicial, FechaFinal};

                if (FechaInicial === '' || FechaFinal === '') {
                    swal("Error", "Valide Fechas de Filtros", "error");
                    $('#tablaReporteEntrada').hide(); //muestro mediante id$
                    $('#tablaReporteSalida').hide(); //muestro mediante id
                } else {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': token},
                        data: dataform,
                        url: '{{ route('ReporteSalidaLab') }}',
                        type: 'post',
                        dataType: 'json',
                        success: function (Result) {
                            console.log(Result);
                            var TableReporSa = $('#TablaReporteSalidas').DataTable({
                                "info": false,
                                dom: 'Bfrtip',
                                destroy: true,
                                paging: false,
                                //columns: Result.data,
                                data: Result.data,

                                columns: [
                                    {data: 'Codigo'},
                                    {data: 'Nombre_Variedad'},
                                    {data: 'NombreGenero'},
                                    {data: 'CodigoBarras'},
                                    {data: 'Identificador'},
                                    {data: 'Breeder'},
                                    {data: 'NombreFase'},
                                    {data: 'TipoContenedor'},
                                    {data: 'created_at'},
                                    {data: 'SemanaSalida'},
                                    {data: 'Plantas'},
                                    {data: 'TipoSalida_Ajuste'},
                                    {data: 'NombrePatinador'},
                                    {data: 'NombreOperario'},
                                    {data: 'CausalDescarte'},
                                    /* {
                                         data: 'Flag_Activo',
                                         render: function (data) {
                                             if (data == 1) {
                                                 return '<span class="label label-success">Activo</span>';
                                             } else {
                                                 return ' <span class="label label-danger">Inactivo</span>';
                                             }
                                         }
                                     },*/
                                ],
                                aoColumnDefs: [
                                    {
                                        "visible": ($('#CodigovariSalida').prop('checked')) ? true : false,
                                        "aTargets": [0]
                                    },
                                    {
                                        "visible": ($('#VariedadSalida').prop('checked')) ? true : false,
                                        "aTargets": [1]
                                    },
                                    {
                                        "visible": ($('#GeneroSalida').prop('checked')) ? true : false,
                                        "aTargets": [2]
                                    },
                                    {
                                        "visible": ($('#BarcodeSalida').prop('checked')) ? true : false,
                                        "aTargets": [3]
                                    },
                                    {
                                        "visible": ($('#IdentificadorSalida').prop('checked')) ? true : false,
                                        "aTargets": [4]
                                    },
                                    {
                                        "visible": ($('#BreederrSalida').prop('checked')) ? true : false,
                                        "aTargets": [5]
                                    },
                                    {
                                        "visible": ($('#FaseActualrSalida').prop('checked')) ? true : false,
                                        "aTargets": [6]
                                    },
                                    {
                                        "visible": ($('#ContenedorSalida').prop('checked')) ? true : false,
                                        "aTargets": [7]
                                    },
                                    {
                                        "visible": ($('#FechaSalida').prop('checked')) ? true : false,
                                        "aTargets": [8]
                                    },
                                    {
                                        "visible": ($('#SemanaSalida').prop('checked')) ? true : false,
                                        "aTargets": [9]
                                    },
                                    {
                                        "visible": ($('#CantidadSalida').prop('checked')) ? true : false,
                                        "aTargets": [10]
                                    },
                                    {
                                        "visible": ($('#PatinadorSalida').prop('checked')) ? true : false,
                                        "aTargets": [11]
                                    },
                                    {
                                        "visible": ($('#OperarioSalida').prop('checked')) ? true : false,
                                        "aTargets": [11]
                                    },
                                    {
                                        "visible": ($('#TipoSalida').prop('checked')) ? true : false,
                                        "aTargets": [12]
                                    },
                                    {
                                        "visible": ($('#TipoCancelado').prop('checked')) ? true : false,
                                        "aTargets": [13]
                                    },

                                ],
                                buttons: [
                                    {
                                        extend: 'excelHtml5',
                                        text: ' <i class="fa fa-file-excel-o"> &nbsp Excel</i>',
                                        titleAttr: 'Excel',
                                        messageTop: 'Fecha incial '+ FechaInicial +'  Fecha Final '+ FechaFinal
                                    },
                                ],
                            });
                            //checkbox();
                        }
                    });
                }
            });
        });


        $("#TodosEntrada").on("click", function () {

            if ($('#TodosEntrada').prop('checked')) {
                $("input[name='lectEntrada']:checkbox").prop('checked', true);
            } else {
                $("input[name='lectEntrada']:checkbox").prop('checked', false);
            }
        });

        $("#TodosSalida").on("click", function () {

            if ($('#TodosSalida').prop('checked')) {
                $("input[name='lectSalida']:checkbox").prop('checked', true);
            } else {
                $("input[name='lectSalida']:checkbox").prop('checked', false);
            }
        });


    </script>
@endsection
