<div class="modal fade" id="ModificarVariedad" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="display: flex;   justify-content: center;   align-items: center; ">Modificar Variedad</h4>
            </div>
            <form action="{{ route('updatevariedad') }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                <div class="">

                    <div class="col-lg-12" style="margin-top: -120px;">
                        <div class="col-lg-12">


                            <div class="col-md-6" style="">
                                <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Variedad') }}</label>
                                <input id="Nombre_VariedadM" type="text" autocomplete="off" class="form-control labelform " name="Nombre_VariedadMo"  autofocus required>

                            </div>

                            <div class="col-md-6" style="">
                                <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Codigo') }}</label>
                                <input id="CodigoM" type="number"  class="form-control labelform" name="Codigo_Mo" disabled required autofocus>
                                <input id="CodigoMo" type="hidden"  class="form-control labelform" name="CodigoMo" required autofocus>

                            </div>

                        </div>
                        <div class="col-lg-12">


                            <div class="col-md-6" style="margin-top: 2px">
                                <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Genero') }}</label>
                                <input id="IdGenerosM" type="text" class="form-control labelform" name="IdGenerosM" disabled required autofocus>
                            </div>

                            <div class="col-md-6" style="margin-top: 2px">
                                <label for="name" style="display: flex;   justify-content: center;   align-items: center; " class="col-form-label text-md-right">{{ __('Nombre Especie') }}</label>
                                <input id="IDEspecie" type="text" maxlength="7" class="form-control labelform" name="IDEspecie" disabled required autofocus>
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
                    <button type="submit" class="btn btn-success">Modifica</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>