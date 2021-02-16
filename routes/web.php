<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProfesorController;
use  App\Http\Controllers\Registro_AcademicoController;
use  App\Http\Controllers\AsignaturaController;
use  App\Http\Controllers\EstudianteController;
use  App\Http\Controllers\PDFController;



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

Route::get('/pdf', 'PDFController@PDF')->name('descargarPDF');
Route::get('/pdfProfesores', 'App\Http\Controllers\PDFController@PDFProfesores')->name('descargarPDFProfesores');
Route::get('/pdfEstudantes', 'App\Http\Controllers\PDFController@PDFEstudiantes')->name('descargarPDFEstudiantes');
Route::get('/pdfAsignaturas', 'App\Http\Controllers\PDFController@PDFAsignaturas')->name('descargarPDFAsignaturas');
Route::get('/pdfRegistrosAcademicos', 'App\Http\Controllers\PDFController@PDFRegistrosAcademicos')->name('descargarPDFRegistrosAcademicos');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
