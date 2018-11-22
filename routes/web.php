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
    //solo el administrador puede dentrar a estas carpetas
    Route::post('User/create','UsuarioController@creauser');
    Route::patch('User/update/{idPersona}','UsuarioController@updatePersona');
    Route::Resource('Roles','rolController');
    Route::get('User/redirec','UsuarioController@redirec');
    Route::get('Estado/{idroles}','rolController@canDesactivo');
    Route::get('Estado/Activar/{idroles}','rolController@canActivo');
    Route::get('cargar/rol/{idroles}','rolController@cargar');
    Route::post('update/rol/{idroles}','rolController@update');
    Route::resource('Usuario','UsuarioController');

    //
});

//Modulo Producto
Route::Resource('Producto','ProductoController');
Route::post('editar/{idproducto}','ProductoController@editarpro');
Route::get('edit/Produ/{idproducto}','ProductoController@cargarPro');



//Modulo Categoria
Route::resource('Categorias','categoriaController');
Route::get('delete/{idcategoria}','CategoriaController@eliminar');
Route::get('Cate/Desactivar/{idcategoria}','CategoriaController@canDesactivo');
Route::get('Cate/Activar/{idcategoria}','CategoriaController@canActivo');


//Modulo Provedor
Route::resource('Provedor','ProvedorController');
Route::get('update/prove/{idprovedor}','ProvedorController@editPro');
Route::post('editar/prove/{idprovedor}','ProvedorController@editarprovedor');
Route::post('crear','ProvedorController@registro');
Route::get('Estado/prove/{idprovedor}','ProvedorController@Desactivar');
Route::get('Estado/Act/{idprovedor}','ProvedorController@Activar');
//Modulo Vendedor
Route::resource('Vendedor','vendedorController');
Route::get('cargar/Vende/{idVendedor}','vendedorController@cargar');
Route::post('Update/Vende/{idVendedor}','vendedorController@actualizar');
Route::post('Activar/{idVendedor}','vendedorController@Activar');
Route::post('Desactivar/{idVendedor}','vendedorController@Desactivar');


//Modulo Clientes

Route::Resource('Cliente','clienteController');
Route::get('edit/clien/{idcliente}','clienteController@cargar');
Route::post('editar/cliente/{idcliente}','clienteController@actualizar');
Route::post('registro/cliente','clienteController@crear');
Route::get('DesacCliente/{idcliente}','clienteController@Desactivar');
Route::get('ActiCliente/{idcliente}','clienteController@Activar');

Route::group(['middleware'=>'is_user'],function(){

});



Auth::routes();
//Routes para Restringir permiso al vendedor
Route::get('Pagina','MensajeController@paginas');
Route::get('Mensajes','MensajeController@Mensaje')->name('mensaje');
Route::get('/home', 'HomeController@index')->name('home');
//Modulo Perfil
Route::resource('Perfil','PerfilController');
Route::patch('Perfil/per/{idPersona}','PerfilController@updatePersona');
Route::patch('perfil/user/{idusuarios}','PerfilController@updateUser');

//Modulo Ventas
Route::resource('Venta','ventaController');
Route::post('imprimir','ventaController@ImprimirBoleta');
Route::post('regventa','ventaController@RegistrarVenta');
Route::get('cargarPro','ventaController@cargar');
Route::get('cargarClie','ventaController@cargarClie');
Route::post('shop','ventaController@RegistrarProductos');
//Modulo Almacen
Route::get('almacen','almacenController@index');
Route::get('alma/{idalmacen}','almacenController@cargarInve');
Route::post('update/{idalmacen}','almacenController@actualizarInv');
//Modulo Orden_compra
Route::get('oden_compra','ordencomController@index');
Route::get('prodfal','ordencomController@ProdFalantes');
Route::get('cargarPro/{idorden_conpra}','ordencomController@cargarProd');
Route::post('ActualizPro/{idorden_conpra}','ordencomController@actualizarprod');


//Modulo Compra
Route::resource('compra','compraController');
Route::get('cargarPrdo','compraController@cargarPrdo');
Route::get('cargarProve','compraController@cargarProve');
Route::get('GuardarCompra','compraController@guardar');
Route::post('agregarpro','compraController@RegistrarProductos');
Route::post('RegisCompra','compraController@RegisCompra');
Route::post('RegistrarCompra','compraController@RegistrarCompra');
Route::get('listarVentas','compraController@listado');
Route::get('ListarComprasExis','compraController@listarCompras');
Route::get('ListarComprasNuevas','compraController@ListarComprasNuevas');
Route::get(' /{slug?}','PerfilController@ventas');


