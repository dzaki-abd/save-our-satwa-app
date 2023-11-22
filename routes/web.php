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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/donasi', function () {
    return view('dashboard.donasi');
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

Route::get('/dashboard/satwa/edit-satwa/{id}', function ($id) {
    return view('dashboard.satwa.edit-satwa', ['id' => $id]);
});

Route::get('/dashboard/404', function () {
    return view('dashboard.404');
});