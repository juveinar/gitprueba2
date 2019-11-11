@extends('PageMaster')

@section('content')
    <style>
        hr {
            margin-top: -2px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #3c8dbc;
        }
    </style>

    <div class="box box-primary col-lg-12">
        <div class="col-lg-12">
            <div style="margin-top:10px; display: flex; justify-content:center; align-items: center;">
                <h3>DETALLE PEDIDO # {{ $detallePedidoc->NumeroPedido }}</h3>
            </div>
            <hr>
        </div>

        <div class="col-lg-12">

            <div class="col-lg-6"></div>

            <div class="col-lg-3">
                <div class="col-lg-12">
                    <label class="col-lg-5">Numero Pedido</label>
                    <div class="col-lg-7">
                        <input class="labelform  form-control" value="{{  $detallePedidoc->NumeroPedido }}" disabled/>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="col-lg-12">
                    <label class="col-lg-4">Estado Pedido</label>
                    <div class="col-lg-8">
                        <input class="labelform  form-control" value="{{  $detallePedidoc->EstadoDocumento }}" disabled/>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">

            <div class="col-lg-6">
                <div class="col-lg-12">
                    <label class="col-lg-2">Cliente</label>
                    <div class="col-lg-10">
                        <input value="{{ $detallePedidoc->NombreCliente }}" disabled class="form-control labelform">
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="col-lg-12">
                    <label class="col-lg-4">Semana Entrega</label>
                    <div class="col-lg-8">
                        <input class="labelform  form-control" value="{{  $detallePedidoc->SemanaEntrega }}" disabled/>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="col-lg-12">
                    <label class="col-lg-5">Semana Creado</label>
                    <div class="col-lg-7">
                        <input class="labelform  form-control" value="{{  $detallePedidoc->SemanaCreacion }}" disabled/>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="col-lg-12" style="margin-top: 10px;display: flex; justify-content:center; align-items: center;">
                <h2> variedad solicitadas</h2>
            </div>
            <div class="col-lg-12">
                <div class="table table-responsive ">
                    <table class="table table-hover" id="TablaDetallesPedido">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Variedad</th>
                            <th>Cantidad Inical</th>
                            <th>Cantidad Final</th>
                            <th>Semana Solicitada</th>
                            <th>Semana Confirmada</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($count = 1)
                        @forelse($detallePedidoD as $detallePedidoDs)
                            <tr>
                                <td width="2%"> {{ $count }}</td>
                                <td width="20%"> {{ $detallePedidoDs->Nombre_Variedad }}</td>
                                <td width="15%"> {{ $detallePedidoDs->CantidadInicial }}</td>
                                <td width="12%">
                                    <input type="number" class="labelform col-lg-12" id="CantidadConfirmada">
                                </td>
                                <td width="15%">
                                    @if($detallePedidoDs->SemanaEntrega =='N/A')
                                        <label style="color: red">{{ $detallePedidoDs->SemanaEntrega }}</label>
                                    @else
                                        {{ $detallePedidoDs->SemanaEntrega }}
                                    @endif

                                </td>
                                <td width="20%">
                                    <input type="week" class="labelform" id="SemanaConFirmacion">
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" data-placement="left" data-toggle="tooltip" data-html="true" onclick="CancelarVariedad({{  json_encode($detallePedidoDs)}})" title="<em></em> <u>Cancelar</u><b></b>" style="position: center"><i class="fa fa-remove"></i></a>

                                    <button class="btn btn-primary btn-round btn-sm" type="button" id="addRow" onclick="AgregarFila({{  json_encode($detallePedidoDs)}},{{ $count }})">
                                        <i data-toggle="tooltip" title="Edita Asignatura" class="fa fa-edit"></i>
                                    </button>
                                </td>

                            </tr>
                            @php($count++)
                        @empty
                            <div class="alert alert-warning">
                                <strong>No se encontraron datos</strong>
                            </div>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="col-lg-11">
                <div class="form-group">
                    <label for="Observaciones" for="name" class="col-form-label text-md-right">{{ __('Observaciones') }}</label>
                    <input id="Observaciones" class="form-control labelform" name="Observaciones" value="{{ $detallePedidoc->Observaciones }}" disabled/>

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

    </div>

    <script>

        $(document).ready( function () {
            $('#TablaDetallesPedido').DataTable({
                //aqui

                /*dom: '<"top"i>rt<"bottom"flp><"clear">',*/
                /*  dom: "Bfrtip",*/
                paging: false,
                info: false,
                searching: false,
                "language": {

                    "info": "Mostrando Página _PAGE_ de _PAGES_, Registros _TOTAL_",
                    "Previous": "Anterior",
                },


            });
        })

        function CancelarVariedad(Datos) {

            $("#SemanaConFirmacion").attr('disabled', 'disabled');
            $("#CantidadConfirmada").attr('disabled', 'disabled');
        }


        function AgregarFila(Datos, Count) {
            $('#addRow').attr("disabled", true);
            $("#SemanaConFirmacion").attr('disabled', 'disabled');
            $("#CantidadConfirmada").attr('disabled', 'disabled');
            let countRow = 1;
            console.log(Count);
            console.log(Datos);
            let variedad = Datos.Nombre_Variedad;
            let CantidadIn = Datos.CantidadInicial;
            $('#variedadAs').val(variedad);
            $('#Cantidad').val(CantidadIn);

            var tbHtml = '';
            tbHtml +=
                '<tr>' +
                '<td>' + 'Item' + '</td>' +
                '<td>' + 'Variedad' + '</td>' +
                '<td>' + 'Cantidad' + '</td>' +
                '<td>' + 'semana' + '</td>' +
                '</tr>' +

                '<tr>' +
                '<td>' + Count + '.' + countRow + '</td>' +
                '<td>' + '<input type="text" id="variedadAs" disabled/>' + '</td>' +
                '<td>' + '<input type="number" id="Cantidad" />' + '</td>' +
                '<td>' + '<input type="week"/>' + '</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>';
            countRow++;

            $('#TablaDetallesPedido').append(tbHtml);
        }

    </script>
@endsection
