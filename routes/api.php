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

//articulos de alta
//Route::get('articulos','ArticuloController@index');
Route::resource('articulos', 'ArticuloController');

//Articulos Sin Grupo
Route::get('sin-grupo','ArticuloController@sin_grupo');

//Actualiza el grupo y color
Route::post('agrupar','AdministradorController@agrupar');