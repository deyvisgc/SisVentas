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
Route::post('shop','ventaController@RegistrarProductos');
<<<<<<< HEAD
=======
Route::post('regventa','ventaController@RegistrarVenta');

>>>>>>> 3d9589c5c4c109a19fc03f4606b42ad3b0b9d049
Route::get('cargar/Vende/{idVendedor}','vendedorController@cargar');
Route::post('Update/Vende/{idVendedor}','vendedorController@actualizar');
Route::post('Activar/{idVendedor}','vendedorController@Activar');
Route::post('Desactivar/{idVendedor}','vendedorController@Desactivar');
Route::get('Delete/{idVendedor}','vendedorController@Eliminar');
Route::get('Estado/prove/{idprovedor}','ProvedorController@Desactivar');
Route::get('Estado/Act/{idprovedor}','ProvedorController@Activar');
Route::get('DesacCliente/{idcliente}','clienteController@Desactivar');
Route::get('ActiCliente/{idcliente}','clienteController@Activar');

Route::group(['middleware'=>'is_user'],function(){

});



Route::get('auth','UsuarioController@login');




Auth::routes();
Route::get('Pagina','MensajeController@paginas');
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
Route::resource('compra','compraController');
Route::get('cargarPrdo','compraController@cargarPrdo');
Route::get('cargarProve','compraController@cargarProve');
Route::get('GuardarCompra','compraController@guardar');
Route::get(' /{slug?}','PerfilController@ventas');

