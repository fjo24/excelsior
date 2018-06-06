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
    // Rutas de reportes pdf
    Route::get('pdf/{id}', ['uses' => 'adm\ProductosController@downloadPdf', 'as' => 'file-pdf']);

    /*------------CATEGORIAS DE OBRAS----------------*/
    Route::resource('cat-obras', 'adm\CatObrasController');

    /*------------OBRAS----------------*/
    Route::resource('obras', 'adm\ObrasController');

    /*   /*------------IMAGEN\OBRAS----------------*/
    /*-------imagenes modelos----------*/
    Route::get('/obras/imagenes/{obra_id}', 'adm\ObrasController@imagenes')->name('imagenobra');
//agregar nuevas imagenes de productos
    Route::post('obras/{id}/imagen/', 'adm\ObrasController@nuevaimagen')->name('nuevaimagen');
    Route::post('obras/imagenes/{id}/', 'adm\ObrasController@nuevaimagen')->name('imagenobra');
    Route::delete('obras/{id}/destroy', [
        'uses' => 'adm\ObrasController@destroyimg',
        'as'   => 'imgmodelo.destroy',
    ]);

});
