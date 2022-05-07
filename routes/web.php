<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
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

// Route::get('/to-do-list', function () {
//     return view('index');
// });

Route::get('/to-do-list', [TodosController::class, 'index'])->name('Todos');
Route::post('/to-do-list', [TodosController::class, 'store'])->name('Todos');
Route::patch('/to-do-list', [TodosController::class, 'store'])->name('TodosEdit');
Route::delete('/to-do-list', [TodosController::class, 'store'])->name('TodosDestroy');
