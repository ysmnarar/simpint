<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Ini Akses Tamu = ga usah login bisa liat landing page
Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('front.index');
    Route::get('/detail/{id}', 'detail')->name('admin.index.detail');
    Route::get('/likes', 'likes')->name('index.likes');

    Route::post('/add/category', 'addCategory')->name('admin.add.category');
    Route::get('/category/edit/{id}', 'editCategory')->name('admin.edit.category');

    // filter category
    Route::get('/categories/toner', 'Toner');
    Route::get('/categories/facial-wash', 'FacialWash');
    Route::get('/categories/serum', 'Serum');
    Route::get('/categories/moisturizer', 'Moisturizer');
    Route::get('/categories/sunscreen', 'Sunscreen');
    Route::get('/categories/lipbalm', 'Lipbalm');
});

Route::controller(LikeController::class)->group(function () {
    Route::get('/like/store', 'store')->name('like.store');
});

Route::prefix('admin')->group(function () {
    Route::controller(BaseController::class)->group(function () {
        Route::get('/home', 'Index')->name('index.home');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'category')->name('admin.index.category');
        Route::get('/category/form', 'formCategory')->name('admin.form.category');
        Route::post('/add/category', 'addCategory')->name('admin.add.category');
        Route::get('/category/edit/{id}', 'editCategory')->name('admin.edit.category');
        Route::put('/category/update/{id}', 'updateCategory')->name('admin.update.category');
        Route::delete('/category/delete', 'deleteCategory')->name('admin.delete.category');

        // Fitur Search
        Route::get('/category-search', 'searchCategory')->name('category.search');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'product')->name('admin.index.product');
        Route::get('/product/form', 'formProduct')->name('admin.form.product');
        Route::post('/add/product', 'addProduct')->name('admin.add.product');
        Route::get('/desc/product', 'descProduct')->name('admin.desc.product');
        Route::get('/product/edit/{id}', 'editProduct')->name('admin.edit.product');
        Route::put('/product/update/{id}', 'updateProduct')->name('admin.update.product');
        Route::delete('/product/delete', 'deleteProduct')->name('admin.delete.product');

    //     // Buat filter data product berdasarkan category
    //     Route::get('/product/toner', 'toner')->name('product.toner');
    //     Route::get('/product/facial/wash', 'facialWash')->name('product.facial.wash');
    //     Route::get('/product/serum', 'serum')->name('product.serum');
    //     Route::get('/product/moisturizer', 'moisturizer')->name('product.moisturizer');
    //     Route::get('/product/sunscreen', 'sunscreen')->name('product.sunscreen');
    //     Route::get('/product/lipbalm', 'lipbalm')->name('product.lipbalm');

    //     // Fitur Search
    //     Route::get('/product-search', 'searchProduct')->name('product.search');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
