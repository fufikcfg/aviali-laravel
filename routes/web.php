<?php

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

use App\Http\Controllers\Ads\AdsController;

Auth::routes();

Route::get('/', [AdsController::class, 'index']);

Route::get('ads/{category}', [AdsController::class, 'sortCategory']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('create', function () {
        return view('ads.create');
    })->name('create');

    Route::post('/ads/create/submit', [AdsController::class, 'store'])->name('create-ads-submit');

    Route::get('/ads/destroy/{id}', [AdsController::class, 'destroy'])->name('destroy-ads');

    Route::get('/ads/update/{id}', [AdsController::class, 'show'])->name('update');

    Route::post('/ads/updating/{id}', [AdsController::class, 'update'])->name('updating');

    Route::get('/ads/profile', function () {
        return view('profile');
    });
});








