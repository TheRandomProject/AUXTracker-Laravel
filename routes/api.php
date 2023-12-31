<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/egants', [\App\Http\Controllers\EgantController::class, 'index']);
Route::get('/aux-types', [\App\Http\Controllers\AuxTypeController::class, 'index']);
ROute::get('/aux-history', [\App\Http\Controllers\AuxHistoryController::class, 'index']);
ROute::post('/aux-history', [\App\Http\Controllers\AuxHistoryController::class, 'store']);