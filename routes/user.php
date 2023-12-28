<?php

use App\Http\Controllers\User\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;

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

Route::name('user.')->group(function(){

    Route::get('/home', [HomeController::class,'index'])->name('home');

    Route::get('task/{task}',[TaskController::class,'show'])->name('task');

    Route::put('task/{task}',[TaskController::class,'updateToInProgress'])->name('task-to-inprogress');

    Route::put('task/{task}',[TaskController::class,'updateToCodeReview'])->name('task-to-codereview');

});

// require __DIR__.'/auth.php';