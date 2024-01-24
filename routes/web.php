<?php

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Controllers\Client\HomeController;


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


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/admin', [AdminController::class, 'index'])->name('login.admin');
Route::post('/admin', [AdminController::class, 'postLogin'])->name('post.login.admin');

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('/dashboard', function () {
        return view('admin.page.main');
    })->name('dashboard');

    // Route user
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->middleware('can:listUser')->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->middleware('can:addUser')->name('users.create');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware('can:editUser')->name('users.edit');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->middleware('can:deleteUser')->name('users.delete');
        Route::get('/delete/permanently/{id}', [UserController::class, 'deletePermanently'])->name('users.delete.permanently');
        Route::get('/delete/recover/{id}', [UserController::class, 'deleteRecover'])->name('users.delete.recover');

        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
    });

    // Route role
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->middleware('can:listRole')->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->middleware('can:addRole')->name('roles.create');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->middleware('can:editRole')->name('roles.edit');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->middleware('can:deleteRole')->name('roles.delete');
        Route::get('/delete/permanently/{id}', [RoleController::class, 'deletePermanently'])->name('roles.delete.permanently');
        Route::get('/delete/recover/{id}', [RoleController::class, 'deleteRecover'])->name('roles.delete.recover');

        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    });

    // Route categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->middleware('can:listCategory')->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->middleware('can:addCategory')->name('categories.create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->middleware('can:editCategory')->name('categories.edit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->middleware('can:deleteCategory')->name('categories.delete');
        Route::get('/delete/permanently/{id}', [CategoryController::class, 'deletePermanently'])->name('categories.delete.permanently');
        Route::get('/delete/recover/{id}', [CategoryController::class, 'deleteRecover'])->name('categories.delete.recover');

        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    });

    // Route products
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->middleware('can:listProduct')->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->middleware('can:addProduct')->name('products.create');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->middleware('can:editProduct')->name('products.edit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->middleware('can:deleteProduct')->name('products.delete');
        Route::get('/delete/permanently/{id}', [ProductController::class, 'deletePermanently'])->name('products.delete.permanently');
        Route::get('/delete/recover/{id}', [ProductController::class, 'deleteRecover'])->name('products.delete.recover');

        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
    });

    // Route menus
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->middleware('can:listMenu')->name('menus.index');
        Route::get('/create', [MenuController::class, 'create'])->middleware('can:addMenu')->name('menus.create');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->middleware('can:editMenu')->name('menus.edit');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->middleware('can:deleteMenu')->name('menus.delete');

        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
    });

    // Route sliders
    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->middleware('can:listSlide')->name('sliders.index');
        Route::get('/create', [SliderController::class, 'create'])->middleware('can:addSlide')->name('sliders.create');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->middleware('can:editSlide')->name('sliders.edit');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->middleware('can:deleteSlide')->name('sliders.delete');

        Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
    });

    // Route Setting
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->middleware('can:listInformation')->name('settings.index');
        Route::get('/create', [SettingController::class, 'create'])->middleware('can:addInformation')->name('settings.create');
        Route::get('/edit/{id}', [SettingController::class, 'edit'])->middleware('can:editInformation')->name('settings.edit');
        Route::get('/delete/{id}', [SettingController::class, 'delete'])->middleware('can:deleteInformation')->name('settings.delete');

        Route::post('/store', [SettingController::class, 'store'])->name('settings.store');
        Route::post('/update/{id}', [SettingController::class, 'update'])->name('settings.update');
    });

    // Route Permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [PermissionController::class, 'create'])->middleware('can:addPermission')->name('permissions.create');
        Route::post('/store', [PermissionController::class, 'store'])->name('permissions.store');
    });
});

