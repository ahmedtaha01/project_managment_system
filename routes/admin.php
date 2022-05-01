<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
// use App\Http\Middleware\CheckAdmin;

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

Route::middleware('isAdmin')->group(function(){
    Route::get('/adminDashboard', [AdminController::class,'dashboard']);

    Route::get('/projects', [AdminController::class,'projects']);

    Route::get('/tasks/{id}', [AdminController::class,'tasks']);

    Route::get('/email/{id}',[AdminController::class , 'email']);

    Route::resource('/user',UserController::class);
});



require __DIR__.'/auth.php';