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
use App\Models\Artikel;

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
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/get-chart-data-donasi', [DashboardController::class, 'getChartDataDonasi'])->name('get-chart-data-donasi');
        Route::get('/get-chart-data-laporan', [DashboardController::class, 'getChartDataLaporan'])->name('get-chart-data-laporan');

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
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/index', [HomeController::class, 'index'])->name('home');

    Route::get('/donasi', [DonasiController::class, 'getDataDonasiForUser']);
    Route::post('/donasi/store', [HomeController::class, 'addDonasi'])->name('donasi.store');

    Route::get('/satwa', [HomeController::class, 'getDataSatwaForUser']);

    Route::get('/detail-satwa/{id}', [HomeController::class, 'getDataSatwaForUserById']);
    Route::get('/get-riwayat-satwa/{id}', [HomeController::class, 'getDataPelaporanByIdSatwa'])->name('get-riwayat-satwa');

    Route::get('/artikel', [HomeController::class, 'getDataArtikelForUser']);

    Route::get('/detail-artikel/{id}', [HomeController::class, 'getDataArtikelForUserById'])->name('detail-artikel');

    Route::get('/favorit', function() { return view ('favorit'); });

    Route::group(['middleware' => ['auth']], function () {
        
        Route::get('/laporkan', [HomeController::class, 'indexLaporkan'])->name('laporkan');

        Route::post('/laporkan/store', [App\Http\Controllers\HomeController::class, 'addLaporan'])->name('laporkan.store');

        Route::get('/profil', [HomeController::class, 'profile'])->name('profile');
        Route::get('/get-riwayat/{filters}', [HomeController::class, 'getDataPelaporan'])->name('get-riwayat');
        Route::get('/add', [HomeController::class, 'addPelaporanPage'])->name('add');

        Route::get('/ubah-profil', [HomeController::class, 'ubahProfile'])->name('ubah-profile');
        Route::put('/update-profil/{id}', [HomeController::class, 'updateProfile'])->name('update-profile');
    });
});

Auth::routes();