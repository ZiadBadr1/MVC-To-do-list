<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks',TaskController::class );
Route::get('tasks/delete/{id}',[TaskController::class,"delete"])->name("tasks.delete");
Route::get('tasks/showDeletedTask',[TaskController::class,"showDeletedTask"])->name("tasks.showDeletedTask");
Route::get('tasks/restore/{id}',[TaskController::class,"restore"])->name("tasks.restore");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
