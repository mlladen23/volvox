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
    return view('volvox');
})->name('form');

Route::get('/search/{name}', 'App\Http\Controllers\VolvoxController@search')->name('volvox-search');
Route::post('/store', 'App\Http\Controllers\VolvoxController@store')->name('volvox-store');

// Route::get('/search', [VolvoxController::class, 'search']);