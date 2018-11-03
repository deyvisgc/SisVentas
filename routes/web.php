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
    return view('auth.login');
});



Route::group(['middleware' => ['auth','is_admn']], function () {
    Route::POST('regis/provedor','ProvedorController@registrar');
    Route::get('update/prove/{idprovedor}','ProvedorController@editPro');
    Route::post('editar/prove/{idprovedor}','ProvedorController@editarprovedor');
    Route::get('delete/prove/{idprovedor}','ProvedorController@eliminarProve');
    Route::post('User/create','UsuarioController@creauser');
    Route::get('User/redirec','UsuarioController@redirec');
    Route::post('User/create','UsuarioController@creauser');
    Route::patch('Perfil/per/{idPersona}','PerfilController@updatePersona');
    Route::patch('perfil/user/{idusuarios}','PerfilController@updateUser');
    Route::patch('User/update/{idPersona}','UsuarioController@updatePersona');
    Route::resource('Usuario','UsuarioController');
    Route::resource('Provedor','ProvedorController');
    Route::Resource('Producto','ProductoController');

    //
});

Route::group(['middleware'=>'is_user'],function(){

});



/**
Route::get('listar','UsuarioController@get');
Route::get('lista.user','UsuarioController@listar')->name('listar');
 */


Route::get('auth','UsuarioController@login');





Auth::routes();
Route::get('Mensajes','MensajeController@Mensaje')->name('mensaje');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Perfil','PerfilController');