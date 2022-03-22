<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!````
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [SiteController::class, 'home'])->middleware('auth');
Route::get('/logout', [SiteController::class, 'logout']);

Route::middleware(['auth', 'admin'])->prefix('/admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->middleware('can:update-users');

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);

    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
});
