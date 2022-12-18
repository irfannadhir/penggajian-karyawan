<?php

use App\Http\Controllers\BesaranUpahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PerhitunganPayrollController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn () => redirect('/login'));

Auth::routes();

Route::group([
    'middleware' => ['auth', 'role:admin payroll']
], function () {

    Route::resource('user', UserController::class);
});

Route::group([
    'middleware' => ['auth', 'role:admin payroll,karyawan borongan,keuangan,admin produksi']
], function () {
    Route::get('/dashboard', [HomeController::class, 'index']);
});

Route::group([
    'middleware' => ['auth', 'role:karyawan borongan,admin payroll'],
], function () {
    Route::get('print-slip', [PrintController::class, 'index']);
    Route::post('print-slip', [PrintController::class, 'print']);

    Route::get('payroll/detail-payroll/{payroll}', [PerhitunganPayrollController::class, 'detail_payroll']);
    Route::resource('payroll', PerhitunganPayrollController::class);
});

Route::group([
    'middleware' => ['auth', 'role:keuangan,admin payroll'],
],  function () {
    Route::get('laporan-transaksi', [ReportController::class, 'index']);
    Route::post('print-transaksi', [ReportController::class, 'print']);
});

Route::group([
    'middleware' => ['auth', 'role:admin produksi,admin payroll'],
], function () {

    Route::resource('produk', ProdukController::class);

    Route::resource('kategori-produk', KategoriProdukController::class);
});
