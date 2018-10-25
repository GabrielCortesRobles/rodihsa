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
Route::get('/', 'Controller_administrador@login');

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

//ruta para realizar la consulta de departamentos en el perfil administrador
Route::POST('/altadepartamento', 'Controller_departamentos@altadepartamento')->name('altadepartamento');

//ruta para realizar la consulta de cliente en el perfil administrador
Route::get('/reportedepartamento', 'Controller_departamentos@reportedepartamento')->name('reportedepartamento');

//ruta para realizar la consulta de departamentos en el perfil administrador
Route::POST('/actualizaempresa', 'Controller_empresa@actualizaempresa')->name('actualizaempresa');