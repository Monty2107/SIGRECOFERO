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




Auth::routes();

// Route::get('/', 'HomeController@login');
Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin'],function(){
    
  // Rutas condomine
  Route::resource('condominio','CondomineController');
  Route::resource('buscar','CondomineController@buscar');

//Rutas Pagos
Route::resource('pago','PagosController');
Route::resource('pagoMes','PagoMesController');
Route::resource('facturacion','FacturacionController');
Route::resource('VerFacturacion','FacturacionController@index2');
Route::resource('facturacionBuscar','FacturacionController@buscar');
Route::resource('facturacionAdmin','FacturacionController@create2');
Route::resource('facturacionParqueo','FacturacionController@create3');
Route::resource('facturacionOtros','FacturacionController@create4');
Route::resource('facturacionIndividual','FacturacionController@create5');
Route::resource('nuevopago','NuevoPagoController');
Route::resource('buscarCondomine','PagosController@buscar');


Route::match(['get','post'],'/mesesAdmin/{id}','PagosController@getMesesAdmin');
Route::match(['get','post'],'/mesesParqueo/{id}','PagosController@getMesesParqueo');

});


