<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

//ruta para la vista del login
Route::get('/', 'Controller_administrador@login')->name('/');

//ruta para la vista principal del perfil administrador
Route::get('/administrador', 'Controller_administrador@inicio')->name('administrador');

//ruta para la busqueda de clientes del perfil administrador
Route::get('/busqueda_cliente', 'Controller_administrador@busquedacliente')->name('busqueda_cliente');

//ruta para la busqueda de producto del perfil administrador
Route::get('/busqueda_producto', 'Controller_administrador@busquedaproducto')->name('busqueda_producto');

//ruta para la busqueda de empleado del perfil administrador
Route::get('/busqueda_empleado', 'Controller_administrador@busquedaempleado')->name('busqueda_empleado');

//ruta para la busqueda de provvedor del perfil administrador
Route::get('/busqueda_proveedor', 'Controller_administrador@busquedaproveedor')->name('busqueda_proveedor');

//ruta para el modulo de venta del perfil administrador
Route::get('/modulo_venta', 'Controller_administrador@moduloventa')->name('modulo_venta');

Route::get('/modulofactura', 'Controller_administrador@modulofactura')->name('modulofactura');

//ruta para el inicio de sesion del perfil administrador
Route::POST('/session', 'Controller_administrador@session')->name('session');

//ruta para dar de alta a un empleado en el perfil administrador
Route::POST('/altaempleado', 'Controller_empleado@altaempleado')->name('altaempleado');

//ruta para dar de alta a un proveedor en el perfil administrador
Route::POST('/altaproveedor', 'Controller_proveedor@altaproveedor')->name('altaproveedor');

//ruta para realizar la consulta de proveedores en el perfil administrador
Route::get('/reporteproveedor', 'Controller_proveedor@reporteproveedor')->name('reporteproveedor');

//ruta para realizar la consulta de cliente en el perfil administrador
Route::POST('/guardacliente', 'Controller_cliente@guardacliente')->name('guardacliente');
//ruta para realizar la consulta de proveedores en el perfil administrador
Route::get('/reporteempleado', 'Controller_empleado@reporteempleado')->name('reporteempleado');

//ruta para realizar la consulta de producto en el perfil administrador
Route::POST('/guardaproducto', 'Controller_productos@guardaproducto')->name('guardaproducto');

//ruta para realizar la consulta de cliente en el perfil administrador
Route::get('/reportecliente', 'Controller_cliente@reportecliente')->name('reportecliente');

//ruta para realizar la consulta de cliente en el perfil administrador
Route::get('/reporteproducto', 'Controller_productos@reporteproducto')->name('reporteproducto');

//ruta para realizar la alta de entrada en el perfil administrador
Route::POST('/altaentrada', 'Controller_entrada@altaentrada')->name('altaentrada');

//ruta para realizar la alta de entrada en el perfil administrador
Route::get('/reporteentrada', 'Controller_entrada@reporteentrada')->name('reporteentrada');

//ruta para realizar la alta de departamentos en el perfil administrador
Route::POST('/altadepartamento', 'Controller_departamentos@altadepartamento')->name('altadepartamento');

//ruta para realizar la consulta de departamentos en el perfil administrador
Route::get('/reportedepartamento', 'Controller_departamentos@reportedepartamento')->name('reportedepartamento');

//ruta para realizar actualizar los datos de la empresa en el perfil administrador
Route::POST('/actualizaempresa', 'Controller_empresa@actualizaempresa')->name('actualizaempresa');

//ruta para la vista de la modificacion empleado en el perfil administrador
Route::get('/mempleado/{id_empleado}', 'Controller_empleado@mempleado')->name('mempleado');
Route::get('/mcliente/{id_cliente}', 'Controller_cliente@mcliente')->name('mcliente');
Route::get('/mproveedor/{id_proveedor}', 'Controller_proveedor@mproveedor')->name('mproveedor');
Route::get('/mproducto/{id_producto}', 'Controller_productos@mproducto')->name('mproducto');
Route::get('/mdepartamento/{id_departamento}', 'Controller_departamentos@mdepartamento')->name('mdepartamento');

//ruta para realizar actualizar los datos de empleado en el perfil administrador
Route::POST('/actualizaempleado', 'Controller_empleado@actualizaempleado')->name('actualizaempleado');
Route::POST('/actualizacliente', 'Controller_cliente@actualizacliente')->name('actualizacliente');
Route::POST('/actualizaproveedor', 'Controller_proveedor@actualizaproveedor')->name('actualizaproveedor');
Route::POST('/actualizadepartamento', 'Controller_departamentos@actualizadepartamento')->name('actualizadepartamento');

Route::POST('/actualizaproducto', 'Controller_productos@actualizaproducto')->name('actualizaproducto');

Route::get('/eliminap/{id_proveedor}','Controller_proveedor@eliminap')->name('eliminap');
Route::get('/restaurap/{id_proveedor}','Controller_proveedor@restaurap')->name('restaurap');
Route::get('/efisicap/{id_proveedor}','Controller_proveedor@efisicap')->name('efisicap');

Route::get('/eliminad/{id_departamento}','Controller_departamentos@eliminad')->name('eliminad');
Route::get('/restaurad/{id_departamento}','Controller_departamentos@restaurad')->name('restaurad');
Route::get('/efisicad/{id_departamento}','Controller_departamentos@efisicad')->name('efisicad');


Route::get('/eliminapr/{id_producto}','Controller_productos@eliminapr')->name('eliminapr');
Route::get('/restaurapr/{id_producto}','Controller_productos@restaurapr')->name('restaurapr');
Route::get('/efisicapr/{id_producto}','Controller_productos@efisicapr')->name('efisicapr');


Route::get('/eliminac/{id_cliente}','Controller_cliente@eliminac')->name('eliminac');
Route::get('/restaurac/{id_cliente}','Controller_cliente@restaurac')->name('restaurac');
Route::get('/efisicac/{id_cliente}','Controller_cliente@efisicac')->name('efisicac');

Route::get('/eliminae/{id_empleado}','Controller_empleado@eliminae')->name('eliminae');
Route::get('/restaurae/{id_empleado}','Controller_empleado@restaurae')->name('restaurae');
Route::get('/efisicae/{id_empleado}','Controller_empleado@efisicae')->name('efisicae');

Route::get('/login', 'Controller_empleado@login')->name('login');

Route::POST('/validalogin', 'Controller_empleado@validalogin')->name('validalogin');

Route::get('/principal', 'Controller_empleado@principal')->name('principal');

Route::get('/cerrarsesion', 'Controller_empleado@cerrarsesion')->name('cerrarsesion');








