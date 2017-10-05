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
Route::POST('reserve_ticket','VanController@reserve_ticket');
Auth::routes();

Route::post('carride','CarrideController@carride');
Route::get('regis_carride','CarrideController@showcarrid');

Route::post('driver','DriverController@driver');
Route::get('regis_driver','DriverController@showdriver');

Route::post('van','VanController@van');
Route::get('regis_van','VanController@showvan');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/serach','VanController@serach');
Route::get('/reserve','VanController@reserve');

Route::get('/main','VanController@main');
Route::get('/main_1','VanController@main_1');
Route::get('/main_admin','VanController@main_admin');

Route::get('/update/{id}', 'CarrideController@update');
Route::post('/update', 'CarrideController@updateAction');
Route::get('/delete/{id}', 'CarrideController@delete');

Route::get('/updatevan/{id}', 'VanController@update');
Route::post('/updatevan', 'VanController@updateAction');
Route::get('/deletevan/{id}', 'VanController@delete');

Route::get('/updatedriver/{id}', 'DriverController@update');
Route::post('/updatedriver', 'DriverController@updateAction');
Route::get('/deletedriver/{id}', 'DriverController@delete');

Route::resource('reservations','ReservationsController');
