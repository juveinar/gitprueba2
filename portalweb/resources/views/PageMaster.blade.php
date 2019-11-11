{{--@extends('layouts.app')--}}

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Darwin Colombia</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="Expires" content="0"/>
    <meta http-equiv="Pragma" content="no-cache"/>


    <link rel="stylesheet" href="{{ asset('plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/bower_components/morris.js/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myanimation.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTable/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('DataTable/DataTables/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('DataTable/DataTables/css/dataTables.foundation.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bdimg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTable/DataTables/css/dataTables.jqueryui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('DataTable/DataTables/css/dataTables.semanticui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('DataTable/DataTables/css/jquery.dataTables.min.css')}}">

    <link rel="stylesheet" href="{{ asset('plantilla/sweetalert/dist/sweetalert.css') }}">

    <script src="{{ asset('plantilla/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('plantilla/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plantilla/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plantilla/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('plantilla/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('plantilla/dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('plantilla/dist/js/demo.js') }}"></script>
    <script src="{{ asset('js/pestanasEmpleados.js') }}"></script>

    <script src="{{ asset('DataTable/DataTables/js/jquery.dataTables.min.js')}}"></script>


    <script src="{{ asset('DataTable/Buttons/js/dataTables.buttons.js')}}"></script>

    <script src="{{ asset('DataTable/Buttons/js/buttons.colVis.js')}}"></script>
    <script src="{{ asset('DataTable/Buttons/js/buttons.flash.js')}}"></script>
    <script src=" {{ asset('DataTable/JSZip/jszip.min.js')}}"></script>
    <script src="{{ asset('DataTable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('DataTable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('DataTable/Buttons/js/buttons.html5.js')}}"></script>
    <script src="{{ asset('DataTable/Buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('DataTable/Scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('DataTable/Buttons/js/dataTables.fixedColumns.js')}}"></script>
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script src="{{ asset('plantilla/sweetalert/dist/sweetalert.js') }}"></script>


</head>
<body class="hold-transition skin-blue sidebar-mini" onload="deshabilitaRetroceso()">

