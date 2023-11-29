<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\SatwaController;


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

Route::group(['middleware' => ['auth', 'web', 'role:admin']], function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/',[DashboardController::class, 'index'])->name('index');

        Route::name('artikel.')->prefix('artikel')->group(function () {
            Route::get('/get-data', [ArtikelController::class, 'getDataArtikel'])->name('get-data');
            Route::get('/add', [ArtikelController::class, 'addArtikelPage'])->name('add');
        });
        Route::resource('artikel', ArtikelController::class);

        Route::name('satwa.')->prefix('satwa')->group(function () {
            Route::get('/get-data', [SatwaController::class, 'getDataSatwa'])->name('get-data');
            Route::get('/get-data-api', [SatwaController::class, 'getDataFromAPI'])->name('get-data-api');
        });
        Route::resource('satwa', SatwaController::class);

        Route::name('laporan.')->prefix('laporan')->group(function () {
            Route::get('/get-data/{filter}', [PelaporanController::class, 'getDataLaporan'])->name('get-data');
        });
        Route::resource('laporan', PelaporanController::class);

        Route::name('donasi.')->prefix('donasi')->group(function () {
            Route::get('/get-data', [DonasiController::class, 'getDataDonasi'])->name('get-data');
            Route::put('/verify/{id}', [DonasiController::class, 'verifyDonasi'])->name('verify');
        });
        Route::resource('donasi', DonasiController::class);

        Route::name('admin.')->prefix('admin')->group(function () {
            Route::get('/get-data', [AdminController::class, 'getDataAdmin'])->name('get-data');
        });
        Route::resource('admin', AdminController::class);
    });
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/index', function () {
        return view('index');
    });

    Route::get('/donasi', function () {
        return view('donasi');
    });

    Route::post('/donasi/store', [App\Http\Controllers\HomeController::class, 'addDonasi'])->name('donasi.store');

    Route::get('/satwa', [SatwaController::class, 'getDataSatwaForUser']);

    Route::get('/detail-satwa/{id}', [SatwaController::class, 'getDataSatwaForUserById']);

    Route::get('/artikel', function () {
        return view('artikel');
    });

    Route::get('/detail-artikel', function () {
        return view('detail-artikel');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/laporkan', function () {
            return view('laporkan');
        });
    
        Route::post('/laporkan/store', [App\Http\Controllers\HomeController::class, 'addLaporan'])->name('laporkan.store');
    }); 
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');