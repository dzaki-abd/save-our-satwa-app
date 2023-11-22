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

// DASHBOARD ROUTE

Route::get('/dashboard/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/dashboard/donasi', function () {
    return view('dashboard.donasi');
});

Route::get('/dashboard/laporan', function () {
    return view('dashboard.laporan');
});

Route::get('/dashboard/laporan/detail-laporan/{id}', function ($id) {
    return view('dashboard.laporan.detail-laporan', ['id' => $id]);
});

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
});

Route::get('/dashboard/artikel', function () {
    return view('dashboard.artikel');
});

Route::get('/dashboard/artikel/tambah-artikel', function () {
    return view('dashboard.artikel.tambah-artikel');
});

Route::get('/dashboard/artikel/edit-artikel/{id}', function ($id) {
    return view('dashboard.artikel.edit-artikel', ['id' => $id]);
});

Route::get('/dashboard/satwa', function () {
    return view('dashboard.satwa');
});

Route::get('/dashboard/satwa/tambah-satwa', function () {
    return view('dashboard.satwa.tambah-satwa');
});

Route::get('/dashboard/satwa/edit-satwa/{id}', function ($id) {
    return view('dashboard.satwa.edit-satwa', ['id' => $id]);
});

Route::get('/dashboard/404', function () {
    return view('dashboard.404');
});

// CLIENT ROUTE

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/donasi', function () {
    return view('donasi');
});

Route::get('/satwa', function () {
    return view('satwa');
});

Route::get('/laporkan', function () {
    return view('laporkan');
}); 

