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




Auth::routes();
Route::resource('empresas','App\Http\Controllers\EmpresasController');
Route::resource('empleados','App\Http\Controllers\EmpleadosController');

Route::get('/empresasSelect', [App\Http\Controllers\EmpleadosController::class, 'empresas']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




