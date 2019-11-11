@extends('PageMaster')

@section('content')
    <style>
        hr {
            margin-top: -2px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #3c8dbc;
        }

        table thead {
            color: #fff;
            background-color: #337ab7;
            text-align: center;
        }

        .divborderdetalle {
            border-radius: 10px 10px 10px 10px;
            -moz-border-radius: 10px 10px 10px 10px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border: 2px solid #3c8dbc;
        }

        .div1 {
            overflow: scroll;
            height: 390px;
            width: 850px;
        }

    </style>
    <div class="col-lg-12">
        <!--Pestañas-->
        <div id="tabs" class="col-lg-12 box box-body">
            <ul>
                @can('VerGenerarPedido')
                    <li><a href="#GenerarPedido"><span>Generar Pedido</span></a></li>
                @endcan
                @can('VerListaPedidos')
                    <li><a href="#OrdenesPedido"><span>Ordenes de Pedido</span></a></li>
                @endcan
            </ul>
            @can('VerGenerarPedido')
                <div id="GenerarPedido">
                    <form id="CrearPedidoPre" method="POST" action="{{ route('PedidoPreConfirmado') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cliente" class="col-form-label">{{ __('Cliente') }}</label>
                                    <select class="form-control labelform" required="required" name="id_cliente" id="id_cliente">
                                        <option selected="true" value="" disabled="disabled">Seleccione.....</option>
                                        @foreach($ClientesAct as $ClientesActs)
                                            <option value="{{ $ClientesActs->id }}"> {{ $ClientesActs->Nombre }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label text-md-right">{{ __('Semana Sugerida ') }}<i class="glyphicon glyphicon-calendar"></i></label>
                                    <input type="week" onchange="Fechas()" name="Semana" id="Semana" class="form-control labelform">

                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label text-md-right">{{ __('Numero Pedido') }}</label>
                                    <input type="text" class="form-control labelform" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 " style="margin-top: 30px">
                            <div class="col-lg-4 divborderdetalle">
                                <div style="margin-top: 10px">
                                    <div class="col-lg-12">
                                        <label>Variedad</label>
                                        <select class="form-control selectpicker" id="Variedad" name="Variedad" data-live-search="true">
                                            <option selected="true" value="" disabled="disabled">Seleccione.....</option>
                                            @foreach( $Variedades as $variedades)
                                                <option value="{{ $variedades->id }}">{{ $variedades->NombreGenero }}/{{ $variedades->Nombre_Variedad }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Tipo Entrega</label>
                                        <select class="form-control selectpicker" id="TipoEntrega">
                                            <option selected="true" value="" disabled="disabled">Seleccione.....</option>
                                            <option value="Invitro">Invitro</option>
                                            <option value="Adaptado">Adaptado</option>
                                            <option value="Exagar">Exagar</option>
                                            <option value="Giffy">Giffy</option>
                                            <option value="Clumps">Clumps</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12" style="margin-top: 10px">
                                        <div class="form-group">
                                            <label for="" class="col-form-label text-md-right">{{ __('Semana') }}</label>
                                            <input type="week" class="form-control labelform" id="SemanaV" name="SemanaV">
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-top: 10px">
                                        <div class="form-group">
                                            <label for="" class="col-form-label text-md-right">{{ __('Cantidad') }}</label>
                                            <input type="number" class="form-control labelform" min="1" id="Cantidad" autocomplete="off">
                                        </div>
                                    </div>


                                    <div class="col-lg-12" style="margin-top: 10px">

                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary  btn-lg btn-block" type="button" id="CrearRegistro">Generar</button>
                                        </div>
                                        <div class="col-lg-3" style="margin-top: 10px"></div>
                                    </div>

                                    <div class="col-lg-12" style="margin-top: 30px"></div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="table table-responsive div1">
                                    <table class="table table-hover table table-striped table-bordered" id="tableRegistroOdenes">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Variedad</th>
                                            <th>Tipo Entrega</th>
                                            <th>Cantidad</th>
                                            <th>Semana</th>
                                            <th>Eliminar</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="comment">Observaciones:</label>
                                    <textarea class="form-control" rows="2" id="Observaciones" style="resize:none;" required="required" name="Observaciones"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12" style="margin-top: 20px">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button class="btn btn-success  btn-lg btn-block" type="submit">Guardar</button>
                            </div>
                            <div class="col-lg-3" style="margin-top: 10px"></div>
                        </div>
                    </form>

                </div>
            @endcan

            @can('VerListaPedidos')
                <div id="OrdenesPedido">

                    <div class="col-lg-12">

                        <div class="col-md-12 col-lg-12 col-xs-12" style="margin-top: 10px"></div>

                        <div class="col-md-12 col-lg-12 col-xl-12" style="margin-top: -15px;">

                            <label>Ordenes De Pedido</label>

                            <div class="table table-responsive " style="height: 480px">
                                <table class="table table-hover" id="OrdenesPedidos">
                                    <thead>
                                    <tr>
                                        {{-- <th>Item</th>--}}
                                        <th>Numero de Orden</th>
                                        <th>Cliente</th>
                                        <th>Semana Entrega</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($count=1)
                                    @forelse($Pedidos as $Pedido)
                                        <tr>
                                            {{-- <td>{{ $count }}</td>--}}
                                            <td>{{ $Pedido->NumeroPedido }}</td>
                                            <td>{{ $Pedido->Nombre }}</td>
                                            <td>{{ $Pedido->SemanaEntrega }}</td>
                                            <td>{{ $Pedido->EstadoDocumento }}</td>
                                            <td>
                                                @if($Pedido->EstadoDocumento =='Preconfirmado')
                                                    <a onclick="vistadetalles('{{ $Pedido->id }}')" class="btn btn-warning" data-placement="left" data-toggle="tooltip" data-html="true" title="<em></em> <u>Ver Detalles</u><b></b>" style="position: center"><i class="fa fa-check"></i> </a>
                                                @elseif($Pedido->EstadoDocumento =='Confirmado')
                                                    <a onclick="vistadetalles('{{ $Pedido->id }}')" class="btn btn-primary" data-placement="left" data-toggle="tooltip" data-html="true" title="<em></em> <u>Ver Detalles</u><b></b>" style="position: center"><i class="fa fa-check"></i> </a>
                                                @elseif($Pedido->EstadoDocumento =='Aceptado')
                                                    <a onclick="vistadetalles('{{ $Pedido->id }}')" class="btn btn-success" data-placement="left" data-toggle="tooltip" data-html="true" title="<em></em> <u>Ver Detalles Aceptados</u><b></b>" style="position: center"><i class="fa fa-check"></i> </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @php($count++)
                                    @empty
                                        <div class="alert alert-danger">No Hay Datos</div>

                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>

    </div>

    <script>
        function Fechas() {
            let SemanaCabeza = $('#Semana').val();
            $('#SemanaV').val(SemanaCabeza);

            var cadena = "2019-W15",
                separador = "-W", // un espacio en blanco
                limite = 2,
                arregloDeSubCadenas = cadena.split(separador, limite);

            console.log(arregloDeSubCadenas); // la consola devolverá: ["cadena", "de"]
        }

        let array = [];
        let countRow = 0;
        let countRowD = 1;


        $(document).ready(function () {
            let token = $('#token').val();
            $("#CrearRegistro").click(function () {
                let Variedad = $('#Variedad').val();
                let Cantidad = $('#Cantidad').val();
                let TEntrega = $('#TipoEntrega').val();
                let Semana = $('#SemanaV').val();
                let nameVariedad = $('select[name="Variedad"] option:selected').text();
                let Fecha;

                if (Semana === '') {
                    Fecha = 'N/A'
                } else {
                    var separador = "-W", // un espacio en blanco
                        arregloDeSubCadenas = Semana.split(separador)[0],
                        arregloDeSubCadenass = Semana.split(separador)[1];

                    Fecha = arregloDeSubCadenas + '' + arregloDeSubCadenass;
                }

                let add = '<tbody>' +
                    '<tr>' +
                    '<td style="text-align: center">' + countRowD + '</td>' +
                    '<td>' + nameVariedad + '</td>' +
                    '<td>' + TEntrega + '</td>' +
                    '<td style="text-align: center">' + Cantidad + '</td>' +
                    '<td style="text-align: center">' + Fecha + '</td>' +
                    '<td style="text-align: center"><a class="btn btn-danger" title="Eliminar" onclick="EliminarFila(this,' + countRow + ')" style="position: center"><i class="fa fa-remove"></i></a></td>' +
                    '</tr>' +
                    '</tbody>';

                if (Variedad === null) {
                    swal("Debes diligenciar variedad")
                } else if (Cantidad === '') {
                    swal("Debes diligenciar Cantidad")
                } else if (Cantidad <= 0) {
                    swal("La cantidad debe ser mayor a 0")
                } else if (TEntrega === null) {
                    swal("Debes diligenciar el tipo de Entrega")
                }/* else if (Semana === '') {
                    swal("Debes diligenciar semana")
                } */ else {
                    $('#tableRegistroOdenes').append(add);
                    $('#Cantidad').val('');
                    array[countRow] = {Variedad, Cantidad, TEntrega, Fecha};
                    countRow++;
                    countRowD++;

                }
            });

            $('#CrearPedidoPre').submit(function (event) { //este es el id del form
                    event.preventDefault();
                    let token = $('#token').val();
                    let dataform = {
                        id_cliente: $('#id_cliente').val(),
                        Semana: $('#Semana').val(),
                        Observaciones: $('#Observaciones').val(),
                    };
                    if (dataform.Semana === '') {
                        swal({
                                title: "Dato Incompleto",
                                text: "Esta Generando un Pedido sin Semana de Entrega",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Si, Guardar Sin Semana!",
                                cancelButtonText: "No, Asignar Semana",
                                closeOnConfirm: false,
                                closeOnCancel: false
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    {
                                        $.ajax({
                                            headers: {'X-CSRF-TOKEN': token},
                                            dataType: 'json',
                                            data: {dataform, array},//{datosformulario:{dataString},datostabla:array},//datos que envi
                                            url: '/PedidoPreConfirmado',
                                            type: 'post',
                                            success: function (Result) {
                                                if (Result.data === 1) {//valida si viene lleno .data lo trae desde el controlador
                                                    // console.log(Result.data);
                                                    //console.log(Result.data.NumeroPedido);
                                                    $("#CrearPedidoPre")[0].reset();//limpio formulario
                                                    swal("", "Guardado Exitosamente.", "success");
                                                    //window.location.href='prueba/'+Result.cabeza.NumeroPedido;
                                                    setInterval("actualizar()", 1500);
                                                    //setInterval("actualizar()", 1500);
                                                } else {
                                                    swal("", "Revise la informacion algo salio mal.", "error");
                                                }

                                            }
                                        });
                                    }
                                } else {
                                    swal("", "Asignar Semana", "success");
                                }
                            });
                    } else {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': token},
                            dataType: 'json',
                            data: {dataform, array},//{datosformulario:{dataString},datostabla:array},//datos que envi
                            url: '/PedidoPreConfirmado',
                            type: 'post',
                            success: function (Result) {
                                if (Result.data === 1) {//valida si viene lleno .data lo trae desde el controlador
                                    $("#CrearPedidoPre")[0].reset();//limpio formulario
                                    swal("", "Guardado Exitosamente.", "success");
                                    //window.location.href='prueba/'+Result.cabeza.NumeroPedido;
                                    setInterval("actualizar()", 1500);

                                } else {
                                    swal("", "Revise la informacion algo salio mal.", "error");
                                }

                            }
                        });
                    }
                }
            );

            table = $('#OrdenesPedidos').DataTable({
                //aqui

                /*dom: '<"top"i>rt<"bottom"flp><"clear">',*/
                /*  dom: "Bfrtip",*/
                paging: false,
                info: false,
                "language": {
                    "search": "Buscar:",
                    "info": "Mostrando Página _PAGE_ de _PAGES_, Registros _TOTAL_",
                    "Previous": "Anterior",
                },


            });


        });

        function actualizar() {
            location.reload(true);
        }

        function vistadetalles(id) {
            window.location.href = '/Orden/%&$' + btoa(id) + '/pedido/Detalle/';
        }

        function EliminarFila(v, fila) {
            $(v).closest('tr').remove();
            array.splice(fila, 1);
            $(v).deleteRow();
        }


    </script>

@endsection
