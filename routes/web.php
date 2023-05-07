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



Route::get('/', 'Ads\AdsController@index');

Route::get('ads/{category}', 'Ads\AdsController@sortCategory');


Route::get('create', function () {
    return view('ads.create');
})->name('create');

Route::post('/create/submit', 'Ads\AdsController@store')->name('create-ads-submit');

Route::get('update/{id}', 'Ads\AdsController@show')->name('update');

Route::post('/update/{id}', 'Ads\AdsController@update')->name('update-ads-submit');

Route::get('/destroy/{id}', 'Ads\AdsController@destroy')->name('destroy-ads');


Route::get('/profile', function () {
    return view('profile');
});







