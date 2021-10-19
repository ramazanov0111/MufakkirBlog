<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BlogController::class, 'home'])->name('home');
Route::get('/blog/category/{slug?}', [BlogController::class, 'category'])->name('category');
Route::get('/blog/post/{slug?}', [BlogController::class, 'post'])->name('post');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.index');
    Route::resource('/category', '\App\Http\Controllers\Admin\CategoryController', ['as'=>'admin']);
    Route::resource('/post', '\App\Http\Controllers\Admin\PostController', ['as'=>'admin']);
    Route::group(['prefix' => 'user_management', 'namespace' => 'UserManagement'], function () {
        Route::resource('/user', '\App\Http\Controllers\Admin\UserManagement\UserController', ['as'=>'admin.user_management']);
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
