<?php


Route::get('/welcome', function () {
    return view('Welcome');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('welcome');
});

Auth::routes();
/*********************************  RUTAS DE CABECERA DEL MENU ***************************/

Route::get('/MenuEmpleados', function () {return false;})->name('MenuEmpleados')->middleware('permission:menuRRHH');
Route::get('/MenuMipe', function () {return false;})->name('MenuMipe');
Route::get('/MenuLaboratorio', function () {return false;})->name('MenuLaboratorio')->middleware('permission:menuLaboratorio');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Tablero', 'TableroController@Tablero')->name('MenuTablero');
Route::get('/EmpleadossubMenu', 'EmpleadosController@mostrarDatos')->name('EmpleadossubMenu')->middleware('permission:menuRRHH');//Ruta de vista Empeados
Route::get('/UsariossubMenu', 'UsuariosController@Usuarios')->name('SubMeUsuarios')->middleware('permission:ListarUsuarios');

Route::get('/viewInfoTecnica', 'InfoTecnicaVariedadesController@viewInfoTecnica')->name('viewInfoTecnica')->middleware('permission:VistainfoTecnica');
Route::get('/VariedadessubMenu', 'PortafolioVariedadesContraller@VistaPortafolioVariedades')->name('VariedadessubMenu')->middleware('permission:Vistavariedades');
Route::get('/viewAdminCuartos', 'AdministracionCuartosController@viewAdminCuartos');//vista inicial cuartos
Route::get('/LecturaEntrada', 'LecturaEntrada@readinginput')->middleware('permission:VistaLecturaEntrada');//vista lectura entrada
Route::get('/LecturaSalida', 'LecturaSalida@readingexit')->middleware('permission:VistaLecturaSalida');//vista lectura salida
Route::get('/AjusteInventario', 'AjusteInventarioController@AjusteInventario')->middleware('permission:VistaAjsuteInv');//vista ajuste inventario
Route::get('/GenerarEtiquetas','GeneracionEtiquetasController@ViewGenerarEtiquetas')->middleware('permission:vistaGenerarEtiquetas');//vista generacion etiquetas
Route::get('/ReportesLaboratorio', 'ReportesLaboratorioController@ReportesLaboratorio')->middleware('permission:vistaReporteinv');//vista reporte inventario
Route::get('/viewloadinventory', 'CargueInventarioController@viewloadinventory')->middleware('permission:VistaCarguerInventario');//vista para cargue inventario

Route::get('/OrdenesPedidos', 'OrdenesPedidoLaboratorioController@OrdenesPedidosLaboratorio');
Route::get('/Introduccion','IntroduccionController@ViewIntroduccion')->name('Introduccion');

Route::get('/AplicacionsubMenu', 'MipeAplicacionController@Aplicacion')->name('SubMeAplicacion');
Route::get('/ProductossubMenu', 'MipeProductosController@Productos')->name('SubMenuProductos');

/*********************************  RUTAS DE RRHH  **************************************/

Route::get('/EmpleadosMostrarInactivo', 'EmpleadosController@cargaTablaEmpleadosInactivos')->name('MostrarEmpleadosInactivo')->middleware('permission:verEmpleados');;//btn vista submenu;//carga tabla inactivos
Route::get('/EmpleadosMostrar', 'EmpleadosController@cargaTablaEmpleados')->name('EmpleadosMostrar')->middleware('permission:verEmpleados');//btn vista submenu;//carga tabla inactivo
Route::get('/FichaTecnica/{id}/empelados', 'FichaTecnicaEmpleadosController@ModificarEmpleados')->name('FichaTecnica')->middleware('permission:FichaTecnicaEmpleado');//pasar vista ficha tecnica
Route::get('/Activar/{id}/empelado', 'EmpleadosController@ActivarEmpleado')->middleware('permission:ActivarEmpleado');//activar empleado
Route::get('/EliminarEmpelado/{id}/empelado', 'EmpleadosController@EliminarEmpleado')->middleware('permission:InactivarEmpleado');//inactivar empleado
Route::post('/EmpleadosCreate/fichatecnica', 'FichaTecnicaEmpleadosController@CrearFichaTecnica')->name('CrearFichaTecnica')->middleware('permission:ActualizarFichaTecnicaEmpleado');//guardar ficha tecnica
Route::post('/EmpleadosCreate', 'EmpleadosController@CreateEmpleado')->name('crearEmpleados')->middleware('permission:crearEmpleado');//crear empleado
Route::post('/Empleado/cargaTablaEmpleadosDocumento', 'EmpleadosController@ExisteEmpleado')->name('ExisteEmpleado');//
Route::post('/UpdateImg', 'EmpleadosController@Updateimg')->name('UpdateImg');//->middleware('permission:createEmpleado');//crear empleado

