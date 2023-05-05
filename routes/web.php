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

Auth::routes();


//объявления
Route::get('/', 'Ads\AdsController@index');
Route::get('ads/{category}', 'Ads\AdsController@sortCategory');


//объявления

// create form
Route::get('create', function () {
    return view('ads.create');
})->name('create');
// post form
Route::post('/create/submit', 'Ads\AdsController@store')->name('create-ads-submit');


//user
Route::get('/profile', function () {
    return view('profile');
});







