@extends('PageMaster')
@section('content')
    @can('VistaEmpleados')

        <div>
            <div class=" col-md-12 col-lg-12 col-xs-12">
                <section class="content espacioform">

                    <div class="tituloform">
                        <h3> Empleados</h3>
                    </div>
                    <!--Pestañas-->
                    <div id="tabs" class="col-md-12 col-lg-12 col-xs-12 box box-body spaceTap" style="margin-top:10px;">
                        @can('crearEmpleado')
                            <div class="box box-primary col-md-12 col-lg-12 col-xs-12">
                                <div class="box-body">
                                    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#CreateEmpleado">
                                        <img src="{{ asset('img/add.png') }}">Nuevo
                                    </button>
                                </div>
                            </div>
                        @endcan


                        <ul>
                            @can('verEmpleados')
                                <li><a href="#Empleados"><span>Empleados Activos</span></a></li>
                                <li><a href="#EmpleadosInactivos"><span>Empleados Inactivos</span></a></li>
                            @endcan
                            @can('VerEmpleadosLaboratorio')
                                <li><a href="#EmpleadosLabs"><span>Empleados Laboratorio</span></a></li>
                            @endcan

                        </ul>
                        @can('verEmpleados')
                            <div id="Empleados" class="tabcontent col-lg-12">
                                <div class="table-responsive " style="height: 380px">
                                    <table id="EmpleadosActivos" class="display nowrap col-md-12 col-lg-12 col-xl-12 cell-border " style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Numero Documento</th>
                                            <th>Codigo Empleado</th>
                                            <th>Apellidos y Nombres</th>
                                            <th>Genero</th>
                                            <th>Direccion Residencia.</th>
                                            <th>Telefono</th>
                                            <th>Barrio</th>
                                            <th>Rh</th>
                                            <th>Edad</th>
                                            <th> Acciones</th>
                                        </tr>
                                        </thead>
                                        {{--   <tbody>
                                           @foreach( $variable as $variables)
                                               <tr>
                                                   <td>{{ $variables->Numero_Documento }}</td>
                                                   <td>{{ $variables->Codigo_Empleado }}</td>
                                                   <td>{{ $variables->Primer_Apellido }}</td>
                                                   <td>{{ $variables->Genero }}</td>
                                                   <td>{{ $variables->Direccion_Residencia }}</td>
                                                   <td>{{ $variables->Telefono }}</td>
                                                   <td>{{ $variables->Barrio }}</td>
                                                   <td>{{ $variables->Rh }}</td>
                                                   <td>{{ $variables->Edad }}</td>
                                               </tr>
                                               @endforeach

                                           </tbody>--}}
                                    </table>
                                </div>
                            </div>
                            <div id="EmpleadosInactivos" class="tabcontent col-md-12 col-lg-12 col-xl-12">

                                <div class="table-responsive " style="height: 380px">
                                    <table id="EmpleadosinActivos" class="display nowrap col-md-12 col-lg-12 col-xl-12 cell-border " style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Numero Documento</th>
                                            <th>Apellidos y Nombres</th>
                                            <th>Genero</th>
                                            <th>Direccion Residencia.</th>
                                            <th>Telefono</th>
                                            <th>Barrio</th>
                                            <th>Rh</th>
                                            <th>Edad</th>
                                            <th> Acciones</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                        @endcan
                        @can('VerEmpleadosLaboratorio')
                            <div id="EmpleadosLabs" class="tabcontent col-md-12">
                                <div class="table-responsive">
                                    <table id="TableEmpleadosLab" class="display nowrap col-md-12 col-lg-12 col-xl-12 cell-border " style="width:100%;">
                                        <thead>
                                        <tr>

                                            <th width="30">N Documento</th>
                                            <th>Codigo</th>
                                            <th>Apellidos y Nombres</th>
                                            <th> Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $EmpleadosLab as $EmpleadosLa)
                                            <tr>
                                                <td>{{ $EmpleadosLa->Numero_Documento }}</td>
                                                <td>{{ $EmpleadosLa->Codigo_Empleado }}</td>
                                                <td>
                                                    {{ $EmpleadosLa->Primer_Apellido }}
                                                    {{ $EmpleadosLa->Segundo_Apellido }}
                                                    {{ $EmpleadosLa->Primer_Nombre }}
                                                    {{ $EmpleadosLa->Segundo_Nombre }}
                                                </td>
                                                <td align="center">
                                                    @can('FuncionEmpleadosLaboratorio')
                                                        <button class="btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#EmpleadosLabAsigCargo" data-whatever="{{ json_encode($EmpleadosLa) }}">
                                                            <i data-toggle="tooltip" data-placement="left" title="Funcion" class="fa fa-edit"></i>
                                                        </button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endcan
                    </div>


                    <!--Modal Crear Usuario-->
                    @can('crearEmpleado')
                        <div class="modal fade bigEntrance2" id="CreateEmpleado" role="dialog">
                            <div class="modal-dialog modal-lg " style="width: 80% !important; margin-top: 80px">
                                <!-- Modal content-->
                                <div class="modal-content ">
                                    <div class="modal-header" style="   text-align: center">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title"><i class="fa fa-user-circle pulse" style="font-size: 40px; color: #0b97c4"></i> Crear Empleado</h3>

                                    </div>
                                    <form id="createEmpleados" method="POST" action="{{ route('crearEmpleados') }}" enctype="multipart/form-data">
                                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                        <div>

                                            <div class="col-md-12">

                                                <div class="form-group col-md-3">
                                                    <label for="Tipo_Doc" class="col-form-label text-md-right">{{ __('Tipo Documento') }}</label>
                                                    <select id="Tipo_Doc" class="form-control labelform" name="Tipo_Doc" required>
                                                        @foreach($documento as $doc)
                                                            <option value="{{ $doc->id_Doc }}">   {{$doc->Iniciales}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Numero Documento') }}</label>
                                                    <input id="Numero_Documento" type="number" onblur="Existe(this)" min="1" class="form-control labelform {{ $errors->has('Numero_Documento') ? ' is-invalid' : '' }}" name="Numero_Documento" value="{{ old('Numero_Documento') }}" autofocus required>
                                                    @if ($errors->has('Numero_Documento'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Numero_Documento') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="" class="col-form-label text-md-right">{{ __('Departamento Expedicion') }}</label>
                                                    <select id="departamentos_id_Expe" class="form-control labelform" name="departamentos_id_Expe" required>
                                                        @foreach($depart  as $depa)
                                                            <option value="{{ $depa->id }}">   {{$depa->Departamento}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="" class="col-form-label text-md-right">{{ __('Ciudad Expedicion') }}</label>
                                                    <select id="Ciudad_id_Expedcion" class="form-control labelform" name="Ciudad_id_Expedcion" required>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Primer Apellido') }}</label>
                                                    <input id="Primer_Apellido" type="text" class="form-control labelform {{ $errors->has('Primer_Apellido') ? ' is-invalid' : '' }}" name="Primer_Apellido" value="{{ old('Primer_Apellido') }}" autofocus required>
                                                    @if ($errors->has('Primer_Apellido'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Primer_Apellido') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Segundo Apellido') }}</label>
                                                    <input id="Segundo_Apellido" type="text" class="form-control labelform {{ $errors->has('Segundo_Apellido') ? ' is-invalid' : '' }}" name="Segundo_Apellido" value="{{ old('Segundo_Apellido') }}" autofocus>
                                                    @if ($errors->has('Segundo_Apellido'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Segundo_Apellido') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Primer Nombre') }}</label>
                                                    <input id="Primer_Nombre" type="text" class="form-control labelform {{ $errors->has('Primer_Nombre') ? ' is-invalid' : '' }}" name="Primer_Nombre" value="{{ old('Primer_Nombre') }}" autofocus required>
                                                    @if ($errors->has('Primer_Nombre'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Primer_Nombre') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>


                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Segundo Nombre') }}</label>
                                                    <input id="Segundo_Nombre" type="text" class="form-control labelform {{ $errors->has('Segundo_Nombre') ? ' is-invalid' : '' }}" name="Segundo_Nombre" value="{{ old('Segundo_Nombre') }}" autofocus>
                                                    @if ($errors->has('Segundo_Nombre'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Segundo_Nombre') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>


                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Genero') }}</label>
                                                    <select id="Genero" name="Genero" class="form-control labelform" required>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                    @if ($errors->has('Genero'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Genero') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                {{-- <div class="form-group col-md-3">
                                                     <label for="name" class="col-form-label text-md-right">{{ __('Codigo Empleado') }}</label>
                                                     <input id="Codigo_Empleado" type="text" class="form-control labelform {{ $errors->has('Codigo_Empleado') ? ' is-invalid' : '' }}" name="Codigo_Empleado" value="{{ old('Codigo_Empleado') }}" autofocus>
                                                     @if ($errors->has('Codigo_Empleado'))
                                                         <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('Codigo_Empleado') }}</strong>
                                                             </span>
                                                     @endif
                                                 </div>--}}

                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Telefono') }}</label>
                                                    <input id="Telefono" type="number" class="form-control labelform {{ $errors->has('Telefono') ? ' is-invalid' : '' }}" name="Telefono" value="{{ old('Telefono') }}" autofocus>
                                                    @if ($errors->has('Telefono'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Telefono') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>


                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Barrio') }}</label>
                                                    <input id="Barrio" type="text" class="form-control labelform {{ $errors->has('Barrio') ? ' is-invalid' : '' }}" name="Barrio" value="{{ old('Barrio') }}" autofocus required>
                                                    @if ($errors->has('Barrio'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Barrio') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Edad') }}</label>
                                                    <input id="Edad" type="text" class="form-control labelform {{ $errors->has('Edad') ? ' is-invalid' : '' }}" name="Edad" value="{{ old('Edad') }}" autofocus required>
                                                    @if ($errors->has('Edad'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Edad') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="Rh" class="col-form-label text-md-right">{{ __('RH') }}</label>
                                                    <select id="Rh" class="form-control labelform" name="Rh" required>
                                                        <option value="A-">A-</option>
                                                        <option value="A+">A+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="O">O</option>
                                                        <option value="O-">O-</option>
                                                        <option value="O+">O+</option>

                                                    </select>
                                                    @if ($errors->has('RH'))
                                                        <span class="invalid-feedback">
                                                         <strong>{{ $errors->first('RH') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>


                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group col-md-3">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('Direccion Residencia') }}</label>
                                                    <input id="Direccion_Residencia" type="text" class="form-control labelform {{ $errors->has('Direccion_Residencia') ? ' is-invalid' : '' }}" name="Direccion_Residencia" value="{{ old('Direccion_Residencia') }}" autofocus required>
                                                    @if ($errors->has('Direccion_Residencia'))
                                                        <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Direccion_Residencia') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>


                                                <div class="form-group col-md-3">
                                                    <label for="" class="col-form-label text-md-right">{{ __('Departamento Residencia') }}</label>
                                                    <select id="departamentos_id_Residencia" class="form-control labelform" name="departamentos_id_Residencia" required>
                                                        @foreach($depart  as $depa)
                                                            <option value="{{ $depa->id }}">   {{$depa->Departamento}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="" class="col-form-label text-md-right">{{ __('Ciudad Residencia') }}</label>
                                                    <select id="Ciudad_id_Residencia" class="form-control labelform" name="Ciudad_id_Residencia" required>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="" class="col-form-label text-md-right">{{ __('Fecha Nacimiento') }}</label>
                                                    <input id="Fecha_Nacimientoo" type="date" class="form-control labelform" name="Fecha_Nacimiento" required/>


                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group col-md-4">
                                                    <label for="">Cargar Foto </label>
                                                    <input type="file" class="form-control" name="img" id="img">

                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <div class="col-lg-10"></div>
                                            <button type="submit" class="btn btn-primary"> {{ __('Guardar') }} </button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    @endcan

                    {{--modal para asignar area sub area y funcion laboratorio--}}
                    <div class="modal fade" id="EmpleadosLabAsigCargo" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title"><i class="fa fa-user-circle" style="font-size: 40px; color: #0b97c4"></i> Asignar Funcion</h3>

                                </div>
                                <form id="updatefuncionempleado" method="POST" action="{{ route('EmpleadosLaboratorio') }}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                    <div>

                                        <div class="col-lg-12">

                                            <div class="form-group col-lg-2">
                                                <label for="name" class="col-form-label text-md-right">{{ __('Codigo') }}</label>
                                                <input id="Codigo" type="text" disabled="disabled" class="form-control labelform" name="Codigo" autofocus>
                                            </div>

                                            <div class="form-group col-lg-10">
                                                <label for="name" class="col-form-label text-md-right">{{ __('Nombre') }}</label>
                                                <input id="Nombre" type="text" disabled="disabled" class="form-control labelform" name="Nombre" autofocus>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="id_areaLab" class="col-form-label text-md-right">{{ __('Area') }}</label>
                                                <input id="id_areaLab" name="id_area" disabled class="form-control labelform">

                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="id_Sub_AreaLab" class="col-form-label text-md-right">{{ __('Sub Area') }}</label>
                                                <select id="id_Sub_AreaLab" name="id_Sub_Area" class="form-control labelform" required="required">
                                                    <option selected="true" value="" disabled="disabled">Seleccione Uno</option>
                                                    @foreach ( $SubAreas as $SubArea)
                                                        <option value="{{ $SubArea->id }}" {{--{{ ($EmpleadosLab && $EmpleadosLab->id_Sub_Area== $SubArea->id)?'selected':''}}--}}>  {{$SubArea->Sub_Area}} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="id_Bloque_AreaLab" class="col-form-label text-md-right">{{ __('Funcion') }}</label>
                                                <select id="id_Bloque_AreaLab" name="id_Bloque_Area" class="form-control labelform" required="required">
                                                    {{--@if($EmpleadosLab && $EmpleadosLab->id_Bloque_Area)
                                                        <option value="{{ $EmpleadosLab->id_Bloque_Area }}">{{ $EmpleadosLab->id_Bloque_Area }}</option>
                                                    @else--}}
                                                        <option selected="true" value="" disabled="disabled" >Seleccione Uno</option>
                                                   {{-- @endif--}}
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="idEmpleado" id="idEmpleado">

                                        <div class="modal-footer">

                                            <div class="col-lg-10"></div>
                                            <button type="submit" class="btn btn-primary"> {{ __('Guardar') }} </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
        </div>
    @endcan

    <script>

        @if(session()->has('ok'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-full-width",
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
            toastr["error"]("El empleado Fue Inactivo DEBE COLOCAR FECHA DE RETIRO");
        });
        @endif

        @if(session()->has('error'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-center",
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
            toastr["success"]("El empleado Fue activo Correctamente");
        });
        @endif

        @if(session()->has('creado'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-center",
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
            toastr["success"]("El empleado Fue creado Correctamente");

        });
        @endif

        @if(session()->has('existe'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-center",
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
            toastr["error"]("El Numero de documento ya existe el empleado no fue creado");
        });
        @endif

        @if(session()->has('update'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-full-width",
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
            toastr["succes"]("Actualizado Correctamente");
        });
        @endif

        $(document).ready(function () {
            let token = $('#token').val();


            table = $('#EmpleadosActivos').DataTable({
                ajax: {
                    headers: {'X-CSRF-TOKEN': token},
                    url: "/EmpleadosMostrar",
                    type: 'get',
                },

                dom: "Bfrtip",
                paging: true,
                "language": {
                    "search": "Buscar:",
                    "info": "Mostrando Página _PAGE_ de _PAGES_, Registros Activos _TOTAL_",
                    "Previous": "Anterior",
                },
                columns: [

                    {data: 'id', "visible": false},
                    {data: 'Numero_Documento'},
                    {data: 'Codigo_Empleado'},
                    {
                        data: 'Nombre',
                        render: function (data, type, row) {
                            return (row.Primer_Apellido + ' ' + row.Segundo_Apellido + ' ' + row.Primer_Nombre + ' ' + row.Segundo_Nombre);
                        }
                    },
                    {data: 'Genero'},
                    {data: 'Direccion_Residencia'},
                    {data: 'Telefono'},
                    {data: 'Barrio'},
                    {data: 'Rh'},
                    {data: 'Edad'},
                    {
                        data: 'Codigo_Empleado',
                        render: function (data, type, row) {
                            if (type === 'display') {
                                return '@can('FichaTecnicaEmpleado')<a href="/FichaTecnica/' + btoa(row.id) + '/empelados" class="btn btn-primary" style="position: center" title="Ficha Tecnica"><i class="fa fa-edit"></i> </a>@endcan' +
                                    '@can('InactivarEmpleado')<a href="/EliminarEmpelado/' + row.id + '/empelado" id="EliminarEmpleado"  methods="PUT"  class="btn btn-danger" title="Eliminar" style="position: center" ><i class="fa fa-remove"></i> </a>@endcan';
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
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                        }

                    },
                    {
                        extend: 'pdfHtml5',
                        text: ' <i class="fa fa-file-pdf-o">&nbsp PDF</i>',
                        titleAttr: 'pdf',
                    },
                    {
                        extend: 'print',
                        text: ' <i class="fa fa-print"> &nbsp print</i>',
                        titleAttr: 'print',

                    },
                    {
                        extend: 'colvis',
                        text: ' <i class="fa fa-columns"> &nbsp Columnas Visibles</i>',
                    }


                ],
                "scrollX": true,
                "scrollY": true,


            });

            $('#TableEmpleadosLab').DataTable({
                //aqui
                dom: "Bfrtip",
                paging: true,
                "language": {
                    "search": "Buscar:",
                    "info": "Mostrando Página _PAGE_ de _PAGES_,  _TOTAL_ Registros",
                    "Previous": "Anterior",
                },

                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: ' <i class="fa fa-file-excel-o"> &nbsp Excel</i>',
                        titleAttr: 'Excel',
                    },

                ],
            });


            $("#id_Sub_AreaLab").change(function () {
                elegido = $(this).val();
                token = $('#token').val();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},
                    url: '/Bloque',
                    data: {sub_area: elegido},//este para que lo uso??? son los datos que esta enviando
                    type: 'post',

                    success: function (Result) {
                        /* console.log(Result);*/

                        $("#id_Bloque_AreaLab").empty().selectpicker('destroy');
                        $.each(Result.Dato, function (i, item) {
                            $("#id_Bloque_AreaLab").append('<option value="' + item.id + '">' + item.bloque_area + '</option>');
                            /*donde esta este select*/
                        });
                        $('#id_Bloque_AreaLab').selectpicker({
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
        });


        function Existe() {

            let dato = $("#Numero_Documento").val();

            $.ajax({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                data: {dato},
                url: '{{ route('ExisteEmpleado') }}',
                type: 'post',
                success: function (Result) {
                    if (Result.ok === 1) {
                        swal("Error!", "Numero de Documento ya Existe", "error");
                        $("#Numero_Documento").val('');
                        $('#CreateEmpleado').modal('toggle');
                    }
                }
            });
        }

        $('#EmpleadosLabAsigCargo').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var data = button.data('whatever'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#Codigo').val(data.Codigo_Empleado);
            modal.find('#Nombre').val(data.Primer_Apellido + ' ' + data.Segundo_Apellido + ' ' + data.Primer_Nombre + ' ' + data.Segundo_Nombre);
            modal.find('#id_areaLab').val(data.area);
            modal.find('#id_Sub_AreaLab').val(data.id_Sub_Area);
            modal.find('#id_Bloque_AreaLab').html('<option value="'+data.id_Bloque_Area+'">'+data.bloque_area+'</option>');
            modal.find('#idEmpleado').val(data.id);
        });


        let uploadField = document.getElementById("img");
        uploadField.onchange = function () {
            if (this.files[0].size > 307200) {
                swal("Error!", "La foto supera el maximo de peso soportado", "error");
                //swal("Error!", "Numero de Documento ya Existe", "error");
                //alert("La foto supera el maximo de peso soportado");
                this.value = "";
            }
        };

    </script>
@endsection
