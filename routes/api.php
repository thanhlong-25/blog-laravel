<?php

use App\Http\Controllers\api\v1\CategoryPostsController;
use \App\Http\Controllers\api\v1\CustomerController;
use App\Http\Controllers\api\v1\HomeController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/', function () {
//     return view('welcome');p
// });

// Route::get('', [HomeController::class, 'index']);

Route::prefix('v1')->group(function(){
    Route::get('all_customer', [CustomerController::class, 'index' ]);
    Route::get('create_customer', [CustomerController::class, 'create' ]);
    Route::post('store_customer', [CustomerController::class, 'store' ]);
    Route::get('show_customer/{id_customer}', [CustomerController::class, 'show' ]);
    Route::get('edit_customer/{id_customer}', [CustomerController::class, 'edit' ]);
    Route::put('update_customer/{id_customer}', [CustomerController::class, 'update' ]);
    Route::delete('delete_customer/{id_customer}', [CustomerController::class, 'destroy' ]);
});

// Route::prefix('v1')->group(function(){
//     Route::get('', [CategoryPostsController::class, 'index' ]);
//     Route::get('add-category-post', [CategoryPostsController::class, 'create' ]);
//     Route::post('store_customer', [CategoryPostsController::class, 'store' ]);
//     Route::get('show_customer/{id_customer}', [CategoryPostsController::class, 'show' ]);
//     Route::get('edit_customer/{id_customer}', [CategoryPostsController::class, 'edit' ]);
//     Route::put('update_customer/{id_customer}', [CategoryPostsController::class, 'update' ]);
//     Route::delete('delete_customer/{id_customer}', [CategoryPostsController::class, 'destroy' ]);
// });
Route::resource('category', '\App\Http\Controllers\api\v1\CategoryPostsController');
Route::resource('post', '\App\Http\Controllers\api\v1\PostController');

// Route::resource('customer', '\App\Http\Controllers\CustomerController')->except(['edit', 'create']);
// Route::resource('customer', '\App\Http\Controllers\CustomerController')->only(['index', 'show', 'update', 'destroy', 'store']);