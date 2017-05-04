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

Route::get('/', function () {
    return view('MisVistas.index');
});

Route::get('/productos/all', 'ProductosController@index');
Route::get('/categorias/all', 'CategoriasController@index');

Route::get('/productos/{id}','ProductosController@dame');