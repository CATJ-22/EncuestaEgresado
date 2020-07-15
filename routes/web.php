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
Route::get('/modifpreg','ModifpregController@show');
Route::get('/estadoencues','EstadoencuesController@GetCorreos');
Route::get('allpreg','ModifpregController@GetPreguntas');
//MENU EGRESADO

Route::get('/menu','MenuController@show');
Route::get('/menueg','MenuEGController@show');
Route::get('/encuestaeg','EncuestaEGController@show');

//LOGIN

Route::get('/home', 'HomeController@index')->name('home');


