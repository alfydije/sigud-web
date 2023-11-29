<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// LOGIN //
Route::get('/', [AuthController::class, 'halamanlogin']);
Route::post('/', [AuthController::class, 'login']);


Route::get('/brand', [BrandController::class, 'Brand']);
Route::post('/brand', [BrandController::class, 'store']);
Route::get('/brand/show', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/delete', [BrandController::class, 'delete'])->name('brand.delete');
Route::post('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');

Route::get('/kategori', [KategoriController::class, 'kategori']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/show', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/kategori/delete', [KategoriController::class, 'delete'])->name('kategori.delete');
Route::post('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

Route::get('/barang', [BarangController::class, 'Barang']);

Route::get('/supplier', [SupplierController::class, 'Supplier']);
Route::post('/supplier', [SupplierController::class, 'store']);
Route::get('/supplier/show', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/supplier/delete', [SupplierController::class, 'delete'])->name('supplier.delete');

Route::post('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');



Route::get('/admin', function () {
    return view('Superadmin/index');
});



// Master Data //
Route::get('/admin/brand', function () {
    return view('Master_Data/Brand/index');
});
Route::get('/admin/barang', function () {
    return view('Master_Data/Barang/index');
});
Route::get('/admin/supplier', function () {
    return view('Master_Data/Supplier/index');
});
Route::get('/admin/kategori', function () {
    return view('Master_Data/Kategori/index');
});
Route::get('/admin/pengguna/create', function () {
    return view('Master_Data/pengguna/create');
});


Route::get('/admin/client', function () {
    return view('Master_Data/pengguna/client');
});
Route::get('/admin/operator', function () {
    return view('Master_Data/pengguna/operator');
});

//  Laporan  //
Route::get('/admin/laporan/lap_barang_masuk', function () {
    return view('Laporan/lap_barang_masuk/index');
});
Route::get('/admin/laporan/lap_barang_keluar', function () {
    return view('Laporan/lap_barang_keluar/index');
});
Route::get('/admin/laporan', function () {
    return view('Laporan/lap_stok_barang/index');
});



// Permintaan //
Route::get('/admin/permintaan', function () {
    return view('Permintaan/index');
});
Route::get('/admin/permintaan/view', function () {
    return view('Permintaan/view');
});



// Barang Masuk //
Route::get('/admin/barangmasuk', function () {
    return view('transaksi/barangmasuk/index');
});



// Barang Keluar //
Route::get('/admin/barangkeluar', function () {
    return view('transaksi/barangkeluar/index');
});



// Operator //
Route::get('/operator', function () {
    return view('Operator/index');
});


