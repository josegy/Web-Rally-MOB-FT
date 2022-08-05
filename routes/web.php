<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    // cuma untuk halaman awal
    Route::get('/home', 'HomeController@index')->name('home');

    // Route Penpos
    Route::group(
        ['prefix' => 'penpos', 'as' => 'penpos.'],
        function () {
            // Dashboard
            Route::get('/', 'Penpos\DashboardController@index')->middleware('can:isPenpos')->name('index');
            Route::post('/cekPosSingle', 'Penpos\DashboardController@cekPosSingle')->name('cekPosSingle');
            Route::post('/ubahStatusPosBattle', 'Penpos\DashboardController@ubahStatusPosBattle')->name('ubahStatusPosBattle');
            Route::post('/cekPemainBattle', 'Penpos\DashboardController@cekPemainBattle')->name('cekPemainBattle');
            Route::post('/resultGame', 'Penpos\DashboardController@resultGame')->name('resultGame');
            Route::post('/resetPlaying', 'Penpos\DashboardController@resetPlaying')->name('resetPlaying');

            // History Penpos
            Route::get('/history', 'Penpos\DashboardController@history')->middleware('can:isPenpos')->name('history');
        }
    );

    // Route Pemain
    Route::group(
        ['prefix' => 'pemain', 'as' => 'pemain.'],
        function () {
            // Start Buat Testing
            Route::get('/x', 'PemainController@dashboard1')->name('dashboard');
            // End Buat Testing

            Route::get('/', 'PemainController@dashboard')->middleware('can:isPemain')->name('dashboardPemain');
            Route::post('/kartu', 'PemainController@kartu')->name('kartu');
            Route::post('/changejenis', 'PemainController@changeJenis')->name('change');
            Route::post('/check/potongan', 'KartuController@checkPotongan')->name('check.potongan');
            Route::post('/tukar', 'KartuController@tukar')->name('tukar');
        }
    );

    // Route Dealer
    Route::group(
        ['prefix' => 'dealer', 'as' => 'dealer.'],
        function () {
            // Route::get('/', 'DealerController@dealer')->name('index');
            // Route::post('/change', 'DealerController@change')->name('change');
            // Route::post('/hapus', 'DealerController@hapus')->name('hapus');
        }
    );
});

Auth::routes();

// Dealer 
Route::get('/dealer', 'DealerController@dealer')->name('dealer');
Route::post('/dealer/change', 'DealerController@change')->name('dealer.change');
Route::post('/dealer/hapus', 'DealerController@hapus')->name('dealer.hapus');

//route ed
Route::get('/ed', 'EdController@index')->name('ed');
Route::post('/ed/edit', 'EdController@edit')->name('ed-edit');


Route::get('/history', function () {
    return view('penpos.history');
});

Route::get('/dealers', function () {
    return view('dealer.dealer');
});
