@extends('PageMaster')
@section('content')
    <section class="pullUpp col-lg-12 col-md-12 col-xs-12">
        <div class="box-header with-border" style="margin-top:-12px;">
            <h3 class="box-title">Tablero de Control</h3>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-6" id="boxPercent">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>0<sup style="font-size: 20px">%</sup></h3>
                        <p>Porcentaje ordenes de trabajo procesadas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a class="small-box-footer" href="#">Mas Información<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title" id="title" style="margin:10px;">Meta Completada</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4" id="boxDataPersons">
                                <p class="text-center" style="border-bottom: 1px solid silver;text-align: left;"><strong> Descartes</strong></p>
                                <div>
                                    <label>
                                        <div class="progress-group" style="width:400px;">
                                            <span class="progress-text" style="font-weight: normal;width:170px;">Ordenes pendiente asignar</span>
                                            <span class="progress-text" style="font-weight: normal;width:80px;"> 31</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
