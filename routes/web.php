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

// ROUTE PENPOS
Route::group(
    ['prefix' => 'penpos', 'as' => 'penpos.'],
    function () {
        // Dashboard
        Route::get('/', 'Penpos\DashboardController@index')->name('index');
    }
);

// ROUTE PEMAIN
Route::group(
    ['prefix' => 'pemain', 'as' => 'pemain.'],
    function () {
        // Dashboard
        Route::get('/', 'PemainController@dashboard')->name('dashboard');
        Route::post('/changejenis', 'PemainController@changeJenis')->name('change');
        Route::post('/check/potongan', 'KartuController@checkPotongan')->name('check.potongan');
        Route::post('/tukar', 'KartuController@tukar')->name('tukar');
    }
);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
