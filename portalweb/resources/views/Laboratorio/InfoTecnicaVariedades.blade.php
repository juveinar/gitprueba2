@extends('PageMaster')
@section('content')
    @can('verInfoTecnica')
        <div class="content">
            <form action="{{ route('GuardarInfotecnicaLaboratorio') }}" method="post">
                @csrf
                <input type="hidden" name="total" id="total">
                <div class="col-lg-12">
                    <div class="">
                        <div class="col-lg-12" style="margin-top: -35px;">
                            <h3>Informacion Tecnica</h3>
                        </div>
                    </div>
                    <div class="">
                        <div class="col-lg-12 box box-body">
                            <div class="form-group">
                                <label for="ejemplo_email_3" class="col-lg-1 control-label">Variedad</label>
                                <div class="col-lg-5">
                                    <select class="selectpicker" data-show-subtext="true" name="idVariedad" id="variedad" data-live-search="true" required="required">
                                        <option selected="true" value="" disabled="disabled">Seleccione.....</option>
                                        @foreach($VariedadesActivas as $VariedadesActiva)
                                            <option value="{{ $VariedadesActiva->id }}">
                                                {{ $VariedadesActiva->Codigo }}
                                                {{ $VariedadesActiva->Nombre_Variedad }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{--<button id="Cargar" type="button" class="btn btn-success">Cargar</button>--}}
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Identificador</label>
                                    <div class="col-lg-3">
                                        <input type="text" disabled class="form-control labelform" id="Datos" placeholder="Identificador">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel-primary">
                        <div class="box box-body">
                            <table id="TableVariedadesActivas" class="table table-hover display nowrap col-md-12 col-lg-12 col-xl-12 cell-border">
                                <thead class="bg-blue-gradient">
                                <tr>
                                    <th></th>
                                    <th>Fase</th>
                                    <th>Coeficiente Multiplicacion</th>
                                    <th>Porcentaje Perdida</th>
                                    <th>Porcentaje Por Fase</th>
                                    <th>Semanas por fase</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    @can('Modificarinfotecnica')
                        <div class="col-lg-12" id="guardarIn" style="display: none">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button class="btn btn-success  btn-lg btn-block">Guardar</button>
                            </div>
                            <div class="col-lg-3" style="margin-top: 10px"></div>
                        </div>
                    @endcan
                </div>
            </form>
        </div>
        <input type="hidden" value="{{ csrf_token() }}" name="token" id="token">
    @endcan
    <script>
        $(document).ready(function () {
            let indicador = 0;
            let token = $('#token').val();
            $('#variedad').change(function (event) {
                event.preventDefault();
                let valor = $('#variedad').val();

                //console.log(valor);
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},
                    data: {valor: valor},
                    url: '/DetalleInfoTecnicaVar',
                    type: 'post',

                    success: function (Result) {
                        var tbHtml = '';
                        $.each(Result.data, function (index, value) {
                            //console.log(Result.data.Codigo);
                            /* Vamos agregando a nuestra tabla las filas necesarias */
                            tbHtml += '<tr>' +
                                '<td><input type="hidden" name="Id_Fase-' + indicador + '" value="' + value.id_fase + '"></td>' +
                                '<td>' + value.NombreFase + '</td>' +
                                '<td><input name="CoeficienteMultiplicacion-' + indicador + '" value="' + value.CoeficienteMultiplicacion + '"></td>' +
                                '<td><input name="PorcentajePerdida-' + indicador + '" value="' + value.PorcentajePerdida + '"></td>' +
                                '<td><input name="PorcentajePerdidaFase-' + indicador + '" value="' + value.PorcentajePerdidaFase + '"></td>' +
                                '<td><input name="SemanasXFase-' + indicador + '" value="' + value.SemanasXFase + '"></td>' +
                                '</tr>';
                            indicador++;
                            $('#total').val(indicador);
                            $('#Datos').val(value.Codigo + ' ' + value.Nombre_Variedad);

                        });
                        $('#TableVariedadesActivas tbody').html(tbHtml);
                    },
                });
                $('#guardarIn').show();
            });
        });
    </script>

@endsection
