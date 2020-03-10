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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('sounds', 'SoundController')->except('show');
    Route::get('profile/{user}', 'ProfileController@show')->name('profile.show');
    Route::post('sounds/{sound}/likes', 'LikeController@store');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
