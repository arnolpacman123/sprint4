<?php

use App\Http\Controllers\Api\AplicacionEncuestaController;
use App\Http\Controllers\Api\EncuestaController;
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

Route::resource('encuestas', EncuestaController::class);
Route::resource('aplicaciones-encuestas', AplicacionEncuestaController::class)->parameters(['aplicaciones-encuestas' => 'aplicacion-encuesta']);