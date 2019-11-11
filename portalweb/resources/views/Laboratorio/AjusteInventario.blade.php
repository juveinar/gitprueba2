@extends('PageMaster')
@section('content')
    <style>
        hr {
            margin-top: -2px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #3c8dbc;
        }

        .prueba {
            border-radius: 11px 11px 11px 11px;
            -moz-border-radius: 11px 11px 11px 11px;
            -webkit-border-radius: 11px 11px 11px 11px;
            background-color: #0a0a0a1f;
            text-align: center;
        }
    </style>

    <div class="box-body" style="margin-top: -20px">
        <div class="col-lg-12">
            <h2 style="text-align: center">Ajuste De Inventario</h2>
        </div>

        <div class="col-lg-12 prueba">
            <div class="col-lg-12">
                <label>Tipo De Ajuste</label>
                <select class="labelform text-center" name="cambiar" id="cambiar">
                    <option selected="true" value="" disabled="disabled">Seleccione uno..</option>
                    @foreach( $TipInventarios as $TipInventario)
                        <option value="{{ $TipInventario->id }}"> {{ $TipInventario->TipoSalida_Ajuste }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="AjusteInventario" style="display: none; margin-top: 10px">
            <div class="">
                <div class="col-lg-12">
                    <h3>Ajuste Inventario</h3>
                </div>
                <form id="LecAjusteInventario" method="post">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" id="tokenAJ">
                    <input type="hidden" value="9" name="id_TipoSalidaAJ">
                    <div class="box box-body col-lg-12">

                        <div class="col-lg-12">
                            <div class="col-lg-4 ">
                                <label>Patinador</label>
                            </div>
                            <div class="" style="text-align: right">
                                <select class="labelform" required name="IdPatinador">
                                    @foreach($patinadores as $patinadore)
                                        <option value="{{ $patinadore->id }}">
                                            {{$patinadore->Primer_Nombre }}
                                            {{$patinadore->Segundo_Nombre }}
                                            {{$patinadore->Primer_Apellido}}
                                            {{$patinadore->Segundo_Apellido}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <div class="col-lg-4 ">
                                <label>Cuarto</label>
                                <select class="labelform form-control" required id="IDCuarto" name="IDCuarto">
                                    <option selected="true" value="" disabled="disabled">Seleccione Cuarto</option>
                                    @foreach( $cuartosAc as $cuartosAcv)
                                        <option value=" {{ $cuartosAcv->id }}"> {{ __('Cuarto') }} {{ $cuartosAcv->N_Cuarto }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 ">
                                <label>Estante</label>

                                <select class="labelform form-control" required id="IDEstante" name="IDEstante">

                                </select>

                            </div>

                            <div class="col-lg-4 ">
                                <label>Piso</label>

                                <select class="labelform form-control" id="IDPiso" required name="IDPiso">

                                </select>

                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <div class="col-lg-4 ">
                                <label>plantas</label>
                                <select class="labelform form-control" required name="CantPlantas">
                                    <option>25</option>
                                    <option>30</option>
                                    <option>50</option>
                                </select>
                            </div>


                            <div class="col-lg-4 ">
                                <label>Codigo de Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="Barcode" required name="Barcode">
                            </div>

                        </div>


                        <div id="ErrorDiv" class="col-lg-12 " style="margin-top: 10px; display: none">
                            <div class="col-lg-4 "></div>
                            <div class="alert-danger col-lg-4 " style="display: flex; justify-content:center; align-items: center;">
                                <label>ERROR BARCODE</label>
                            </div>
                            <div class="col-lg-4 "></div>
                        </div>

                        <div id="BarcodeYaleido" class="col-lg-12 " style="margin-top: 10px; display: none">
                            <div class="col-lg-4 "></div>
                            <div class="alert-danger col-lg-4 " style="display: flex; justify-content:center; align-items: center;">
                                <label>BARCODE YA FUE LEIDO</label>
                            </div>
                            <div class="col-lg-4 "></div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div id="RetornoInventario" style="display: none; margin-top: 5px">
            <div class="">
                <div class="col-lg-12">
                    <h3>Retorno Inventario</h3>
                </div>
                <form>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">

                    <div class="box box-body col-lg-12">

                        <div class="col-lg-12">
                            <div class="col-lg-4 ">
                                <label>Patinador</label>
                            </div>
                            <div class="" style="text-align: right">
                                <select class="labelform" required name="IdPatinador">
                                    @foreach($patinadores as $patinadore)
                                        <option value="{{ $patinadore->id }}">
                                            {{$patinadore->Primer_Nombre }}
                                            {{$patinadore->Segundo_Nombre }}
                                            {{$patinadore->Primer_Apellido}}
                                            {{$patinadore->Segundo_Apellido}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <div class="col-lg-4 ">
                                <label>Cuarto</label>
                                <select class="labelform form-control" required id="IDCuarto2" name="IDCuarto2">
                                    <option selected="true" value="" disabled="disabled">Seleccione Cuarto</option>
                                    @foreach( $cuartosAc as $cuartosAcv)
                                        <option value=" {{ $cuartosAcv->id }}"> {{ __('Cuarto') }} {{ $cuartosAcv->N_Cuarto }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 ">
                                <label>Estante</label>

                                <select class="labelform form-control" required id="IDEstante2" name="IDEstante2">

                                </select>

                            </div>

                            <div class="col-lg-4 ">
                                <label>Piso</label>

                                <select class="labelform form-control" id="IDPiso2" required name="IDPiso2">

                                </select>

                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <div class="col-lg-4 ">
                                <label>plantas</label>
                                <select class="labelform form-control" required name="CantPlantas">
                                    <option>25</option>
                                    <option>30</option>
                                    <option>50</option>
                                </select>
                            </div>


                            <div class="col-lg-4 ">
                                <label>Codigo de Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="Barcode" required name="Barcode">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="Traslado" style="display: none; margin-top: 10px">
            <div>
                <div class="col-lg-12">
                    <h3>Traslado</h3>
                </div>
                <form id="LecAjusteInventario" method="post" action="{{ route('LecAjusteInventario') }}">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" id="tokenT">
                    <input type="hidden" value="3" name="id_TipoSalidaT">
                    <div class="box box-body col-lg-12">
                        <div class="col-lg-12">
                            <div class="col-lg-4 ">
                                <label>Patinador</label>
                            </div>
                            <div class="" style="text-align: right">
                                <select class="labelform" required name="IdPatinadorT">
                                    @foreach($patinadores as $patinadore)
                                        <option value="{{ $patinadore->id }}">
                                            {{$patinadore->Primer_Nombre }}
                                            {{$patinadore->Segundo_Nombre }}
                                            {{$patinadore->Primer_Apellido}}
                                            {{$patinadore->Segundo_Apellido}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <div class="col-lg-4 ">
                                <label>Cuarto</label>
                                <select class="labelform form-control" required id="IDCuarto3" name="IDCuartoT3">
                                    <option selected="true" value="" disabled="disabled">Seleccione Cuarto</option>
                                    @foreach( $cuartosAc as $cuartosAcv)
                                        <option value=" {{ $cuartosAcv->id }}"> {{ __('Cuarto') }} {{ $cuartosAcv->N_Cuarto }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 ">
                                <label>Estante</label>
                                <select class="labelform form-control" required id="IDEstante3" name="IDEstanteT3">
                                </select>

                            </div>

                            <div class="col-lg-4 ">
                                <label>Piso</label>
                                <select class="labelform form-control" id="IDPiso3" required name="IDPisoT3">
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <div class="col-lg-4 ">
                                <label>Codigo de Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="BarcodeT" required name="BarcodeT">
                            </div>
                        </div>
                    </div>
                    <button style="display: none" type="submit">guardar</button>
                </form>
            </div>
        </div>

    </div>
    <form id="DatosLeidos">
        <div class="">

            <div class="box box-body col-lg-12">

                <div style="display: flex; justify-content:center; align-items: center;">
                    <h4>Ultima Lectura</h4>
                </div>
                <hr>

                <div class="col-lg-12">

                    <div class="col-lg-4">
                        <div class="col-lg-12">
                            <img src="{{ asset('img/BarCode.png') }}" height="25" width="25">
                            <label>Codigo Barras</label>
                            <input id="BarcodeLeido" class="labelform form-group" disabled>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="col-lg-12">
                            <img src="{{ asset('img/empleado.png') }}" height="25" width="25">
                            <label>Empleado</label>
                            <input class="labelform form-group" disabled>
                        </div>
                    </div>

                    <div class="col-lg-4 ">
                        <div class="col-lg-12">
                            <img src="{{ asset('img/empleado.png') }}" height="25" width="25">
                            <label>Patinador</label>
                            <input class="labelform form-group" id="patinadorFinal" disabled>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 ">

                    <div class="col-lg-4 ">
                        <div class="col-lg-12">
                            <img src="{{ asset('img/001-planta.png') }}" height="25" width="25">
                            <label>Variedad</label>
                            <input class="labelform form-group" disabled>

                        </div>
                    </div>

                    <div class="col-lg-4 ">
                        <div class="col-lg-12">
                            <img src="{{ asset('img/cantidad.png') }}" height="25" width="25">
                            <label>Cantidad</label>
                            <input class="labelform form-group" disabled>
                        </div>
                    </div>

                    <div class="col-lg-4 ">
                        <div class="col-lg-12">
                            <img src="{{ asset('img/counter.png') }}" height="25" width="25">
                            <label>Contador</label>
                            <input style="position: center; text-align: center;" placeholder="0" class="labelform form-group" id="count" disabled>
                        </div>
                    </div>
                </div>

                {{-- <span id="count"></span>--}}
                <audio id="error">
                    <source src="{{asset('sonido/alerta.mp3')}}" type="audio/ogg">
                </audio>


            </div>


        </div>
    </form>
    <script>

        $('#cambiar').change(function () {
            let valorCambiado = $(this).val();
            $('#DatosLeidos').trigger("reset");
            if (valorCambiado == 1) {
                $('#AjusteInventario').show();
                $('#RetornoInventario').hide();
                $('#Traslado').hide();

            } else if (valorCambiado == 2) {
                $('#AjusteInventario').hide();
                $('#RetornoInventario').show();
                $('#Traslado').hide();
            } else if (valorCambiado == 3) {
                $('#AjusteInventario').hide();
                $('#RetornoInventario').hide();
                $('#Traslado').show();
            }
        });


        let cout = 1;
        $('#IDCuarto').change(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': token},
                url: '/Cuarto/' + this.value + '/Cuarto',
                success: function (Result) {

                    $("#IDEstante").empty().selectpicker('destroy');
                    $.each(Result.Data, function (i, item) {
                        $("#IDEstante").append('<option value="' + item.id + '">' + item.N_Estante + '</option>');
                    });
                    $('#IDEstante').selectpicker({
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

        $('#IDEstante').change(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': token},
                url: '/Estante/' + this.value + '/Estante',
                success: function (Result) {

                    $("#IDPiso").empty().selectpicker('destroy');
                    $.each(Result.Data, function (i, item) {
                        $("#IDPiso").append('<option value="' + item.id + '">' + item.N_Nivel + '</option>');
                    });
                    $('#IDPiso').selectpicker({
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

        $('#IDCuarto2').change(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': token},
                url: '/Cuarto/' + this.value + '/Cuarto',
                success: function (Result) {

                    $("#IDEstante2").empty().selectpicker('destroy');
                    $.each(Result.Data, function (i, item) {
                        $("#IDEstante2").append('<option value="' + item.id + '">' + item.N_Estante + '</option>');
                    });
                    $('#IDEstante2').selectpicker({
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

        $('#IDEstante2').change(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': token},
                url: '/Estante/' + this.value + '/Estante',
                success: function (Result) {

                    $("#IDPiso2").empty().selectpicker('destroy');
                    $.each(Result.Data, function (i, item) {
                        $("#IDPiso2").append('<option value="' + item.id + '">' + item.N_Nivel + '</option>');
                    });
                    $('#IDPiso2').selectpicker({
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

        $('#IDCuarto3').change(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': token},
                url: '/Cuarto/' + this.value + '/Cuarto',
                success: function (Result) {

                    $("#IDEstante3").empty().selectpicker('destroy');
                    $.each(Result.Data, function (i, item) {
                        $("#IDEstante3").append('<option value="' + item.id + '">' + item.N_Estante + '</option>');
                    });
                    $('#IDEstante3').selectpicker({
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

        $('#IDEstante3').change(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': token},
                url: '/Estante/' + this.value + '/Estante',
                success: function (Result) {

                    $("#IDPiso3").empty().selectpicker('destroy');
                    $.each(Result.Data, function (i, item) {
                        $("#IDPiso3").append('<option value="' + item.id + '">' + item.N_Nivel + '</option>');
                    });
                    $('#IDPiso3').selectpicker({
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

        $('#LecAjusteInventario').submit(function (event) {
            event.preventDefault();
            let DatosEviados = $('#LecAjusteInventario').serialize();
            let barcode = $("#BarcodeT").val();
            let token = $('#tokenT').val();
            let cout = 1;
            if (barcode.length >= 6 && barcode.length <= 9) { //valido ancho tanto minimo como maximo
                $('#ErrorDiv').hide();//si es bien no muestre
                $('#BarcodeYaleido').hide();
                $("#BarcodeT").val('');//limpio campo
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},//toekn
                    data: DatosEviados,//datos que envio
                    url: '/LecAjusteInventario',//ruto post
                    type: 'post',
                    success: function (Result) {//que si la respuesa esta bien la guarde en result
                        //console.log(Result);// si aqui lo muestra jaja
                        if (Result.data === 1) {
                            $('#BarcodeYaleido').hide();//si es bien no muestre
                            $('#BarcodeLeido').css('border-color', '');
                            $('#BarcodeLeido').val(Result.barcode);
                            /*$('#patinadorFinal').val(Result.consulta.Primer_Nombre + ' ' + Result.consulta.Segundo_Nombre + ' ' + Result.consulta.Primer_Apellido + ' ' + Result.consulta.Segundo_Apellido);*/
                            $('#count').val(cout);
                            cout++;
                        } else if (Result.data === 2) {
                            swal("Error!", "CODIGO NO HA SIDO INGRESADO", "error");
                        } else {
                            $('#BarcodeLeido').css('border-color', 'red');
                            $('#BarcodeYaleido').show();
                            $('#ErrorDiv').hide();
                            $('#error')[0].play();
                        }
                    }
                });
                return true;
            } else {
                $(document).ready(function () {
                    $('#error')[0].play();
                    $('#ErrorDiv').show();
                    $('#BarcodeYaleido').hide();
                    $("#BarcodeT").val('');
                    $("#BarcodeT").css('border-color', 'red');

                });
                return false;
            }
        });

        function justNumbers(e) {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;

            return /\d/.test(String.fromCharCode(keynum));
        }

    </script>

    <script>

    </script>
@endsection
