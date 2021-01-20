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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registro', [App\Http\Controllers\UserController::class, 'createUser']);
Route::post('ingreso', [App\Http\Controllers\AuthController::class, 'auth']);
Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index']);
Route::post('eliminar', [App\Http\Controllers\UserController::class, 'deleteUser']);
Route::post('actualizar', [App\Http\Controllers\UserController::class, 'updateUser']);

// Consultas para los desplegables de paises, departamentos y ciudades

Route::get('paises', [App\Http\Controllers\SelectController::class, 'countries']);
Route::get('departamentos', [App\Http\Controllers\SelectController::class, 'departments']);
Route::get('ciudades', [App\Http\Controllers\SelectController::class, 'cities']);
