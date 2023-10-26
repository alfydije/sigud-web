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
Route::get('/admin/jenisbarang', function () {
    return view('Jenis_Barang/index');
});

Route::get('/admin', function () {
    return view('Superadmin/index');
});


Route::get('/operator', function () {
    return view('Operator/index');
});


