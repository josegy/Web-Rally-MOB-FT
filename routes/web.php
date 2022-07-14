<?php

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

Route::get('/', function () {
    return view('welcome');
});

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
        Route::get('/', 'Pemain\DashboardController@index')->name('index');
    }
);