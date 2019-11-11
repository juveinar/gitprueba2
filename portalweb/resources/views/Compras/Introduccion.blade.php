@extends('PageMaster')
@section('content')
    <div class="col-lg-12">
        <div class="col-lg-12 box box-body">
            <form id="NewIntroduccion" method="POST" action="{{ route('NewIntroduccion') }}">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                <div class="box box-default">
                    <h3>Nueva Introducion</h3>
                </div>
                <div class="col-lg-12">

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="" class="col-form-label text-md-right">{{ __('Cantidad') }}</label>
                            <input type="number" name="Cantidad" min="1" id="Cantidad" class="form-control labelform">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="cliente" class="col-form-label">{{ __('Genero\Variedad') }}</label>
                            <select class="form-control labelform" name="IDVariedad" id="IDVariedad">
                                <option selected="true" value="" disabled="disabled">Seleccione.....</option>
                                @foreach($variedades as $variedad)
                                    <option value="{{ $variedad->id }}">{{ $variedad->NombreGenero }}/{{ $variedad->Nombre_Variedad }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="cliente" class="col-form-label">{{ __('Cliente') }}</label>
                            <select class="form-control labelform" name="id_cliente" id="id_cliente">
                                <option selected="true" value="" id="select" disabled="disabled">Seleccione.....</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"> {{ $cliente->NombreCliente }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="cliente" class="col-form-label">{{ __('Tipo Contenedor') }}</label>
                            <select class="form-control labelform" name="IDContenedor" id="IDContenedor">
                                <option selected="true" value="" disabled="disabled">Seleccione.....</option>
                                @foreach($contenedores as $contenedor)
                                    <option value="{{ $contenedor->id }}"> {{ $contenedor->TipoContenedor }}X{{ $contenedor->Cantidad }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-top: 20px">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button class="btn btn-success  btn-block" id="CrearRegistro" type="button">Cargar</button>
                        </div>
                        <div class="col-lg-3" style="margin-top: 10px"></div>
                    </div>
                </div>

                <div class="col-lg-12" style="margin-top: 10px">
                    <div class="table table-responsive">
                        <table class="table table-hover table table-striped table-bordered" id="TablaIntroduccion">
                            <thead>
                            <tr>
                                <td>item</td>
                                <td>cliente</td>
                                <td>Variedad</td>
                                <td>Cantidad</td>
                                <td>Contenedor</td>
                                <td>Eliminar</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="col-lg-12" style="margin-top: 20px">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <button class="btn btn-success  btn-block" type="submit">Guardar</button>
                    </div>
                    <div class="col-lg-3" style="margin-top: 10px"></div>
                </div>
            </form>

            <form id="procedimiento" method="get" action="{{ route('procedimiento') }}">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                <button class="btn btn-success  btn-block" type="submit">Guardar</button>
            </form>
        </div>
    </div>


    <script>
        let array = [];
        let countRow = 0;
        let countRowD = 1;
        $(document).ready(function () {
            let token = $('#token').val();
            $("#CrearRegistro").click(function () {
                let Variedad = $('#IDVariedad').val();
                let Cantidad = $('#Cantidad').val();
                let Cliente = $('#id_cliente').val();
                let Contenedor = $('#IDContenedor').val();

                let nameVariedad = $('select[name="IDVariedad"] option:selected').text();
                let NameCliente = $('select[name="id_cliente"] option:selected').text();
                let NameContenedor = $('select[name="IDContenedor"] option:selected').text();


                let add = '<tbody>' +
                    '<tr>' +
                    '<td style="text-align: center">' + countRowD + '</td>' +
                    '<td>' + NameCliente + '</td>' +
                    '<td>' + nameVariedad + '</td>' +
                    '<td style="text-align: center">' + Cantidad + '</td>' +
                    '<td style="text-align: center">' + NameContenedor + '</td>' +
                    '<td style="text-align: center"><a class="btn btn-danger" title="Eliminar" onclick="EliminarFila(this,' + countRow + ')" style="position: center"><i class="fa fa-remove"></i></a></td>' +
                    '</tr>' +
                    '</tbody>';

                if (NameCliente === null) {
                    swal("seleccione Cliente")
                } else if (NameCliente === 'Seleccione.....') {
                    swal("seleccione Cliente")
                } else if (nameVariedad === 'Seleccione.....') {
                    swal("seleccione Variedad")
                } else if (nameVariedad === null) {
                    swal("seleccione Variedad")
                } else if (NameContenedor === 'Seleccione.....') {
                    swal("seleccione Contenedor")
                } else if (NameContenedor === null) {
                    swal("seleccione Contenedor")
                } else if (Cantidad <= 0) {
                    swal("Cantidad Incorrecta")

                } else {

                    if(Cliente.length >0){
                        $($('#id_cliente')).attr('disabled', true)
                    }

                    $('#TablaIntroduccion').append(add);
                    $('#Cantidad').val('');
                    //$('#id_cliente').val($('#select').val());
                    $('#IDVariedad').val($('#select').val());
                    $('#IDContenedor').val($('#select').val());
                    array[countRow] = {Variedad, Cantidad, Cliente, Contenedor};
                    countRow++;
                    countRowD++;

                }
            });

            $('#NewIntroduccion').submit(function (event) {
                event.preventDefault();
                let token = $('#token').val();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},
                    dataType: 'json',
                    data: {array},//{datosformulario:{dataString},datostabla:array},//datos que envi
                    url: '/NewIntroduccion',
                    type: 'POST',
                    success: function (Result) {
                        if (Result.data === 1) {//valida si viene lleno .data lo trae desde el controlador
                            $("#NewIntroduccion")[0].reset();//limpio formulario
                            swal("", "Guardado Exitosamente.", "success");

                        } else {
                            swal("", "Revise la informacion algo salio mal.", "error");
                        }

                    }
                });
            });


        });

        function EliminarFila(v, fila) {
            $(v).closest('tr').remove();
            array.splice(fila, 1);
            $(v).deleteRow();
        }

    </script>
@endsection
