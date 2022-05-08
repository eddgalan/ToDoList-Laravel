<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;
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
Route::get('/to-do-list', [TodosController::class, 'index'])->name('Todos');
Route::post('/to-do-list', [TodosController::class, 'store'])->name('Todos');
Route::get('/to-do-list/{id}', [TodosController::class, 'show'])->name('TodosShow');
Route::patch('/to-do-list/{id}', [TodosController::class, 'update'])->name('TodosUpdate');
Route::delete('/to-do-list/{id}', [TodosController::class, 'destroy'])->name('TodosDestroy');
Route::resource('categories', CategoriesController::class);
