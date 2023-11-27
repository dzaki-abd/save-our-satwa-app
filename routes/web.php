<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\SatwaController;
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

Route::group(['middleware' => ['auth','web','role:admin']], function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::name('artikel.')->prefix('artikel')->group(function () {
            Route::get('/get-data', [ArtikelController::class, 'getDataArtikel'])->name('get-data');
            Route::get('/add', [ArtikelController::class, 'addArtikelPage'])->name('add');
        });
        Route::resource('artikel', ArtikelController::class);

 
        Route::name('satwa.')->prefix('satwa')->group(function () {
            Route::get('/get-data', [SatwaController::class, 'getDataSatwa'])->name('get-data');
            Route::get('/get-data/{id}', [SatwaController::class, 'getDataSatwaById'])->name('get-data-by-id');
            Route::get('/get-data-api', [SatwaController::class, 'getDataFromAPI'])->name('get-data-api');

        });
        Route::resource('satwa', SatwaController::class);
       Route::name('laporan.')->prefix('laporan')->group(function () {
            
        });
        Route::resource('laporan', PelaporanController::class);
    });

    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });
    
    Route::get('/dashboard/donasi', function () {
        return view('dashboard.donasi');
    });
    
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
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
});

Route::group(['middleware' => ['auth','web']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
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
    
    Route::post('/laporkan/store', [App\Http\Controllers\HomeController::class, 'addLaporan'])->name('laporkan.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');