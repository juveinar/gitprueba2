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
            <h2 style="text-align: center">Lectura Salida</h2>
        </div>

        <div class="col-lg-12 prueba">
            <div class="col-lg-12">
                <label>Tipo De Salida</label>
                <select class="labelform text-center" name="cambiar" id="cambiar">
                    <option selected="true" value="" disabled="disabled">Seleccione uno..</option>
                    @foreach($TipSalidas as $TipSalida)
                        <option value="{{ $TipSalida->id }}"> {{ $TipSalida->TipoSalida_Ajuste }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="Cancelado" style="display: none; margin-top: 10px">
            <div>
                <div>
                    <h2 style="text-align: center">Cancelacion</h2>
                </div>
                <div class="box box-body col-lg-12">
                    <form id="SalidaXCancelacion" method="post" action="{{ route('SalidaXCancelacion') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="tokenc">
                        <input type="hidden" value="4" name="id_TipoSalidaC">
                        <div class="col-lg-12">
                            <div class="col-lg-4 ">
                                <label>Patinador</label>
                            </div>
                            <div class="" style="text-align: right">
                                <select class="labelform" required name="IdPatinadorC">
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


                        <div class="col-lg-12" style="margin-top: 5px">
                            <div class="col-lg-6 ">
                                <label>Tipo Cancelacion</label>
                                <select class="labelform form-control" name="idCausalDañoC">
                                    @foreach( $causales as $causale)
                                        <option value="{{ $causale->id }}"> {{ $causale->CausalDescarte }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Codigo Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="BarcodeC" required name="BarcodeC">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="DañoMaterial" style="display: none; margin-top: 10px">
            <div>
                <div>
                    <h2 style="text-align: center">Daño Material</h2>
                </div>
                <div class="box box-body col-lg-12">
                    <form id="SalidaXDañoMaterial" method="post" action="{{ route('SalidaXDañoMaterial') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="tokendm">
                        <input type="hidden" value="5" name="id_TipoSalidadm">
                        <div class="col-lg-12">
                            <div class="col-lg-4 ">
                                <label>Patinador</label>
                            </div>
                            <div class="" style="text-align: right">
                                <select class="labelform" required name="IdPatinadordm">
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


                        <div class="col-lg-12" style="margin-top: 5px">
                            <div class="col-lg-6 ">
                                <label>Tipo Daño</label>
                                <select class="labelform form-control" name="id_TipoDañodm">
                                    @foreach( $causales as $causale)
                                        <option value="{{ $causale->id }}"> {{ $causale->CausalDescarte }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Codigo Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="Barcodedm" required name="Barcodedm">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="Despacho" style="display: none; margin-top: 10px">
            <div>
                <div>
                    <h2 style="text-align: center">Despacho</h2>
                </div>
                <div class="box box-body col-lg-12">
                    <form id="SalidaXDespacho" method="post" action="{{ route('SalidaXDespacho') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="tokend">
                        <input type="hidden" value="6" name="id_TipoSalida_d">
                        <div class="col-lg-12" style="margin-top: 5px">
                            <div class="col-lg-6 ">
                                <label>Patinador</label>
                                <select class="labelform form-control" name="idPatinadorD">
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
                            <div class="col-lg-6">
                                <label>Codigo Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="Barcoded" required name="Barcoded">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="Invernadero" style="display: none; margin-top: 10px">
            <div>
                <div>
                    <h2 style="text-align: center">Invernadero</h2>
                </div>
                <div class="box box-body col-lg-12">
                    <form id="SalidaAInvernadero" method="post" action="{{ route('SalidaAInvernadero') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="tokenIn">
                        <input type="hidden" value="7" name="id_TipoSalidaIn">
                        <div class="col-lg-12" style="margin-top: 5px">
                            <div class="col-lg-6 ">
                                <label>Patinador</label>
                                <select class="labelform form-control" name="idPatinadorIn">
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
                            <div class="col-lg-6">
                                <label>Codigo Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="BarcodeIn" required name="BarcodeIn">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="Produccion" style="display: none; margin-top: 10px">
            <div>
                <div>
                    <h2 style="text-align: center">Produccion</h2>
                </div>
                <div class="box box-body col-lg-12">
                    <form id="SalidaAProduccion" method="post" action="{{ route('SalidaAProduccion') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="tokenp">
                        <input type="hidden" value="8" name="id_TipoSalidap">
                        <div class="col-lg-12" style="margin-top: 5px">
                            <div class="col-lg-6 ">
                                <label>Patinador</label>
                                <select class="labelform form-control" name="idPatinadorP">
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
                            <div class="col-lg-6">
                                <label>Codigo Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="BarcodeP" required name="BarcodeP">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="Sobrantes" style="display: none; margin-top: 10px">
            <div>
                <div>
                    <h2 style="text-align: center">Sobrantes</h2>
                </div>
                <div class="box box-body col-lg-12">
                    <form id="SalidaXsobrantes" method="post" action="{{ route('SalidaXsobrantes') }}">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="tokenS">
                        <input type="hidden" value="9" name="id_TipoSalidaS">
                        <div class="col-lg-12" style="margin-top: 5px">
                            <div class="col-lg-6 ">
                                <label>Patinador</label>
                                <select class="labelform form-control" name="idPatinadorS">
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
                            <div class="col-lg-6">
                                <label>Codigo Barras</label>
                                <input type="text" class="labelform form-control" autocomplete="off" id="BarcodeS" required name="BarcodeS">
                            </div>
                        </div>
                    </form>
                </div>
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

    <div class="">
            <div class="box box-body col-lg-12">
                <div style="margin-top:-15px; display: flex; justify-content:center; align-items: center;">
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
                            <input id="EmpleadoL" class="labelform form-group" disabled>
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
                            <input id="VarLei" class="labelform form-group" disabled>

                        </div>
                    </div>

                    <div class="col-lg-4 ">
                        <div class="col-lg-12">
                            <img src="{{ asset('img/cantidad.png') }}" height="25" width="25">
                            <label>Cantidad</label>
                            <input id="Cantidalei" class="labelform form-group" disabled>
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

    <script>
        let cout = 1;
        let cout1 = 1;
        $('#cambiar').change(function () {
            let valorCambiado = $(this).val();
            $('#DatosLeidos').trigger("reset");
            if (valorCambiado === '5') {

                $('#DañoMaterial').show();
                $('#Despacho').hide();
                $('#Cancelado').hide();
                $('#Invernadero').hide();
                $('#Produccion').hide();
                $('#Sobrantes').hide();
            } else if (valorCambiado === '6') {

                $('#DañoMaterial').hide();
                $('#Despacho').show();
                $('#Cancelado').hide();
                $('#Invernadero').hide();
                $('#Produccion').hide();
                $('#Sobrantes').hide();
            } else if (valorCambiado === '4') {

                $('#DañoMaterial').hide();
                $('#Despacho').hide();
                $('#Cancelado').show();
                $('#Invernadero').hide();
                $('#Produccion').hide();
                $('#Sobrantes').hide();
            } else if (valorCambiado === '7') {

                $('#DañoMaterial').hide();
                $('#Despacho').hide();
                $('#Cancelado').hide();
                $('#Invernadero').show();
                $('#Produccion').hide();
                $('#Sobrantes').hide();
            } else if (valorCambiado === '8') {

                $('#DañoMaterial').hide();
                $('#Despacho').hide();
                $('#Cancelado').hide();
                $('#Invernadero').hide();
                $('#Produccion').show();
                $('#Sobrantes').hide();
            } else if (valorCambiado === '9') {

                $('#DañoMaterial').hide();
                $('#Despacho').hide();
                $('#Cancelado').hide();
                $('#Invernadero').hide();
                $('#Produccion').hide();
                $('#Sobrantes').show();
            }
        });

        $('#SalidaXCancelacion').submit(function (event) {
            event.preventDefault();
            let DatosEviados = $('#SalidaXCancelacion').serialize();//paso todos los datos del for a una variable
            let barcode = $("#BarcodeC").val();//asigno input a una variable para validar
            let token = $('#tokenc').val();//valido el token

            if (barcode.length >= 6 && barcode.length <= 9) { //valido ancho tanto minimo como maximo
                $('#ErrorDiv').hide();//si es bien no muestre
                $('#BarcodeYaleido').hide();
                $("#BarcodeC").val('');//limpio campo

                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},//toekn
                    data: DatosEviados,//datos que envio
                    url: '/SalidaXCancelacion',//ruto post
                    type: 'post',
                    success: function (Result) {//que si la respuesa esta bien la guarde en result
                        //console.log(Result.consulta);// si aqui lo muestra jaja
                        if (Result.data === 1) {
                            $('#BarcodeYaleido').hide();//si es bien no muestre
                            $('#BarcodeLeido').css('border-color', '');
                            $('#BarcodeLeido').val(Result.barcode);
                            $('#patinadorFinal').val(Result.consulta[0].Primer_Nombre + ' ' + Result.consulta[0].Segundo_Nombre + ' ' + Result.consulta[0].Primer_Apellido + ' ' + Result.consulta[0].Segundo_Apellido);
                            $('#VarLei').val(Result.consulta[1].Nombre_Variedad);
                            $('#Cantidalei').val(Result.consulta[1].CantContenedor);
                            $('#EmpleadoL').val(Result.consulta[2].Primer_Nombre + ' ' + Result.consulta[2].Segundo_Nombre + ' ' + Result.consulta[2].Primer_Apellido + ' ' + Result.consulta[2].Segundo_Apellido);
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
                    $("#BarcodeC").val('');
                    $("#BarcodeC").css('border-color', 'red');

                });
                return false;
            }
        });

        $('#SalidaXDañoMaterial').submit(function (event) {
            event.preventDefault();
            let DatosEviados = $('#SalidaXDañoMaterial').serialize();
            let barcode = $("#Barcodedm").val();
            let token = $('#tokendm').val();

            if (barcode.length >= 6 && barcode.length <= 9) { //valido ancho tanto minimo como maximo
                $('#ErrorDiv').hide();//si es bien no muestre
                $('#BarcodeYaleido').hide();
                $("#Barcodedm").val('');//limpio campo

                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},//toekn
                    data: DatosEviados,//datos que envio
                    url: '/SalidaXDañoMaterial',//ruto post
                    type: 'post',
                    success: function (Result) {//que si la respuesa esta bien la guarde en result
                        //console.log(Result);// si aqui lo muestra jaja
                        if (Result.data === 1) {
                            $('#BarcodeYaleido').hide();//si es bien no muestre
                            $('#BarcodeLeido').css('border-color', '');
                            $('#BarcodeLeido').val(Result.barcode);
                            $('#patinadorFinal').val(Result.consulta[0].Primer_Nombre + ' ' + Result.consulta[0].Segundo_Nombre + ' ' + Result.consulta[0].Primer_Apellido + ' ' + Result.consulta[0].Segundo_Apellido);
                            $('#VarLei').val(Result.consulta[1].Nombre_Variedad);
                            $('#Cantidalei').val(Result.consulta[1].CantContenedor);
                            $('#EmpleadoL').val(Result.consulta[2].Primer_Nombre + ' ' + Result.consulta[2].Segundo_Nombre + ' ' + Result.consulta[2].Primer_Apellido + ' ' + Result.consulta[2].Segundo_Apellido);
                            $('#count').val(cout1);
                            cout1++;
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
                    $("#Barcodedm").val('');
                    $("#Barcodedm").css('border-color', 'red');

                });
                return false;
            }
        });

        $('#SalidaXDespacho').submit(function (event) {
            event.preventDefault();
            let DatosEviados = $('#SalidaXDespacho').serialize();
            let barcode = $("#Barcoded").val();
            let token = $('#tokend').val();
            let cout2 = 1;
            if (barcode.length >= 6 && barcode.length <= 9) { //valido ancho tanto minimo como maximo
                $('#ErrorDiv').hide();//si es bien no muestre
                $('#BarcodeYaleido').hide();
                $("#Barcoded").val('');//limpio campo
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},//toekn
                    data: DatosEviados,//datos que envio
                    url: '/SalidaXDespacho',//ruto post
                    type: 'post',
                    success: function (Result) {//que si la respuesa esta bien la guarde en result
                        //console.log(Result);// si aqui lo muestra jaja
                        if (Result.data === 1) {
                            $('#BarcodeYaleido').hide();//si es bien no muestre
                            $('#BarcodeLeido').css('border-color', '');
                            $('#BarcodeLeido').val(Result.barcode);
                            /*$('#patinadorFinal').val(Result.consulta.Primer_Nombre + ' ' + Result.consulta.Segundo_Nombre + ' ' + Result.consulta.Primer_Apellido + ' ' + Result.consulta.Segundo_Apellido);*/
                            $('#count').val(cout2);
                            cout2++;
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
                    $("#Barcoded").val('');
                    $("#Barcoded").css('border-color', 'red');

                });
                return false;
            }
        });

        $('#SalidaAInvernadero').submit(function (event) {
            event.preventDefault();
            let DatosEviados = $('#SalidaAInvernadero').serialize();
            let barcode = $("#BarcodeIn").val();
            let token = $('#tokenIn').val();
            let cout3 = 1;
            if (barcode.length >= 6 && barcode.length <= 9) { //valido ancho tanto minimo como maximo
                $('#ErrorDiv').hide();//si es bien no muestre
                $('#BarcodeYaleido').hide();
                $("#BarcodeIn").val('');//limpio campo
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},//toekn
                    data: DatosEviados,//datos que envio
                    url: '/SalidaAInvernadero',//ruto post
                    type: 'post',
                    success: function (Result) {//que si la respuesa esta bien la guarde en result
                        //console.log(Result);// si aqui lo muestra jaja
                        if (Result.data === 1) {
                            $('#BarcodeYaleido').hide();//si es bien no muestre
                            $('#BarcodeLeido').css('border-color', '');
                            $('#BarcodeLeido').val(Result.barcode);
                            /*$('#patinadorFinal').val(Result.consulta.Primer_Nombre + ' ' + Result.consulta.Segundo_Nombre + ' ' + Result.consulta.Primer_Apellido + ' ' + Result.consulta.Segundo_Apellido);*/
                            $('#count').val(cout3);
                            cout3++;
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
                    $("#BarcodeIn").val('');
                    $("#BarcodeIn").css('border-color', 'red');

                });
                return false;
            }
        });

        $('#SalidaAProduccion').submit(function (event) {
            event.preventDefault();
            let DatosEviados = $('#SalidaAProduccion').serialize();
            let barcode = $("#BarcodeP").val();
            let token = $('#tokenp').val();
            let cout4 = 1;
            if (barcode.length >= 6 && barcode.length <= 9) { //valido ancho tanto minimo como maximo
                $('#ErrorDiv').hide();//si es bien no muestre
                $('#BarcodeYaleido').hide();
                $("#BarcodeP").val('');//limpio campo
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},//toekn
                    data: DatosEviados,//datos que envio
                    url: '/SalidaAProduccion',//ruto post
                    type: 'post',
                    success: function (Result) {//que si la respuesa esta bien la guarde en result
                        //console.log(Result);// si aqui lo muestra jaja
                        if (Result.data === 1) {
                            $('#BarcodeYaleido').hide();//si es bien no muestre
                            $('#BarcodeLeido').css('border-color', '');
                            $('#BarcodeLeido').val(Result.barcode);
                            /*$('#patinadorFinal').val(Result.consulta.Primer_Nombre + ' ' + Result.consulta.Segundo_Nombre + ' ' + Result.consulta.Primer_Apellido + ' ' + Result.consulta.Segundo_Apellido);*/
                            $('#count').val(cout4);
                            cout4++;
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
                    $("#BarcodeP").val('');
                    $("#BarcodeP").css('border-color', 'red');

                });
                return false;
            }
        });

        $('#SalidaXsobrantes').submit(function (event) {
            event.preventDefault();
            let DatosEviados = $('#SalidaXsobrantes').serialize();
            let barcode = $("#BarcodeS").val();
            let token = $('#tokenS').val();
            let cout5 = 1;
            if (barcode.length >= 6 && barcode.length <= 9) { //valido ancho tanto minimo como maximo
                $('#ErrorDiv').hide();//si es bien no muestre
                $('#BarcodeYaleido').hide();
                $("#BarcodeS").val('');//limpio campo
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},//toekn
                    data: DatosEviados,//datos que envio
                    url: '/SalidaXsobrantes',//ruto post
                    type: 'post',
                    success: function (Result) {//que si la respuesa esta bien la guarde en result
                        //console.log(Result);// si aqui lo muestra jaja
                        if (Result.data === 1) {
                            $('#BarcodeYaleido').hide();//si es bien no muestre
                            $('#BarcodeLeido').css('border-color', '');
                            $('#BarcodeLeido').val(Result.barcode);
                            /*$('#patinadorFinal').val(Result.consulta.Primer_Nombre + ' ' + Result.consulta.Segundo_Nombre + ' ' + Result.consulta.Primer_Apellido + ' ' + Result.consulta.Segundo_Apellido);*/
                            $('#count').val(cout5);
                            cout5++;
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
                    $("#BarcodeS").val('');
                    $("#BarcodeS").css('border-color', 'red');

                });
                return false;
            }
        });

    </script>
@endsection
