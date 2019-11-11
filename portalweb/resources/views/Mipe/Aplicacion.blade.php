@extends('PageMaster')
@section('content')

    <div id="Aplicacion" class="slideLeft">
        <section class="content espacioform">
            <div class="tituloform">
                <h3>Aplicacion <i class="fa fa-shower floating"></i></h3>
            </div>
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="box box-primary col-md-12 col-lg-12 col-xs-12">
                    <div class="box-body">

                        <div class="col-md-3">
                            <label for="name" class="col-form-label text-md-right">{{ __('Semana') }}</label>

                            <input id="fechaSemana" class="form-control {{ $errors->has('fechaSemana') ? ' is-invalid' : '' }}" name="fechaSemana" value="{{ old('fechaSemana') }}" required type="text">
                            @if ($errors->has('fechaSemana'))
                                <span class="invalid-feedback">
                                             <strong>{{ $errors->first('fechaSemana') }}</strong>
                                                    </span>
                            @endif
                        </div>


                        <div class="form-group col-md-3">
                            <label for="name" class="col-form-label text-md-right">{{ __('Producto') }}</label>
                            <select id="Producto" class="form-control labelform">
                                <option value="">Producto</option>
                                <option value="">Producto</option>
                            </select>
                            @if ($errors->has('Producto'))
                                <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Producto') }}</strong>
                                                    </span>
                            @endif
                        </div>

                        <div class="form-group col-md-3">
                            <label for="name" class="col-form-label text-md-right">{{ __('Mecanismo Accion') }}</label>
                            <select id="MecAccion" class="form-control labelform">
                                <option value="">Mecanismo Accion</option>
                                <option value="">Mecanismo Accion</option>
                            </select>
                            @if ($errors->has('MecAccion'))
                                <span class="invalid-feedback">
                                             <strong>{{ $errors->first('MecAccion') }}</strong>
                                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name" class="col-form-label text-md-right">{{ __('Implemento') }}</label>
                            <select id="Implemento" class="form-control labelform">
                                <option value="">Implemento</option>
                                <option value="">Implemento</option>
                            </select>
                            @if ($errors->has('Implemento'))
                                <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Implemento') }}</strong>
                                                    </span>
                            @endif
                        </div>


                    </div>

                </div>
                <section>
                    <div class="box box-body col-md-12 col-lg-12 col-xs-12" style="margin-top: -15px;">
                        <div class="col-md-3 divAplic">

                            <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                <label for="name" class="col-form-label text-md-right">{{ __('Genero') }}</label>
                                <select id="Genero" class="form-control labelform">
                                    <option value="">Genero</option>
                                    <option value="">Genero</option>
                                </select>
                                @if ($errors->has('Genero'))
                                    <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Genero') }}</strong>
                                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                <label for="name" class="col-form-label text-md-right">{{ __('Bloque') }}</label>
                                <select id="Bloque" class="form-control labelform">
                                    <option value="">Bloque</option>
                                    <option value="">Bloque</option>
                                </select>
                                @if ($errors->has('Bloque'))
                                    <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Bloque') }}</strong>
                                                    </span>
                                @endif
                            </div>


                            <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                <label for="name" class="col-form-label text-md-right">{{ __('Cama') }}</label>
                                <input id="Cama" type="text" class="form-control labelform {{ $errors->has('Cama') ? ' is-invalid' : '' }}" name="Cama" value="{{ old('Cama') }}" required>
                                @if ($errors->has('Cama'))
                                    <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Cama') }}</strong>
                                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                <label for="name" class="col-form-label text-md-right">{{ __('SubCentro') }}</label>
                                <select id="SubCentro" class="form-control labelform">
                                    <option value="">SubCentro</option>
                                    <option value="">SubCentro</option>
                                </select>
                                @if ($errors->has('SubCentro'))

                                    <span class="invalid-feedback">
                                             <strong>{{ $errors->first('SubCentro') }}</strong>
                                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                <label for="name" class="col-form-label text-md-right">{{ __('Tipo Aplicacion') }}</label>
                                <select id="Tipo_Aplicacion" class="form-control labelform">
                                    <option value="">Tipo Aplicacion</option>
                                    <option value="">Tipo Aplicacion</option>
                                </select>
                                @if ($errors->has('Tipo_Aplicacion'))
                                    <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Tipo_Aplicacion') }}</strong>
                                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                <label for="name" class="col-form-label text-md-right">{{ __('Blaco Biologico') }}</label>
                                <select id="Blaco_Biologico" class="form-control labelform">
                                    <option value="">Blaco Biologico</option>
                                    <option value="">Blaco Biologico</option>
                                </select>
                                @if ($errors->has('Blaco_Biologico'))
                                    <span class="invalid-feedback">
                                             <strong>{{ $errors->first('Blaco_Biologico') }}</strong>
                                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-12 col-xs-12" style="text-align: center">
                                <button type="button" class="btn btn-primary  col-md-12 col-lg-12 col-xs-12">Generar</button>
                            </div>
                        </div>

                        <div class="col-md-9 col-lg-9 col-xl-9">
                            <div class="table-responsive" style="height: 350px">
                                <table class="table table-hover">
                                    <thead>
                                    <tr style="background-color: #0b93d5; text-align: center">
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                        <th>Extn.</th>
                                        <th>E-mail</th>
                                        <th>Colomna1</th>
                                        <th>Colomna2</th>
                                        <th>Colomna3</th>
                                        <th>Colomna4</th>
                                        <th>Colomna5</th>
                                        <th>Colomna6</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tiger</td>
                                        <td>Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>5421</td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger</td>
                                        <td>Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>5421</td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                    </tr><tr>
                                        <td>Tiger</td>
                                        <td>Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>5421</td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                    </tr><tr>
                                        <td>Tiger</td>
                                        <td>Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>5421</td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                    </tr><tr>
                                        <td>Tiger</td>
                                        <td>Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>5421</td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                    </tr><tr>
                                        <td>Tiger</td>
                                        <td>Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>5421</td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                    </tr><tr>
                                        <td>Tiger</td>
                                        <td>Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>5421</td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                        <td>columna adicional</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-xl-9" style="text-align: center; margin-top: 20px;">
                            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal">
                                <img src="{{ asset('img/add.png') }}">Guarda
                            </button>
                            <button type="button" class="btn btn-success ">
                                <img src="{{ asset('img/Edit.png') }}"> Editar
                            </button>
                            <button type="button" class="btn btn-success ">
                                <img src="{{ asset('img/Print.png') }}">Imprimir
                            </button>
                            <button type="button" class="btn btn-primary ">
                                <img src="{{ asset('img/Excel.png') }}">Exportar
                            </button>
                            <div class="col-lg-11 col-md-11 col-xl-11"></div>
                            <div class="col-lg-1 col-md-1 col-xl-1"></div>
                        </div>

                    </div>
                </section>
            </div>
        </section>


    </div>


@endsection
