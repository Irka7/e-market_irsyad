<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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

// Route::get('login', [UserController::class, 'index']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'layout']);
    Route::get('profile', [HomeController::class, 'profile']);
    Route::get('contact', [HomeController::class, 'contact']);
    Route::resource('produk', ProdukController::class);
    Route::resource('pemasok', PemasokController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('pembelian', PembelianController::class);
});


//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
