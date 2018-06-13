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

//HOME
Route::get('/', 'PaginasController@home');

//MANTENIMIENTO
Route::get('/mantenimiento', 'PaginasController@mantenimiento');

//EMPRESA
Route::get('/empresa', 'PaginasController@empresa');

//CATEGORIAS DE PRODUCTOS
Route::get('/categorias', 'PaginasController@categorias');

//PRODUCTOS
Route::get('/productos/{producto_id}', 'PaginasController@productos')->name('productos');

//CATEGORIA DE OBRAS
Route::get('/categoriaobras', 'PaginasController@categoriaobras');
//OBRA
Route::get('/obras/{obra_id}', 'PaginasController@obras')->name('obras');
//GALERIA
Route::get('/obragaleria/{obra_id}', 'PaginasController@galeria')->name('obragaleria');

//CONSEJOS
Route::get('/consejos', 'PaginasController@consejos')->name('consejos');

//CLIENTES
Route::get('/clientes', 'PaginasController@clientes')->name('clientes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//show producto
Route::get('/producto-info/{producto_id}', 'PaginasController@productoinfo')->name('productoinfo');

//PRESUPUESTO
Route::get('/presupuesto', 'PaginasController@presupuesto');
Route::post('enviar-presupuesto', [
    'uses' => 'PaginasController@enviarpresupuesto',
    'as'   => 'enviarpresupuesto',
]);

//CONTACTO
Route::get('contacto', 'PaginasController@contacto');
Route::post('enviar-mail', [
    'uses' => 'PaginasController@enviarmail',
    'as'   => 'enviarmail',
]);

// ADMINISTRADOR

Route::prefix('adm')->group(function () {

//DASHBOARD
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

//Route::get('/home', 'HomeController@index')->name('home');
    /*------------Home----------------*/
    Route::resource('home', 'adm\HomeController'); //evaluar
    //Banner
    Route::get('/banner', 'adm\HomeController@banner')->name('banner');
    Route::get('/banner/{banner_id}', 'adm\HomeController@banneredit')->name('banneredit');
    Route::put('/banner/{banner_id}/update', 'adm\HomeController@bannerupdate')->name('bannerupdate');
    /*------------sliders----------------*/
    Route::resource('sliders', 'adm\SlidersController');
    Route::delete('sliders/{id}/destroy', [
        'uses' => 'adm\SlidersController@destroy',
        'as'   => 'sliders.destroy',

    ]);
    /*------------SERVICIOS----------------*/
    Route::resource('servicios', 'adm\ServiciosController');

    /*------------USUARIOS----------------*/
    Route::resource('user', 'adm\UserController');

    /*------------MANTENIMIENTO----------------*/
    Route::resource('mantenimientos', 'adm\MantenimientosController');

    /*------------EMPRESA----------------*/
    Route::resource('empresas', 'adm\EmpresasController');

    /*------------CLIENTES----------------*/
    Route::resource('clientes', 'adm\ClientesController');
    Route::delete('clientes/{id}/destroy', [
        'uses' => 'adm\ClientesController@destroy',
        'as'   => 'clientes.destroy',

    ]);

    /*------------CATEGORIAS----------------*/
    Route::resource('categorias', 'adm\CategoriasController');

    /*------------PRODUCTOS----------------*/
    Route::resource('productos', 'adm\ProductosController');
    /*------------Imagen----------------*/
    Route::delete('imagen/{id}/destroy', [
        'uses' => 'adm\ProductosController@destroyimg',
        'as'   => 'imgproducto.destroy',
    ]);

    /*-------imagenes productos----------*/
    Route::get('/producto/imagenes/{producto_id}', 'adm\ProductosController@imagen')->name('imagenpro');
    //agregar nuevas imagenes de productos
    Route::post('producto/{id}/imagen/', 'adm\ProductosController@nuevaimagen')->name('nuevaimagenpro'); //es el store de las
    // Rutas de reportes pdf
    Route::get('pdf/{id}', ['uses' => 'adm\ProductosController@downloadPdf', 'as' => 'file-pdf']);
    // Rutas de reportes pdf desde la web
    Route::get('pdf2/{id}', ['uses' => 'adm\ProductosController@downloadPdf2', 'as' => 'file-pdf2']);

    /*------------CATEGORIAS DE OBRAS----------------*/
    Route::resource('cat-obras', 'adm\CatObrasController');

    /*------------OBRAS----------------*/
    Route::resource('obras', 'adm\ObrasController');

    /*   /*------------IMAGEN\OBRAS----------------*/
    /*-------imagenes obras----------*/
    Route::get('/obras/imagenes/{obra_id}', 'adm\ObrasController@imagenes')->name('imagenobra'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('obras/{id}/imagen/', 'adm\ObrasController@nuevaimagen')->name('nuevaimagen'); //es el store de las imagenes
    Route::delete('imagen_obras/{id}/destroy', [ //eliminar imagenes
        'uses' => 'adm\ObrasController@destroyimg',
        'as'   => 'imgobras.destroy',
    ]);

    /*------------CONSEJOS----------------*/
    Route::resource('consejos', 'adm\ConsejosController');

    /*------------DATOS----------------*/
    Route::resource('datos', 'adm\DatosController');

    /*------------METADATOS----------------*/
    Route::resource('metadatos', 'adm\MetadatosController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
