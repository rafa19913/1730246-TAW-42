<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('crearProducto','ProductoController@store'); // Ruta que se utiliza en el copmonente AgregarComponent.vue

Route::get('actualizarProducto','ProductoController@index'); // Ruta que se utiliza en el copmonente AgregarComponent.vue

Route::get('obtenerProductos','ProductoController@obtener'); // Ruta que se utiliza en el copmonente ListarComponent.vue
