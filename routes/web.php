<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PerhitunganPayrollController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::group([
    'middleware' => ['auth', 'role:admin payroll']
], function () {

    Route::get('/dashboard', [HomeController::class, 'index']);

    Route::resource('user', UserController::class);

    Route::resource('produk', ProdukController::class);

    Route::resource('kategori-produk', KategoriProdukController::class);

    Route::resource('payroll', PerhitunganPayrollController::class);
});
