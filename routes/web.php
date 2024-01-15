<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
//use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

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


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
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

    // Route sliders
    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('sliders.delete');

        Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
    });

    // Route Information
//    Route::prefix('information')->group(function () {
//        Route::get('/', [InformationController::class, 'index'])->name('information.index');
//        Route::get('/create', [InformationController::class, 'create'])->name('information.create');
//        Route::get('/edit/{id}', [InformationController::class, 'edit'])->name('information.edit');
//        Route::get('/delete/{id}', [InformationController::class, 'delete'])->name('information.delete');
//
//        Route::post('/store', [InformationController::class, 'store'])->name('information.store');
//        Route::post('/update/{id}', [InformationController::class, 'update'])->name('information.update');
//    });

    // Route user
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/delete/permanently/{id}', [UserController::class, 'deletePermanently'])->name('users.delete.permanently');
        Route::get('/delete/recover/{id}', [UserController::class, 'deleteRecover'])->name('users.delete.recover');

        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
    });

    // Route role
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
        Route::get('/delete/permanently/{id}', [RoleController::class, 'deletePermanently'])->name('roles.delete.permanently');
        Route::get('/delete/recover/{id}', [RoleController::class, 'deleteRecover'])->name('roles.delete.recover');

        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    });

    // Route Setting
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings.index');
        Route::get('/create', [SettingController::class, 'create'])->name('settings.create');
        Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');
        Route::get('/delete/{id}', [SettingController::class, 'delete'])->name('settings.delete');

        Route::post('/store', [SettingController::class, 'store'])->name('settings.store');
        Route::post('/update/{id}', [SettingController::class, 'update'])->name('settings.update');
    });

    // Route categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/delete/permanently/{id}', [CategoryController::class, 'deletePermanently'])->name('categories.delete.permanently');
        Route::get('/delete/recover/{id}', [CategoryController::class, 'deleteRecover'])->name('categories.delete.recover');

        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    });

    // Route products
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
        Route::get('/delete/permanently/{id}', [ProductController::class, 'deletePermanently'])->name('products.delete.permanently');
        Route::get('/delete/recover/{id}', [ProductController::class, 'deleteRecover'])->name('products.delete.recover');

        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
    });
});

