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

Route::get('/guardarUsuario', function () {

  $para = 'benjamindelgado1994@hotmail.com';
  $asunto = 'Prueba de SMTP local';
  $mensaje = 'Mensaje de prueba';
  $cabeceras = 'From: monterrosadelgado@gmail.com' ."\r\n" .
  'Reply-To: monterrosadelgado@gmail.com' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  if(mail($para, $asunto, $mensaje, $cabeceras)) {
    echo 'Correo enviado correctamente';
  } else {
    echo 'Error al enviar mensaje';
  }

});

// Route::get('/', 'HomeController@login');
Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin'],function(){
    
  // Rutas condomine
  Route::resource('condominio','CondomineController');
  Route::resource('buscar','CondomineController@buscar');
  Route::resource('reportebuscar','CondomineController@reportebuscar');
  Route::match(['get','post'],'/estadoCuenta/{id}','CondomineController@reporte');

//Rutas Pagos
Route::resource('pago','PagosController');
Route::resource('pagoMes','PagoMesController');
Route::resource('nuevopago','NuevoPagoController');
Route::resource('buscarCondomine','PagosController@buscar');

//Rutas Facturacion
Route::resource('facturacion','FacturacionController');
Route::resource('VerFacturacion','FacturacionController@index2');
Route::resource('facturacionBuscar','FacturacionController@buscar');
Route::resource('facturacionAdmin','FacturacionController@create2');
Route::resource('facturacionParqueo','FacturacionController@create3');
Route::resource('facturacionOtros','FacturacionController@create4');
Route::resource('facturacionIndividual','FacturacionController@create5');
Route::resource('cuenta','Cuenta_por_CobrarController');
Route::resource('VerCuenta','Cuenta_por_CobrarController@show');
Route::resource('DescargarCuenta','Cuenta_por_CobrarController@edit');


//Rutas Usuario
Route::resource('usuario','UsuarioController');
Route::resource('Perfil','UsuarioController@perfil');

//Rutas Bitacora
Route::Resource('Bitacora','BitacoraController');
Route::match(['get','post'],'/ReporteBitacoras/{id}','BitacoraController@ReporteBitacoras');

//Rutas Backups
Route::get('backup', 'BackupController@index');
Route::get('backup/createAPP', 'BackupController@create');
Route::get('backup/createBase', 'BackupController@create1');
Route::get('backup/download/{file_name}', 'BackupController@download');
Route::get('backup/delete/{file_name}', 'BackupController@delete');

//Rutas Para Atraer meses de pago
Route::match(['get','post'],'/mesesAdmin/{id}','PagosController@getMesesAdmin');
Route::match(['get','post'],'/mesesParqueo/{id}','PagosController@getMesesParqueo');

});