<div class="wrapper">
    <!-- cabeza menu -->
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini"><b>D</b>C</span>
            <span class="logo-lg"><b>Darwin Colombia </b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img src="{{ asset('plantilla/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"> -->
                            <i class="fa fa-user-circle"></i>
                            {{ session()->get('nameLogin')}}
                            <span class="hidden-xs"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-header">
                                {{--  @php($img=( $img->img)?$img->img:'Noimg.png')
                                  <img src="{{ asset('imagenes/') }}/{{ $img }}" class="card-img-top" width="65%" alt="User Image">--}}
                                @if(session()->has('img'))
                                    <img src="{{ asset('imagenes/'.session()->get('img')) }} " class="img-circle" alt="User Image">
                                @else
                                    <img src="{{ asset('imagenes/Noimg.png') }} " class="img-circle" alt="User Image">
                                @endif

                                <p>
                                    {{ session()->get('nameLogin')}}
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Sign out') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!-- Menu Izquierda -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li>
                    <a href="{{ url("/Tablero") }}">
                        <i class="fa fa-dashboard"></i><span>Tablero</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>

                @can('menuRRHH')
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-user-circle"></i>
                            <span>Gestion Humana</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('VistaEmpleados')
                                <li><a href="{{ url("/EmpleadossubMenu") }}"><i class="fa fa-circle-o"></i> Listar Empleados</a></li>
                            @endcan()
                            @can('Vistausuarios')
                                <li><a href="{{ url("/UsariossubMenu") }}"><i class="fa fa-circle-o"></i> Usuarios Sistema</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('menuPortafolio')
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-briefcase"></i>
                            <span>Portafolio</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('Vistavariedades')
                                <li><a href="{{ url("/VariedadessubMenu") }}"><i class="fa fa-circle-o"></i> Variedades</a></li>
                            @endcan
                            @can('VistaTipoProducto')
                                <li><a href="{{ url("/") }}"><i class="fa fa-circle-o"></i> Tipo Producto</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('menuLaboratorio')
                    <li class="treeview">

                        <a href="">
                            <i class="fa fa-flask"></i>
                            <span>Laboratorio</span>
                            <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>

                        <ul class="treeview-menu">
                            @can('subMenuParametrizacion')
                                <li class="treeview"><a href=""><i class="fa fa-cogs"></i><span>Parametrizacion</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                        @can('VistadistribucionCuartos')
                                            <li><a href="{{ url("/viewAdminCuartos") }}"><i class="fa fa-circle-o"></i>Distribucion Cuartos</a></li>
                                        @endcan
                                        @can('VistainfoTecnica')
                                            <li><a href="{{ url("/viewInfoTecnica") }}"><i class="fa fa-circle-o"></i>Informacion Tecnica</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('subMenuInventario')
                                <li class="treeview"><a href=""><i class="fa fa-folder"></i><span>Movimientos Inventario</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                        {{--<li><a href="{{ url("/Inventario") }}"><i class="fa fa-circle-o"></i>Reporte Inventario</a></li>--}}
                                        @can('VistaAjsuteInv')
                                            <li><a href="{{ url("/AjusteInventario") }}"><i class="fa fa-circle-o"></i>Ajuste Inventario</a></li>
                                        @endcan
                                        @can('VistaCarguerInventario')
                                            <li><a href="{{ url("/viewloadinventory") }}"><i class="fa fa-circle-o"></i>Cargue Inventario </a></li>
                                        @endcan
                                        @can('VistaLecturaEntrada')
                                            <li><a href="{{ url("/LecturaEntrada") }}"><i class="fa fa-circle-o"></i>Lectura Entrada</a></li>
                                        @endcan
                                        @can('VistaLecturaSalida')
                                            <li><a href="{{ url("/LecturaSalida") }}"><i class="fa fa-circle-o"></i>Lectura Salida</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('subMenuReportes')
                                <li class="treeview"><a href=""><i class="fa fa fa-map"></i><span>Reportes</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                        @can('vistaReporteinv')
                                            <li><a href="{{ url("/ReportesLaboratorio") }}"><i class="fa fa-circle-o"></i>Reporte Inventario</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('subMenuControlFases')
                                <li class="treeview"><a href=""><i class="fa fa-bookmark"></i><span>Control Fases</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                        @can('vistaIngresoMaterial')
                                            <li><a href="{{ url("/") }}"><i class="fa fa-circle-o"></i>Ingreso Material</a></li>
                                        @endcan
                                        @can('vistaMovimientoFase')
                                            <li><a href="{{ url("/") }}"><i class="fa fa-circle-o"></i>Movimiento de Fase</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('subMenuGenerarETQ')
                                <li class="treeview"><a href=""><i class="fa fa-barcode"></i><span>Generacion Etiquetas</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                        @can('vistaGenerarEtiquetas')
                                            <li><a href="{{ url("/GenerarEtiquetas") }}"><i class="fa fa-circle-o"></i>Impresion Etiquetas</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                {{--   @can('menuProduccion')
                       <li class="treeview">

                           <a href="">
                               <i class="fa fa-product-hunt"></i>
                               <span>Produccion</span>
                               <span class="pull-right-container">

                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
                           </a>

                           <ul class="treeview-menu">
                               <li class="treeview"><a href=""><i class="fa fa-cogs"></i><span>Parametrizacion</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                   <ul class="treeview-menu">
                                       <li><a href="{{ url("/viewAdminCuartos") }}"><i class="fa fa-circle-o"></i>Registro Localizaciones</a></li>
                                   </ul>
                               </li>
                               <li class="treeview"><a href=""><i class="fa fa-barcode"></i><span>Mipe</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                   <ul class="treeview-menu">
                                       <li><a href="{{ url("/AplicacionsubMenu") }}"><i class="fa fa-circle-o"></i> Aplicacion</a></li>
                                       <li><a href="{{ url("/ProductossubMenu") }}"><i class="fa fa-circle-o"></i> Productos</a></li>
                                   </ul>
                               </li>


                           </ul>
                       </li>
                   @endcan--}}

                @can('menuVentas')
                    <li class="treeview">

                        <a href="">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Ventas</span>
                            <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        @can('subMenuPedidos')
                            <ul class="treeview-menu">
                                <li class="treeview"><a href=""><i class="fa fa-shopping-cart"></i><span>Pedidos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                        @can('VerVistaOrdenesPedido')
                                            <li><a href="{{ url("/OrdenesPedidos") }}"><i class="fa fa-circle-o"></i>Ordenes de Pedido</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        @endcan
                    </li>
                @endcan

                @can('menuCompras')
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-podcast"></i>
                            <span>Compras</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url("/Introduccion") }}"><i class="fa fa-circle-o"></i> Nueva Introduccion</a></li>
                        </ul>
                    </li>

                @endcan

            </ul>
        </section>
    </aside>

    <!-- Contenido Menu -->
    <div class="content-wrapper">
        <section class="content">
            <div class="row">

                <!-- CONTENIDO INTERNO -->
                @yield('content')

            </div>
        </section>
    </div>


    <!-- Menu oculto para el idioma-->
    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <label>Idioma</label>>
        </ul>
    </aside>

</div>

{{--<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>--}}
</body>
</html>
