<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\consumindoApiController;

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

// Listar encomendas
Route::get('encomendas', [EncomendaController::class, 'index']);

// Listar um encomenda
Route::get('encomenda/{id}', [EncomendaController::class, 'show']);

// Criar encomenda
Route::post('encomenda', [EncomendaController::class, 'store']);

// Atualizar encomenda
Route::put('encomenda/{id}', [EncomendaController::class, 'update']);

// Consumir API
Route::get('/consumindoApi/{id}', [consumindoApiController::class, 'consumirApi']);


