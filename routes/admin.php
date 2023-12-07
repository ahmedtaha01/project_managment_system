<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Admin\DashboardController;


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

Route::middleware('auth:admin')->group(function (){
    Route::get('/dashboard', [DashboardController::class,'dashboard']);

    Route::get('/projects', [AdminController::class,'projects']);
    
    Route::get('/tasks/{id}', [AdminController::class,'tasks']);
    
    Route::get('/email/{taskId}/{userId}',[AdminController::class , 'email']);
    
    Route::get('/download/{filename}',[DownloadController::class , 'download']);
    
    Route::resource('/user',UserController::class);
});





require __DIR__.'/auth.php';