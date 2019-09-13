<?php

//Rutas Front
Route::get('/', 'FrontController@index');
Route::get('nuestros-productos','FrontController@nuestros_productos');


Route::get('familia/{url_familia}/categorias','FrontController@get_categorias');
Route::get('familia/{url_familia}/articulos','FrontController@get_articulos');

Route::get('articulo/{url_articulo}/ver','FrontController@ver_articulo');




Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Rutas Admintrador
Route::prefix('admin')->middleware('EsAdmin')->name('admin.')->group(function(){

    Route::get('/', 'AdministradorController@index')->name('home');  
    Route::get('/articulos/alta', 'AdministradorController@ariculos_alta');

    Route::get('/articulos/agrupar', 'AdministradorController@herramienta_agrupar');

});

Route::get('/cambio', 'FrontController@cambio');
