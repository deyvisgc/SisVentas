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

    //
});
Route::post('User/create','UsuarioController@creauser');
Route::patch('User/update/{idPersona}','UsuarioController@updatePersona');
Route::get('update/prove/{idprovedor}','ProvedorController@editPro');
Route::post('editar/prove/{idprovedor}','ProvedorController@editarprovedor');
Route::get('delete/prove/{idprovedor}','ProvedorController@eliminarProve');
Route::post('editar/{idproducto}','ProductoController@editarpro');
Route::get('edit/Produ/{idproducto}','ProductoController@cargarPro');
Route::get('cargar/rol/{idroles}','rolController@cargar');
Route::post('update/rol/{idroles}','rolController@update');
Route::post('crear','ProvedorController@registro');
Route::get('edit/clien/{idcliente}','clienteController@cargar');
Route::post('editar/cliente/{idcliente}','clienteController@actualizar');
Route::get('User/redirec','UsuarioController@redirec');
Route::get('Estado/{idroles}','rolController@canDesactivo');
Route::get('Estado/Activar/{idroles}','rolController@canActivo');
Route::patch('Perfil/per/{idPersona}','PerfilController@updatePersona');
Route::patch('perfil/user/{idusuarios}','PerfilController@updateUser');
Route::resource('Provedor','ProvedorController');
Route::Resource('Producto','ProductoController');
Route::Resource('Roles','rolController');
Route::post('registro/cliente','clienteController@crear');
Route::resource('Usuario','UsuarioController');
Route::Resource('Cliente','clienteController');
Route::resource('Categorias','categoriaController');
Route::get('delete/{idcategoria}','CategoriaController@eliminar');
Route::get('Cate/Desactivar/{idcategoria}','CategoriaController@canDesactivo');
Route::get('Cate/Activar/{idroles}','CategoriaController@canActivo');
Route::resource('Vendedor','vendedorController');

Route::post('shop','ventaController@RegistrarVenta');

Route::get('cargar/Vende/{idVendedor}','vendedorController@cargar');
Route::post('Update/Vende/{idVendedor}','vendedorController@actualizar');
Route::post('Activar/{idVendedor}','vendedorController@Activar');
Route::post('Desactivar/{idVendedor}','vendedorController@Desactivar');
Route::get('Delete/{idVendedor}','vendedorController@Eliminar');

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
Route::resource('Venta','ventaController');
Route::get('cargarPro','ventaController@cargar');
Route::get('cargarClie','ventaController@cargarClie');
Route::get('almacen','almacenController@index');
Route::get('alma/{idalmacen}','almacenController@cargarInve');
Route::post('update/{idalmacen}','almacenController@actualizarInv');
Route::get('oden_compra','ordencomController@index');
Route::get('prodfal','ordencomController@ProdFalantes');
Route::get('cargarPro/{idorden_conpra}','ordencomController@cargarProd');
Route::post('ActualizPro/{idorden_conpra}','ordencomController@actualizarprod');


