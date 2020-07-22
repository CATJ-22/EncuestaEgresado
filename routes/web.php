<?php

use Illuminate\Support\Facades\Route;

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

//MENU DE LA SECRETARIA DE LA VICEDENA DE ADMINSITRACION
Auth::routes();

Route::get('/menusecretaria','MenuASController@show');
Route::get('/encuesta','EncuestaController@show');
Route::get('/agregarpreg', 'AgregarpregController@show');
Route::post('/agregarpreg', 'AgregarpregController@store');
Route::get('/modifpreg','ModifpregController@show');
Route::get('/estadoencues','EstadoencuesController@show');
Route::get('allest','EstadoencuesController@GetEstados');

//vicedecana
Route::get('/modifpreg','ModifpregController@show');
Route::get('allpreg','ModifpregController@GetPreguntas');
Route::get('/delete/{d}','ModifpregController@delete');
Route::get('/editarpreg/{idpreg}','ModifpregController@Editarpregunt');
Route::patch('/editarpreg/{idpreg}','ModifpregController@Updatepregunt');

Route::get('/mantenimiento', 'SEL_Controllers\MantenimientoController@preguntasEmp');
Route::get('/menu/emp/mantenimiento/delete/{id}', 'SEL_Controllers\MantenimientoController@delete');
Route::get('/menu/emp/mantenimiento/agregar','SEL_Controllers\PantallaController@agregar');
Route::post('/menu/emp/mantenimiento/agregando','SEL_Controllers\MantenimientoController@store');
Route::get('/menu/emp/mantenimiento/{id_pregunta}/edit','SEL_Controllers\MantenimientoController@edit');
Route::patch('/menu/emp/mantenimiento/{id_pregunta}','SEL_Controllers\MantenimientoController@update');
Route::get('/menu/emp/unavailable','SEL_Controllers\PantallaController@mant');

//MENU EGRESADO

Route::get('/menu','MenuController@show');
Route::get('/menueg','MenuEGController@show');
Route::get('/encuestaeg','EncuestaEGController@show');

//LOGIN

Route::get('/home', 'HomeController@index')->name('home');