/*********************************  RUTAS DE PORTAFOLIO  **************************************/
/*GENEROS*/
Route::get('/DatosGenerosActivos', 'PortafolioVariedadesContraller@cargaTablaGenerosActivos')->middleware('permission:VerGeneros');
Route::get('/DatosGenerosInActivos', 'PortafolioVariedadesContraller@cargaTablaGenerosInActivos')->middleware('permission:VerGeneros');
Route::post('/CreateGenero', 'PortafolioVariedadesContraller@createGenero')->name('CreateGenero')->middleware('permission:CrearGeneros');
Route::post('/UpdateGenero', 'PortafolioVariedadesContraller@UpdateGenero')->name('UpdateGenero')->middleware('permission:ActualizarGeneros');
Route::get('/Inactivar/{CodigoIntegracionGenero}/Genero', 'PortafolioVariedadesContraller@InavilitarGenero')->middleware('permission:InactivarGeneros');
Route::get('/Activar/{CodigoIntegracionGenero}/Genero', 'PortafolioVariedadesContraller@HabilitarGenero')->middleware('permission:ActivarGeneros');
/*ESPECIES*/
Route::get('/Inactivar/{id}/Especie', 'PortafolioVariedadesContraller@InactivarEspecie')->middleware('permission:InactivarEspecies');//INACTIVAR ESPECIE
Route::get('/Activar/{id}/Especie', 'PortafolioVariedadesContraller@ActivarEspecie')->middleware('permission:ActivarEspecies');//ACTIVAR ESPECIE
Route::POST('/newEspecie', 'PortafolioVariedadesContraller@CreatenewEspecie')->name('CreatenewEspecie')->middleware('permission:CrearEspecies');
/*VARIEDADES*/
Route::post('/createVariedad', 'PortafolioVariedadesContraller@newvariedad')->name('createVariedad')->middleware('permission:CrearVariedades');
Route::PUT('/updatevariedad', 'PortafolioVariedadesContraller@updatevariedad')->name('updatevariedad')->middleware('permission:ActualizarVariedades');;
Route::get('/Inactivar/{id}/Variedad', 'PortafolioVariedadesContraller@InactivarVariedad')->middleware('permission:InactivarVariedades');//INACTIVAR VARIEDAD
Route::get('/Activar/{id}/Variedad', 'PortafolioVariedadesContraller@ActivarVariedad')->middleware('permission:ActivarVariedades');//INACTIVAR VARIEDAD


/*********************************  RUTAS DE LABORATORIO **************************************/

Route::post('/LoadInventoryEntry', 'LecturaEntrada@LecturaEntrada')->name('LecturaEntrada')->middleware('permission:LecturaEntrada');
Route::post('/LoadInventory', 'CargueInventarioController@LoadInventory')->name('LoadInventory')->middleware('permission:CargueInventario');
Route::post('/EmpleadosLaboratorio','EmpleadosController@EmpleadosLaboratorio')->name('EmpleadosLaboratorio');
Route::post('/DetalleInfoTecnicaVar','InfoTecnicaVariedadesController@CargaTablaInfotecnica')->name('DetalleInfoTecnicaVar');
Route::post('/GuardarInfotecnicaLaboratorio','InfoTecnicaVariedadesController@GuardarInfotecnicaLaboratorio')->name('GuardarInfotecnicaLaboratorio');
Route::post('/CreateCuarto', 'AdministracionCuartosController@CreateCuarto')->name('CreateCuarto');
Route::post('/CreateEstanteCuarto', 'AdministracionCuartosController@CreateEstanteCuarto')->name('CreateEstanteCuarto');
Route::post('/createNivelEstante', 'AdministracionCuartosController@createNivelEstante')->name('createNivelEstante');

