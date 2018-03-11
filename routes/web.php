<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Rutas de acceso públic
Route::get('/', 'PortadaControlador@portada');

//Rutas del sistema de autentificación
Auth::routes();

//Rutas para las que necesitas estar identificado
Route::middleware(['auth'])->group(function () {
    Route::get('text/{text}/borrar', 'TextControlador@confirmacionBorrar');
    Route::resource('text', 'TextControlador');
});


