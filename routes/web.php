<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('index');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::delete('/task/destroy/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::post('/report', [ReportController::class, 'generate'])->name('report.generate');
