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
Route::get('/administrador', 'Controller_administrador@inicio');

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
