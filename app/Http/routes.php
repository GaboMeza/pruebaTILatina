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

Route::get('/', function () {
    return view('auth/login');
});

//Creamos un grupo de rutas para las peticiones: Index,Create,Show,Edit,Store,Update,Destroy. 
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('shipments/newshipment','ShipmentController');


Route::auth(); //Gestiona el acceso a nuestro proyecto

Route::get('/home', 'HomeController@index');
Route::get('/{slug?}', 'HomeController@index'); //Si la ruta no existe redirecciona al Index
