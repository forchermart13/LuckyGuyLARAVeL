<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SubController;

Route::post('/admin/subcategory/store', [SubController::class,'storeSubcategory'])->name('admin.subcategory.store');
Route::post('/admin/subcategory/store', [SubController::class,'storeSubcategory'])->name('admin.subcategory.store');
Route::get('/admin/subcategory/add', [SubController::class, 'addSubcategory'])->name('admin.subcategory.add');


Route::get('/admin/category/add', [ProductController::class, 'addCategory']);
Route::post('/admin/category/store',[ProductController::class,'storeCategory']);







Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');Route::get('/register',[UserRegisterController::class,'registerPage']);
Route::post('/register',[UserRegisterController::class,'register'])->name('user.register');


Route::get('/login',[UserAuthController::class,'loginPage']);
Route::post('/login',[UserAuthController::class,'login']);

Route::middleware('user')->group(function(){

    Route::get('/dashboard',[UserAuthController::class,'dashboard']);
    Route::get('/logout',[UserAuthController::class,'logout']);

});


Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'loginPage']);
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [AdminAuthController::class, 'dashboard']);
        Route::get('/logout', [AdminAuthController::class, 'logout']);

        Route::get('/products',[ProductController::class,'index'])->name('admin.products');

        Route::get('/order', [OrderController::class, 'index'])->name('admin.order');

    });

});


Route::get('/', function () {
    return view('landing.welcome_to_hell', [
        'title' => 'Welcome To Hell',
        'message' => 'Laddddravel landing screen loaded successfully.'
    ]);
});