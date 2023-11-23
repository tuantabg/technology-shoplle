<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/admin', [AdminController::class, 'login'])->name('login.admin');
Route::post('/admin', [AdminController::class, 'postLogin'])->name('post.login.admin');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.page.main');
    })->name('dashboard');

    // Route menus
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menus.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menus.edit');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('menus.delete');

        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
    });

    // Route categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    });

    // Route products
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
    });
});
