<?php

use Illuminate\Http\Request;

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

//Ruta pública para obtener una frase aleatoria
Route::get('/dameFrase', 'ApiControlador@fraseAleatoria');


//Ruta protegida para crear frase
Route::post('/crearFrase', 'ApiControlador@crearFrase')->middleware('comprobarUsuario');


