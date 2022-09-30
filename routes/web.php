<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

//Rotas de usuários
Route::get('/students', [App\Http\Controllers\StudentsController::class, 'index'])->name('list')->middleware('auth');
Route::get('/students/new', [App\Http\Controllers\StudentsController::class, 'new'])->middleware('auth');
Route::post('/students/add', [\App\Http\Controllers\StudentsController::class, 'add'])->middleware('auth');
Route::get('/students/{id}/edit', [\App\Http\Controllers\StudentsController::class, 'edit'])->middleware('auth');
Route::post('/students/update/{id}', [\App\Http\Controllers\StudentsController::class, 'update'])->middleware('auth');
Route::post('/students/delete/{id}', [\App\Http\Controllers\StudentsController::class, 'delete'])->middleware('auth');
//------------------------------------------------------------------------------------------------