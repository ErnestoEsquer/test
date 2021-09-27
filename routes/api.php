<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/empresas', 'App\Http\Controllers\EmpresasController@index'); //mostrar todos los registros
Route::post('/empresas', 'App\Http\Controllers\EmpresasController@store'); //crear un registro
Route::put('/empresas/{id}', 'App\Http\Controllers\EmpresasController@update'); //actualizar un registro
Route::delete('/empresas/{id}', 'App\Http\Controllers\EmpresasController@destroy'); //actualizar un registro
