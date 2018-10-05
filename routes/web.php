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


Route::post('User/create','UsuarioController@creauser');
Route::get('User/redirec','UsuarioController@redirec');
/**
Route::get('listar','UsuarioController@get');
Route::get('lista.user','UsuarioController@listar')->name('listar');
 */
Route::resource('Usuario','UsuarioController');
Route::resource('Perfil','PerfilController');
Route::patch('Perfil/per/{idPersona}','PerfilController@updatePersona');
Route::patch('perfil/user/{idusuarios}','PerfilController@updateUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
