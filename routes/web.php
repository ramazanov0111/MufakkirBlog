<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [BlogController::class, 'home'])->name('home');
Route::get('/blog/category/{slug?}', [BlogController::class, 'category'])->name('category');
Route::get('/blog/post/{slug?}', [BlogController::class, 'post'])->name('post');
Route::get('/blog/books/{type?}', [BlogController::class, 'bookList'])->name('books');
Route::get('/blog/book/{slug?}', [BlogController::class, 'bookItem'])->name('book');

Route::get('/download/{path?}', function ($path) {
    $file = asset("../storage/app/public/".$path);

    $headers = array(
        'Content-Type: application/pdf',
    );

    return Response::download($file, $path, $headers);
})->name('file');


Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.index');
    Route::resource('/category', '\App\Http\Controllers\Admin\CategoryController', ['as'=>'admin']);
    Route::resource('/post', '\App\Http\Controllers\Admin\PostController', ['as'=>'admin']);
    Route::resource('/book', '\App\Http\Controllers\Admin\BookController', ['as'=>'admin']);
    Route::group(['prefix' => 'user_management', 'namespace' => 'UserManagement'], function () {
        Route::resource('/user', '\App\Http\Controllers\Admin\UserManagement\UserController', ['as'=>'admin.user_management']);
    });
});

//// Download Route
//Route::get('/blog/book/download/{filename}', function($filename)
//{
//    // Check if file exists in app/storage/file folder
//    $file_path = storage_path() .'/public/books/'. $filename;
//    if (file_exists($file_path))
//    {
//        // Send Download
//        return Response::download($file_path, $filename, [
//            'Content-Length: '. filesize($file_path)
//        ]);
//    }
//    else
//    {
//        // Error
//        exit('Requested file does not exist on our server!');
//    }
//})
//    ->where('filename', '[A-Za-z0-9\-\_\.]+')->name('download');
