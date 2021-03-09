<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\HomeController;
use App\Http\Controllers\api\v1\PostController;
use Illuminate\Support\Facades\Auth;

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

Route::get('', [HomeController::class, 'index']);

Auth::routes();

Route::get('/tim-kiem', [App\Http\Controllers\api\v1\HomeController::class, 'search'])->name('search');
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
