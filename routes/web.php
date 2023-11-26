<?php

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

Route::group(['middleware' => ['auth','web']], function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::name('artikel.')->prefix('artikel')->group(function () {
            Route::get('/get-data', [ArtikelController::class, 'getDataArtikel'])->name('get-data');
            Route::get('/add', [ArtikelController::class, 'addArtikelPage'])->name('add');
        });
        Route::resource('artikel', ArtikelController::class);

        Route::name('satwa.')->prefix('satwa')->group(function () {
            Route::get('/get-data', [SatwaController::class, 'getDataSatwa'])->name('get-data');
            Route::get('/get-data/{id}', [SatwaController::class, 'getDataSatwaById'])->name('get-data-by-id');
        });
        Route::resource('satwa', SatwaController::class);
    });
});

// DASHBOARD ROUTE
// Route::get('/dashboard/login', function () {
//     return view('dashboard.auth.login');
// });

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

// Route::get('/dashboard/donasi', function () {
//     return view('dashboard.donasi');
// });

// Route::get('/dashboard/laporan', function () {
//     return view('dashboard.laporan');
// });

// Route::get('/dashboard/laporan/detail-laporan/{id}', function ($id) {
//     return view('dashboard.laporan.detail-laporan', ['id' => $id]);
// });

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
});

// Route::get('/dashboard/satwa', function () {
//     return view('dashboard.satwa');
// });

// Route::get('/dashboard/satwa/tambah-satwa', function () {
//     return view('dashboard.satwa.tambah-satwa');
// });

// Route::get('/dashboard/satwa/edit-satwa/{id}', function ($id) {
//     return view('dashboard.satwa.edit-satwa', ['id' => $id]);
// });

// Route::get('/dashboard/404', function () {
//     return view('dashboard.auth.404');
// });

// CLIENT ROUTE

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/regristasi', function () {
//     return view('regristasi');
// });

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

Route::post('/laporkan/store', [App\Http\Controllers\HomeController::class, 'addLaporan'])->name('laporkan.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');