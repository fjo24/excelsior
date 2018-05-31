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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ADMINISTRADOR

Route::prefix('adm')->group(function () {

//DASHBOARD
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');


//Route::get('/home', 'HomeController@index')->name('home');
/*------------Home----------------*/
Route::resource('home', 'HomeController');




//NO USADAS AUN=
/*------------usuario----------------*/
Route::resource('user', 'UserController');

/*------- Metadato-------------*/
//Route::resource('metadatos','MetadatoController');
Route::resource('empresa','EmpresaController');
/*------------categorias----------------*/
Route::resource('categorias', 'CategoriasController');
/*------------productos----------------*/
Route::resource('productos', 'ProductoController');
/*-------imagenes productos----------*/
Route::get('/producto/imagenes/{producto_id}', 'ProductoController@imagen')->name('imagenpro');
//imagen de productos
Route::resource('imgproductos', 'ImgProductoController');
/*------------Imagen----------------*/
Route::delete('imagen/{id}/destroy',[
			'uses'=>'ProductoController@destroyimg',
			'as'=>'imgproducto.destroy'
]);
//Route::get('productos/deleteimagen/{imagen_id}',  'ProductoController@deleteimagen')->name('deleteimgpro');
//agregar nuevas imagenes de productos
Route::post('productos/{id}/nuevaimagen/',  'ProductoController@nuevaimagen')->name('nuevaimagen');
//Route::post('/producto/{id}/imagenes', 'ProductoController@upload');
//Route::resource('file', 'ImgproductoController');

/*------------modelos----------------*/
Route::resource('modelos', 'ModelosController');
/*-------imagenes modelos----------*/
Route::get('/modelos/imagenes/{modelo_id}', 'ModelosController@imagenes')->name('imagenmod');
//agregar nuevas imagenes de productos
Route::post('modelos/{id}/imagen/',  'ModelosController@nuevaimagen')->name('newimagenmodelo');
//select dinamico
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'ModelosController@selectAjax']);
/*------------Borrar imagen del modelo----------------*/
Route::delete('imagen_mod/{id}/destroy',[
			'uses'=>'ModelosController@destroyimg',
			'as'=>'imgmodelo.destroy'
]);


/*------------servicios----------------*/
Route::resource('servicios', 'ServiciosController');
/*------------obras----------------*/
Route::resource('obras', 'ObrasController');
/*------------fabrica----------------*/
Route::resource('fabrica', 'FabricaController');
/*------------sliders----------------*/
Route::post('sliders/{id}/destroy',[
			'uses'=>'SlidersController@destroy',
			'as'=>'sliders.destroy'
]);
Route::resource('sliders', 'SlidersController');
/*------------metadatos----------------*/
Route::resource('metadatos', 'MetadatosController');
/*------------destacados-home----------------*/
Route::resource('destacados', 'DestacadosController');
/*------------Contenido-empresas----------------*/
Route::resource('contenidoempresa', 'ContenidoempresaController');
/*------------Logos----------------*/
Route::resource('logos', 'LogosController');
/*------------Redes----------------*/
Route::resource('redes', 'RedesController');
/*------------tiposventana----------------*/
Route::resource('tiposventana', 'TiposventanaController');
/*------------tiposventana----------------*/
Route::resource('tiposvidrio', 'TiposvidrioController');

//fin filtro auth
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
