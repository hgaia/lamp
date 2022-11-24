<?php

use App\Http\Controllers\InventaryController;
use App\Http\Controllers\UserController;
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


Route::prefix('inventary')->group(function () {
    Route::get('', [InventaryController::class, 'get']);
    Route::post('create', [InventaryController::class, 'create']);
    Route::post('update/{id}', [InventaryController::class, 'update']);
    Route::get('delete/{id}', [InventaryController::class, 'delete']);
});

Route::prefix('user')->group(function () {
    Route::get('', [UserController::class, 'get']);
    Route::post('create', [UserController::class, 'create']);
    Route::post('update/{id}', [UserController::class, 'update']);
    Route::get('delete/{id}', [UserController::class, 'delete']);
});