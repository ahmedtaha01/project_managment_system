<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;


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

    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

    Route::resource('/projects',ProjectController::class);

    Route::get('tasks-type/{type}',[TaskController::class,'indexTypes'])->name('tasks.types');

    Route::resource('/tasks',TaskController::class);
    
    Route::resource('/users',UserController::class);

    Route::resource('/message',MessageController::class);
    
    Route::get('/email/{taskId}/{userId}',[MailController::class , 'index']);


require __DIR__.'/auth.php';