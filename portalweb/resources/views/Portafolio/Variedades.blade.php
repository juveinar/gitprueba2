@extends('PageMaster')
@section('content')
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>


    @can('Vistavariedades')
        <div id="tabs" class="col-lg-12 box box-body spaceTap"{{-- style="margin-top:10px;"--}}>
            <div>
                <h3>Variedades</h3>
            </div>
            <div class="box box-primary">
                <ul>
                    @can('VerGeneros')
                        <li><a href="#Generos" onclick="ocultaDivModificaGenero()"><span>Generos</span></a></li>
                    @endcan
                    @can('VerEspecies')
                        <li><a href="#Especies" onclick="ocultaDivModificaGenero()"><span>Especies</span></a></li>
                    @endcan
                    @can('VerVariedades')
                        <li><a href="#Variedades"><span>Variedades</span></a></li>
                    @endcan
                </ul>
            </div>
            @can('VerGeneros')
                <div id="Generos" class="tabcontent box box-primary col-lg-12">

                    <div id="GenerosTabs" class="col-lg-12 box box-body spaceTap">

                        {{--************************ TABS DE GENEROS ACTIVOS INACTIVOS *************************--}}
                        <ul>
                            <li><a href="#GenerosActivosTabs"><span>Generos Activos</span></a></li>
                            <li><a href="#GenerosInactivosTabs" onclick="ocultaDivModificaGenero()"><span>Generos Inactivos</span></a></li>

                        </ul>{{--
                        <div class="col-lg-12">
                            <div class="col-lg-3 "></div>
                            <div class="col-lg-9 expandUp" style="margin-top:10px;display: flex;   justify-content: center;   align-items: center; background-color: rgba(106, 106, 131, 0.13)">
                                <h5>LISTA DE GENEROS</h5>
                            </div>
                        </div>--}}
                        {{--************************ TAB GENEROS ACTIVOS******************************************************--}}
                        <div id="GenerosActivosTabs" class="tabcontent col-lg-12">
                            <div>
                                <div class="col-lg-3 "></div>
                                <div class="col-lg-9 expandUp" style="margin-top:10px;display: flex;   justify-content: center;   align-items: center; background-color: rgba(106, 106, 131, 0.13)">
                                    <h5>LISTA DE GENEROS</h5>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                {{--************************ CONTENEDOR DE CREAR Y NMODIFICAR GENERO *************************--}}
                                <div class="col-lg-3" style="background-color: #0a0a0a12;">
                                    <div>
                                        <h3>
                                            @can('CrearGeneros')
                                                <a style="display: flex;   justify-content: center;   align-items: center;" id="formulariocreargenerotitle">Crear Genero</a>
                                            @endcan

                                            @can('ActualizarGeneros')
                                                <a style="display: flex;   justify-content: center;   align-items: center; display: none" id="formulariomodificargenerotitle">Modificar Genero</a>
                                            @endcan
                                        </h3>
                                    </div>

                                    {{--****************** FORMULARIO PARA CREAR GENERO ****************************--}}
                                    @can('CrearGeneros')
                                        <div id="formulariocreargenero">
                                            <form id="CreateGenero" method="POST" action="{{ route('CreateGenero') }}">
                                                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                                <div class="col-lg-12" style="">
                                                    <div class="col-lg-12" style="">


                                                        <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Genero') }}</label>
                                                        <input id="Nombre_Genero" type="search" class="form-control labelform {{ $errors->has('Nombre_Genero') ? ' is-invalid' : '' }}" name="Nombre_Genero" value="{{ old('Nombre_Genero') }}" autofocus required>
                                                        @if ($errors->has('Nombre_Especie'))
                                                            <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Nombre_Genero') }}</strong>
                                                    </span>
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" style="margin-top: 10px" class="btn btn-success btn-lg btn-block"> {{ __('Guardar') }} </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endcan
                                    {{--****************** FORMULARIO PARA MODIFICAR GENERO ****************************--}}
                                    @can('ActualizarGeneros')
                                        <div id="formulariomodificargenero" class="fadeIn" style="display: none">
                                            <form id="UpdateGenero" method="POST" action="{{ route('UpdateGenero') }}">
                                                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                                <input type="hidden" id="IdGeneroUpdate" name="IdGeneroUpdate">
                                                <div class="col-lg-12" style="">
                                                    <div class="col-lg-12" style="">

                                                        <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Genero') }}</label>
                                                        <input id="Nombre_Genero_m" type="search" class="form-control col-lg-auto labelform {{ $errors->has('Nombre_Genero') ? ' is-invalid' : '' }}" name="Nombre_Genero_m" value="{{ old('Nombre_Genero') }}" autofocus required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" style="margin-top: 10px" id="GuardarOcultar" class="btn btn-success btn-lg btn-block"> {{ __('Guardar') }} </button>
                                                    <button type="button" style="margin-top: 10px" onclick="ocultaDivModificaGenero()" class="btn btn-danger btn-lg btn-block"> {{ __('Cancelar') }} </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                                {{--****************** TABLA GENEROS ACTIVOS *************************************************--}}
                                <div class="col-md-9">
                                    <div class="table" style="height: 230px; margin-top: 5px;">
                                        <table id="GenerosActivosTabla" width="100%" class="table table-hover display nowrap col-lg-12 cell-border">
                                            <thead>
                                            <tr>
                                                <th>Nombre Genero</th>
                                                <th>Codigo Integracion</th>
                                                <th>Accion</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="GenerosInactivosTabs" class="tabcontent col-lg-12">

                            <div class="col-md-12">
                                <div class="table table-responsive" style="height: 480px; margin-top: 5px">

                                    <table id="GenerosInActivosTabla" class="table table-hover display nowrap col-lg-12 cell-border" style="width:100%">
                                        <thead style="text-align:center">
                                        <tr>
                                            <th style="text-align: center">Nombre Genero</th>
                                            <th style="text-align: center">Codigo Integracion</th>
                                            <th style="text-align: center">Accion</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @can('VerEspecies')
                <div id="Especies" class="tabcontent col-lg-12">

                    <div id="EspeciesTabs" class="col-lg-12 box box-body spaceTap">

                        <div>
                            @can('CrearEspecies')
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#NuevaEspecie">Crear Especie</button>
                            @endcan
                        </div>
                        <ul>
                            <li><a href="#EspeciesActivas"><span>Especies Activas</span></a></li>
                            <li><a href="#EspeciesInactivas"><span>Especies Inactivas</span></a></li>

                        </ul>

                        <div class="col-lg-12 expandUp" style="margin-top:10px;display: flex;   justify-content: center;   align-items: center; background-color: rgba(106, 106, 131, 0.13)">
                            <h5>LISTA DE ESPECIES</h5>
                            {{--<input type="checkbox" checked data-toggle="toggle">--}}

                        </div>
                        <div id="EspeciesActivas" class="tabcontent col-lg-12">

                            <div class="col-lg-12" style="margin-top: 15PX">
                                <div class="table" style="height: 230px; margin-top: 5px;">

                                    <table id="TablaEspeciesActivas" width="100%" class="table table-hover display nowrap col-lg-12 cell-border">
                                        <thead>
                                        <tr>
                                            <th>Nombre Especie</th>
                                            <th>Nombre Genero</th>
                                            <th> Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($EspeciesActivas as $EspeciesActiva)
                                            <tr>
                                                <td>{{ $EspeciesActiva->NombreEspecie }}</td>
                                                <td>{{ $EspeciesActiva->NombreGenero }}</td>

                                                <td>
                                                    @can('InactivarEspecies')
                                                        <button onclick="InactivarEspecie('{{ $EspeciesActiva->id }}')" type="button" class="btn btn-danger btn-xs" data-placement="left" data-toggle="tooltip" data-html="true" title="<em></em> <u>Inactivar</u><b></b>"><i class="fa fa-remove"></i></button>
                                                    @endcan
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="EspeciesInactivas" class="tabcontent col-lg-12">

                            <div class="col-lg-12" style="margin-top: 15PX">
                                <div class="col-md-12">
                                    <div class="table" style="height: 200px">

                                        <table id="TablaEspeciesInacActivas" style="width:100%" class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Nombre Especie</th>
                                                <th>Nombre Genero</th>

                                                <th> Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($EspeciesInactivas as $EspeciesInactiva)
                                                <tr>
                                                    <td>{{ $EspeciesInactiva->NombreEspecie }}</td>
                                                    <td>{{ $EspeciesInactiva->NombreGenero }}</td>
                                                    <td>
                                                        @can('ActivarEspecies')
                                                            <button onclick="ActivarEspecie('{{ $EspeciesInactiva->id }}')" type="button" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                                        @endcan
                                                    </td>

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @can('VerVariedades')
                <div id="Variedades" class="tabcontent col-lg-12">
                    <div id="EspeciesTabs" class="col-lg-12 box box-body spaceTap">
                        @can('CrearVariedades')
                            <div>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#NuevaVariedad">Crear Variedad</button>
                            </div>
                        @endcan
                        <ul>
                            <li><a href="#VariedadesActivas"><span>Variedades Activas</span></a></li>
                            <li><a href="#VariedadesInactivas"><span>Variedades Inactavivas</span></a></li>

                        </ul>
                        <div style="display: flex;   justify-content: center;   align-items: center;">
                            <h4>Lista de Variedades</h4>
                        </div>

                        <div id="VariedadesActivas" class="tabcontent col-lg-12">
                            <div class="col-lg-12">
                                <div class="table-responsive" style="height: 280px">
                                    <table id="TableVariedadesActivas" class="display nowrap col-lg-12 cell-border " style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Variedad</th>
                                            <th>Especie</th>
                                            <th>Genero</th>
                                            <th>Accion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($VariedadesActivas as $VariedadesActiva)
                                            <tr>
                                                <td>{{ $VariedadesActiva->Codigo }}</td>
                                                <td>{{ $VariedadesActiva->Nombre_Variedad }}</td>
                                                <td>{{ $VariedadesActiva->NombreEspecie }}</td>
                                                <td>{{ $VariedadesActiva->NombreGenero }}</td>

                                                <td align="center">
                                                    @can('InactivarVariedades')
                                                        <button onclick="InactivarVariedad('{{ $VariedadesActiva->id }}')" type="button" class="btn btn-danger btn-round btn-sm" data-placement="left" data-toggle="tooltip" data-html="true" title="<em></em> <u>Inactivar</u><b></b>"><i class="fa fa-remove"></i></button>
                                                    @endcan
                                                    @can('ActualizarVariedades')
                                                        <button class="btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#ModificarVariedad" data-whatever="{{ json_encode($VariedadesActiva) }}">
                                                            <i data-toggle="tooltip" data-placement="left" title="Editar Variedad" class="fa fa-edit"></i>
                                                        </button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="VariedadesInactivas" class="tabcontent col-lg-12">
                            <div class="col-lg-12">
                                <div class=" " style="height: 280px">
                                    <table id="TableVariedadesInctivas" style='width:100%' class="table table-hover display nowrap col-md-12 col-lg-12 col-xl-12 cell-border">
                                        <thead>
                                        <tr>
                                            <th style='width:20%'>Codigo</th>
                                            <th>Variedad</th>
                                            <th>Especie</th>
                                            <th>Genero</th>
                                            <th>Accion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($VariedadesInactivas  as $VariedadesInactiva)
                                            <tr>
                                                <td>{{ $VariedadesInactiva->Codigo }}</td>
                                                <td>{{ $VariedadesInactiva->Nombre_Variedad }}</td>
                                                <td>{{ $VariedadesInactiva->NombreEspecie }}</td>
                                                <td>{{ $VariedadesInactiva->NombreGenero }}</td>

                                                <td align="center">
                                                    @can('ActivarVariedades')
                                                        <button onclick="ActivarVariedad('{{ $VariedadesInactiva->id }}')" type="button" class="btn btn-danger btn-round btn-sm" data-placement="left" data-toggle="tooltip" data-html="true" title="<em></em> <u>Activar</u><b></b>"><i class="fa fa-remove"></i></button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    @endcan

    <!--Inicia modal crear especie Especie -->
    @can('CrearEspecies')
        <div class="modal fade" id="NuevaEspecie" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="display: flex;   justify-content: center;   align-items: center; ">Nueva Especie</h4>
                    </div>
                    <form method="POST" action="{{ route('CreatenewEspecie') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                        <div class="">

                            <div class="col-lg-12" style="margin-top: -120px;">
                                <div class="col-lg-12">

                                    <div class="col-lg-3"></div>
                                    <div class="col-md-6" style="">
                                        <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Especie') }}</label>
                                        <input id="Nombre_Especie" type="text" class="form-control labelform {{ $errors->has('Nombre_Especie') ? ' is-invalid' : '' }}" name="Nombre_Especie" value="{{ old('Nombre_Especie') }}" autofocus required>
                                        @if ($errors->has('Nombre_Especie'))
                                            <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Nombre_Especie') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                                <div class="col-lg-12">

                                    <div class="col-lg-3"></div>
                                    <div class="col-md-6" style="margin-top: 2px">
                                        <label for="IdGenero" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Genero') }}</label>
                                        <select id="IdGenero" class="form-control labelform" name="IdGenero" required>
                                            @foreach($Generos as $Genero)
                                                <option style="display: flex;   justify-content: center;   align-items: center; " value="{{ $Genero->id }}">  {{$Genero->NombreGenero}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer" style="margin-top: 125px">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    @can('CrearVariedades')
        <div class="modal fade" id="NuevaVariedad" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="display: flex;   justify-content: center;   align-items: center; ">Nueva Variedad</h4>
                    </div>
                    <form method="POST" action="{{ route('createVariedad') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                        <div class="">

                            <div class="col-lg-12" style="margin-top: -120px;">
                                <div class="col-lg-12">


                                    <div class="col-md-6" style="">
                                        <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Variedad') }}</label>
                                        <input id="Nombre_Variedad" type="text" autocomplete="off" class="form-control labelform {{ $errors->has('Nombre_Variedad') ? ' is-invalid' : '' }}" name="Nombre_Variedad" value="{{ old('Nombre_Variedad') }}" autofocus required>
                                        @if ($errors->has('Nombre_Variedad'))
                                            <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Nombre_Variedad') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6" style="">
                                        <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Codigo') }}</label>
                                        <input id="Codigo" type="text" maxlength="7" class="form-control labelform {{ $errors->has('Codigo') ? ' is-invalid' : '' }}" name="Codigo" value="{{ old('Codigo') }}" autofocus required>
                                        @if ($errors->has('Nombre_Especie'))
                                            <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Nombre_Especie') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-lg-12">


                                    <div class="col-md-6" style="margin-top: 2px">
                                        <label for="IdGeneros" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Genero') }}</label>
                                        <select id="IdGeneros" class="form-control labelform" name="IdGeneros" required>
                                            <option selected="true" value="" disabled="disabled">Seleccione Uno.....</option>
                                            @foreach($Generos as $Genero)
                                                <option style="display: flex;   justify-content: center;   align-items: center; " value="{{ $Genero->id }}">  {{$Genero->NombreGenero}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6" style="margin-top: 2px">
                                        <label for="IDEspecieOption" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Especie') }}</label>
                                        <select id="IDEspecieOption" class="form-control labelform" name="IDEspecieOption" required>
                                            <option selected="true" value="" disabled="disabled">Seleccione Uno.....</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="col-lg-3"></div>

                                    <div class="col-lg-3"></div>
                                </div>

                            </div>

                            <div class="col-lg-12">

                                <div class="col-lg-3"></div>

                                <div class="col-lg-3"></div>
                            </div>

                        </div>
                        <div class="modal-footer" style="margin-top: 110px">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    <script>

        $(document).ready(function () {
            let token = $('#token').val();
            tableAcGeneros = $('#GenerosActivosTabla').DataTable({

                ajax: {
                    headers: {'X-CSRF-TOKEN': token},
                    url: "/DatosGenerosActivos",
                    type: 'get',
                },
                //dom: '<"Bfrtip"><"left"i>rt<"bottom"flp><"clear">',
                dom: "Bfrtip",
                paging: true,
                "language": {
                    "search": "Buscar:",
                    "info": 'Total Activos _TOTAL_',// "Mostrando Página False, Registros Inactivos _TOTAL_",
                    "paginate": {
                        "first": 'Primero',
                        "last": 'Ultimo',
                        "next": 'Siguiente',
                        "previous": 'Anterior',
                    }
                },
                columns: [
                    {data: 'NombreGenero'},
                    {data: 'CodigoIntegracionGenero'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            if (type === 'display') {
                                //  let j = '"' + row.NombreGenero + '"';
                                return '@can('ActualizarGeneros')<a class="btn btn-primary" id="parametro"  style="position: center" title="Ficha Tecnica"><i class="fa fa-edit"></i> </a> &nbsp @endcan'
                                    + '@can('InactivarGeneros') <a href="/Inactivar/' + btoa(row.CodigoIntegracionGenero) + '/Genero" id="Inactivar"  methods="PUT"  class="btn btn-danger" title="Inactivar Genero" style="position: center" ><i class="fa fa-remove"></i> </a> @endcan';
                            }
                            return data;
                        }
                    }
                ],

                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: ' <i class="fa fa-file-excel-o"> &nbsp Excel</i>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                ],
                "scrollX": true,
                "scrollY": "180px",
                "scrollCollapse": true,
                "iDisplayLength": 25,
            });

            tableInacGeneros = $('#GenerosInActivosTabla').DataTable({
                ajax: {
                    headers: {'X-CSRF-TOKEN': token},
                    url: "/DatosGenerosInActivos",
                    type: 'get',
                },
                /*dom: '<"top"i>rt<"bottom"flp><"clear">',*/
                dom: "Bfrtip",
                paging: false,
                "language": {
                    "search": "Buscar:",

                },

                columns: [
                    {data: 'NombreGenero'},
                    {data: 'CodigoIntegracionGenero'},
                    {
                        data: 'CodigoIntegracionGenero',
                        render: function (data, type, row) {
                            if (type === 'display') {
                                return '@can('ActivarGeneros') <a href="/Activar/' + btoa(row.CodigoIntegracionGenero) + '/Genero" id="ACTIVAR"  methods="PUT"  class="btn btn-success" title="Inactivar Genero" style="position: center" ><i class="fa fa-check"></i> </a> @endcan';
                            }
                            return data;
                        }
                    }
                ],
                order: [[1, 'asc']],
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: ' <i class="fa fa-file-excel-o"> &nbsp Excel</i>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },

                ],
            });

            TableEspeciesActivas = $('#TablaEspeciesActivas').DataTable({
                "language": {
                    "search": "Buscar:",
                    "info": 'Total Activos _TOTAL_',// "Mostrando Página False, Registros Inactivos _TOTAL_",

                },

            });

            TableEspeciesInactivas = $('#TablaEspeciesInacActivas').DataTable({
                "language": {
                    "search": "Buscar:",
                    "info": 'Total Activos _TOTAL_',// "Mostrando Página False, Registros Inactivos _TOTAL_",

                },
                paginate: false,
                /* "scrollX": true,
                 "scrollY": "180px",*/
                "scrollCollapse": true,
            });

           /* $('#TableVariedadesActivas thead tr').clone(true).appendTo('#TableVariedadesActivas thead');
            $('#TableVariedadesActivas thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                if (title === 'Accion') {
                    $(this).html('');
                } else {
                    $(this).html('<input type="text" style="color:#0a0a0a; width: auto" size="10" placeholder="Buscar ' + title + '" />');
                    $('input', this).on('keyup change', function () {
                        if (table.column(i).search() !== this.value) {
                            table
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
                }


            });*/

            var table = $('#TableVariedadesActivas').DataTable({
                dom: "Bfrtip",
                paging: true,
                "ordering": false,
                "language": {
                    "search": "Buscar:",
                    "info": "Mostrando Página _PAGE_ de _PAGES_, Registros Activos _TOTAL_",
                    "Previous": "Anterior",
                },

                buttons: [
                    {
                        extend: 'excelHtml5',
                        text:' <i class="fa fa-file-excel-o"> &nbsp Excel</i>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3],//it will exporting only 3 columns out of n no of columns

                        },
                        title: 'Variedades',

                    },

                ],

            });

            /* $('#TableVariedadesInctivas thead tr').clone(true).appendTo('#TableVariedadesInctivas thead');
             $('#TableVariedadesInctivas thead tr:eq(1) th').each(function (i) {
                 var title = $(this).text();
                 if (title === 'Accion') {
                     $(this).html('');
                 } else {
                     $(this).html('<input type="text" style="color:#0a0a0a" placeholder="Bucar ' + title + '" />');
                     $('input', this).on('keyup change', function () {
                         if (table2.column(i).search() !== this.value) {
                             table2
                                 .column(i)
                                 .search(this.value)
                                 .draw();
                         }
                     });
                 }


             });*/

            var table2 = $('#TableVariedadesInctivas').DataTable({
                /* "scrollX": true,
                 "scrollY": "200px",*/
            });


        });

        $(document).on('click', '#parametro', function () {

            $('#formulariomodificargenero').show(); //muestro mediante id
            $('#formulariomodificargenerotitle').show(); //muestro mediante id
            $('#formulariocreargenero').hide(); //muestro mediante id
            $('#formulariocreargenerotitle').hide(); //muestro mediante id

            let btn = $(this);/*captura datos que estan en ese bton*/
            let tr = btn.closest('tr');/**/
            let mitabla = tableAcGeneros.row(tr[0]);
            let Fmitabla = mitabla.data();

            $('#Nombre_Genero_m').val(Fmitabla.NombreGenero);
            $('#IdGeneroUpdate').val(Fmitabla.id);
        });

        function InactivarEspecie(id) {
            /*console.log(id);*/
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["error"]("Especie Inactiva");
            });
            window.location.href = '/Inactivar/' + btoa(id) + '/Especie';
        }

        function InactivarVariedad(id) {
            /*console.log(id);*/
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["error"]("Variedad Inactiva");
            });
            window.location.href = '/Inactivar/' + btoa(id) + '/Variedad';
        }

        function ActivarVariedad(id) {
            /*console.log(id);*/
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["success"]("Variedad Activa");
            });
            window.location.href = '/Activar/' + btoa(id) + '/Variedad';
        }

        function ActivarEspecie(id) {
            /*console.log(id);*/
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["success"]("Especie Activa");

            });

            window.location.href = '/Activar/' + btoa(id) + '/Especie';


        }

        function ocultaDivModificaGenero() {

            $('#formulariomodificargenero').hide(); //muestro mediante id
            $('#formulariomodificargenerotitle').hide(); //muestro mediante id
            $('#formulariocreargenero').show(); //muestro mediante id
            $('#formulariocreargenerotitle').show(); //muestro mediante id
        }

        $('#IdGeneros').change(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': token},
                url: '/Genero/' + this.value + '/Especie',
                success: function (Result) {
                    // console.log(Result.id);
                    $("#IDEspecieOption").empty().selectpicker('destroy');
                    $.each(Result.Data, function (i, item) {
                        $("#IDEspecieOption").append('<option value="' + item.id + '">' + item.NombreEspecie + '</option>');
                    });
                    $('#IDEspecieOption').selectpicker({
                        size: 4,
                        liveSearch: true,
                    });
                },
                error: function (e) {
                    console.log(e);
                    $.each(error.responseJSON.errors, function (i, item) {
                        alertify.error(item)
                    });
                }
            });
        });
//1199607
        @if(session()->has('creado'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr["success"]("Creado Correctamente");
            $('ModificarVariedad').modal('hide');
            return true;

        });
        @endif

        @if(session()->has('Inactivo'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr["error"]("Inactivo Correctamente");
        });
        @endif

        @if(session()->has('Activo'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr["success"]("Activado Correctamente");
        });
        @endif

        @if(session()->has('existe'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr["error"]("YA EXISTE EN NUESTRA BASE DE DATOS");
        });
        @endif

        $('#GenerosTabs').tabs();

        $('#ModificarVariedad').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var data = button.data('whatever'); // Extract info from data-* attributes
            console.log(data);
            var modal = $(this);
            // modal.find('.modal-title').text('New message to ' + recipient);
            //modal.find('.modal-body input').val(recipient)
            modal.find('#Nombre_VariedadM').val(data.Nombre_Variedad);
            modal.find('#CodigoM').val(data.Codigo);
            modal.find('#CodigoMo').val(data.Codigo);
            modal.find('#IdGenerosM').val(data.NombreGenero);
            modal.find('#IDEspecie').val(data.NombreEspecie);
        })

    </script>

@endsection
@include('Modal.ModalModificarVariedad')