Route::post('/SalidaXCancelacion','LecturaSalida@SalidaXCancelacion')->name('SalidaXCancelacion');
Route::post('/SalidaXDañoMaterial','LecturaSalida@SalidaXDanoMaterial')->name('SalidaXDañoMaterial');
Route::post('/SalidaXDespacho','LecturaSalida@SalidaXDespacho')->name('SalidaXDespacho');
Route::post('/SalidaAInvernadero','LecturaSalida@SalidaAInvernadero')->name('SalidaAInvernadero');
Route::post('/SalidaAProduccion','LecturaSalida@SalidaAProduccion')->name('SalidaAProduccion');
Route::post('/SalidaXsobrantes','LecturaSalida@SalidaXsobrantes')->name('SalidaXsobrantes');

Route::post('/LecAjusteInventario','AjusteInventarioController@LecAjusteInventario')->name('LecAjusteInventario');//->middleware('permission:crearEmpleado');

Route::get('/GenerarEtiquetasInventario','GeneracionEtiquetasController@GenerarEtiquetasInventario')->name('GenerarEtiquetasInventario');
Route::get('/GenerarEtiquetasInventario1','GeneracionEtiquetasController@GenerarEtiquetasInventario1')->name('GenerarEtiquetasInventario1');

/*********************************  RUTAS DE REPORTES LABORATORIO **************************************/
Route::post('/ReporteEntradaLab','ReportesLaboratorioController@GenerarReporteEntrada')->name('ReporteEntradaLab');
Route::post('/ReporteSalidasLab','ReportesLaboratorioController@GenerarReporteSalida')->name('ReporteSalidaLab');
//Route::get('/ReporteEntradaLabP','ReportesLaboratorioController@prueba')->name('ReporteEntradaLab');


/*********************************  RUTAS DE VENTAS **************************************/

Route::get('/Orden/%&${id}/pedido/Detalle', 'OrdenesPedidoLaboratorioController@DetallesPedido');
Route::post('/PedidoPreConfirmado', 'OrdenesPedidoLaboratorioController@PedidoPreConfirmado')->name('PedidoPreConfirmado');


/********************************* RUTAS DE COMPRAS **************************************/
Route::POST('/NewIntroduccion','IntroduccionController@NewIntroduccion')->name('NewIntroduccion');


/********************************* RUTAS DE USUARIOS SISTEMA **************************************/

Route::get('/MostrasUsuariosSistema', 'UsuariosController@TablaUsuarios')->name('MostrasUsuarios');
Route::post('/CreateUsers', 'UsuariosController@CreateUsers')->name('CreateUsers');


/********************************* RUTAS DE SELECT MULTIPLES **************************************/

Route::get('/Genero/{id}/Especie', 'PortafolioVariedadesContraller@SelectGenero');
Route::post('/Area', 'FichaTecnicaEmpleadosController@Area')->name('Area');
Route::post('/Bloque', 'FichaTecnicaEmpleadosController@Bloque')->name('Bloque');
Route::post('/Departamentos', 'EmpleadosController@Departamentos')->name('Departamentos');//
Route::get('/Cuarto/{id}/Cuarto', 'LecturaEntrada@SelectCuarto');
Route::get('/Estante/{id}/Estante', 'LecturaEntrada@SelectEstante');
Route::post('/LabCuatos', 'AdministracionCuartosController@Cuartos')->name('LabCuatos');

Route::get('/CuartoEtiquetas/{id}/Cuarto', 'GeneracionEtiquetasController@SelectCuarto');
Route::get('/EstanteEtiquetas/{id}/Estante', 'GeneracionEtiquetasController@SelectEstante');


/********************************* RUTAS DE PRUEBAS **************************************/
Route::get('/prueba', 'LecturaEntrada@prueba');
Route::get('/prueba', 'OrdenesPedidoLaboratorioController@prueba')->name('prueba');
Route::get('/Barcode', 'MipeAplicacionController@Barcode')->name('Barcode');
Route::get('/prueba', 'EmpleadosController@prueba')->name('prueba');
Route::get('/procedimiento','IntroduccionController@procedimiento')->name('procedimiento');
/*Route::get('jp', function () {
    $user = \App\User::all();
    dd($user);
});*/



