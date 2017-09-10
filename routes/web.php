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
Route::get('/main', function () {
    return view('main');
});
Route::get('/main_1', function () {
    return view('main_1');
});
Route::get('/main_admin', function () {
    return view('main_admin');
});

Route::get('/regis_van', function () {
    return view('regis_van');
});
Route::get('/regis_driver', function () {
    return view('regis_driver');
});
Auth::routes();

Route::post('carride','CarrideController@carride');
Route::get('regis_carride','CarrideController@showcarrid');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');