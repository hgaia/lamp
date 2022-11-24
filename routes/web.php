<?php

use App\Http\Controllers\TodolistController;
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


Route::prefix('todolist')->group(function () {
    Route::get('/', [TodolistController::class, 'index'])->name('index');
    Route::post('/', [TodolistController::class, 'create'])->name('create');
    Route::delete('/{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy');
    Route::post('/{todolist:id}', [TodolistController::class, 'update'])->name('update');
});