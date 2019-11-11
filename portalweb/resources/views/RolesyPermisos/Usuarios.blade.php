@extends('PageMaster')
@section('content')

    <div id="Usuarios" class="">

        <div class=" col-md-12 col-lg-12 col-xs-12">
            <section class="content espacioform">

                <div class="tituloform">
                    <h3> Usuarios Sistema</h3>
                </div>
                <!--Botones-->
                {{-- @can('crearEmpleados')--}}
                <div class="box box-primary col-md-12 col-lg-12 col-xs-12">
                    <div class="box-body">
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#CreateUsuario">
                            <img src="{{ asset('img/add.png') }}">Nuevo Usuario
                        </button>
                    </div>
                </div>
            {{--@endcan--}}


                <div id="tabs" class="col-md-12 col-lg-12 col-xs-12 box box-body spaceTap">
                    <ul>
                        <li><a style="background-color: hsl(0, 0%, 100%);" href="#Usuarios"><span style="color: #0a0a0a">Usuarios</span></a></li>

                    </ul>
                    <div id="Usuarios" class="col-md-12">
                        <div class="table-responsive" style="height: 350px">
                            <table id="UsuariosSistema"  class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Usuarios</th>
                                    <th>email</th>
                                    <th>Nombre Usuario</th>
                                    <th>Accion</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>

            <!--Modal Crear Usuario-->

                <div class="modal fade bigEntrance2" id="CreateUsuario" role="dialog">
                    <div class="modal-dialog modal-lg " style="width: 80% !important; margin-top: 80px">
                        <!-- Modal content-->
                        <div class="modal-content ">
                            <div class="modal-header" style="   text-align: center">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title"><i class="fa fa-user-circle pulse" style="font-size: 40px; color: #0b97c4"></i> Crear Usuario</h3>

                            </div>
                            <form id="" class="form-control-file" method="POST" action="{{ route('CreateUsers') }}">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                <div>

                                    <div class="col-md-12" style="margin-top: 20px">

                                        <div class="form-group col-md-6">
                                            <label for="id_Empleado" class="col-form-label text-md-right">{{ __('Usuario') }}</label>
                                            <select id="id_Empleado" name="id_Empleado" class="selectpicker form-control labelform" data-live-search="true" required>
                                                <option selected="true" value="" disabled="disabled">Seleccione Usuario</option>
                                                @foreach($Empleados as $Empleados )
                                                    <option value="{{ $Empleados ->id }}">
                                                        {{$Empleados ->Primer_Apellido}}
                                                        {{$Empleados ->Segundo_Apellido}}
                                                        {{$Empleados ->Primer_Nombre}}
                                                        {{$Empleados ->Segundo_Nombre}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control labelform{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group col-md-6">
                                            <label for="username" class="col-form-label text-md-right">{{ __('Usuario Sistema') }}</label>
                                            <input id="username" type="text" class="form-control labelform{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control labelform{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('password') }}</strong>
                                                                   </span>
                                                @endif
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


            </section>
        </div>
    </div>

    <script>
        @if(session()->has('ok'))
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
            toastr["success"]("Usuario Activado");
        });
        @endif


        $(document).ready(function () {
            $('#UsuariosSistema').DataTable({
                //aqui

                ajax: {
                    headers: {'X-CSRF-TOKEN': token},
                    url: "/MostrasUsuariosSistema",
                    type: 'get',
                },
                /*dom: '<"top"i>rt<"bottom"flp><"clear">',*/
                dom: "Bfrtip",
                paging: false,
                "language": {
                    "search": "Buscar:",
                    "info": "Registros Totales _TOTAL_",
                    "Previous": "Anterior",
                },

                columns: [

                    {
                        data: 'Nombre',
                        render: function (data, type, row) {
                            return (row.Primer_Apellido + ' ' + row.Segundo_Apellido + ' ' + row.Primer_Nombre + ' ' + row.Segundo_Nombre);
                        }
                    },
                    {data: 'email'},
                    {data: 'username'},
                    {
                        data: 'email',
                        render: function (data, type, row) {
                            if (type === 'display') {
                                return '<a href="/FichaTecnica/' + btoa(row.id) + '/empelados" style="display: flex; flex-flow: row nowrap; justify-content: center;" class="btn btn-danger" title="Permisos Sistema"><i  class="fa fa-lock"></i> </a>'
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

                    },
                ],
            });

        })


    </script>
@endsection
