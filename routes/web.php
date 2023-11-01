<?php

use Illuminate\Support\Facades\Route;

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

// Superadmin //
Route::get('/admin', function () {
    return view('Superadmin/index');
});
Route::get('/admin/brand', function () {
    return view('Master_Data/Brand/index');
});
Route::get('/admin/kategori', function () {
    return view('Master_Data/Kategori/index');
});
Route::get('/admin/pengguna', function () {
    return view('Master_Data/pengguna/index');
});

Route::get('/admin/laporan/lap_barang_masuk', function () {
    return view('Laporan/lap_barang_masuk/index');
});

Route::get('/admin/laporan/lap_barang_keluar', function () {
    return view('Laporan/lap_barang_keluar/index');
});

Route::get('/admin/laporan', function () {
    return view('Laporan/lap_stok_barang/index');
});

Route::get('/admin/pengguna/create', function () {
    return view('Master_Data/pengguna/create');
});
Route::get('/admin/permintaan', function () {
    return view('Permintaan/index');
});
Route::get('/admin/permintaan/view', function () {
    return view('Permintaan/view');
});

Route::get('/', function () {
    return view('login/index');
});


// Barang Masuk

Route::get('/admin/barangmasuk', function () {
    return view('transaksi/barangmasuk/index');
});

// Barang Kelaur

Route::get('/admin/barangkeluar', function () {
    return view('transaksi/barangkeluar/index');
});

//Operator

Route::get('/operator', function () {
    return view('Operator/index');
});


