<?php

use App\Http\Controllers\InteressadoController;
use App\Http\Controllers\ImovelController;

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




Route::get('imoveis', [ImovelController::class, 'index']);
Route::post('imovel', [ImovelController::class, 'store']);
Route::put('imovel/{id}', [ImovelController::class, 'update']);
Route::delete('imovel/{id}', [ImovelController::class,'destroy']);

Route::get('interessados', [InteressadoController::class, 'index']);
Route::post('interessado', [InteressadoController::class, 'store']);
Route::put('interessado/{id}', [InteressadoController::class, 'update']);
Route::delete('interessado/{id}', [InteressadoController::class,'destroy']);














