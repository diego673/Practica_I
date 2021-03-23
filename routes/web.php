<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProfesorController;
use  App\Http\Controllers\Registro_AcademicoController;
use  App\Http\Controllers\AsignaturaController;
use  App\Http\Controllers\EstudianteController;



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

Route::resource('profesor', ProfesorController::class)->middleware('auth');
Route::resource('registro_Academico', Registro_AcademicoController::class)->middleware('auth');
Route::resource('asignatura', AsignaturaController::class)->middleware('auth');
Route::resource('estudiante', EstudianteController::class)->middleware('auth');

Route::put('/profesor/actualizar', 'App\Http\Controllers\ProfesorController@update');
Route::post('/profesor/registrar', 'App\Http\Controllers\ProfesorController@store');
Route::put('/profesor/eliminar', 'App\Http\Controllers\ProfesorController@eliminar');

Route::put('/estudiante/actualizar', 'App\Http\Controllers\EstudianteController@update');
Route::post('/estudiante/registrar', 'App\Http\Controllers\EstudianteController@store');
Route::put('/estudiante/eliminar/{id}', 'App\Http\Controllers\EstudianteController@eliminar');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
