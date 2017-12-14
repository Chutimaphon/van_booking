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
Route::get('/phuket', function () {
    return view('phuket');
});
Route::get('/pangnga', function () {
    return view('pangnga');
});
Route::get('/krabi', function () {
    return view('krabi');
});
Route::get('/surad', function () {
    return view('surad');
});
Route::get('/nakhon', function () {
    return view('nakhon');
});
Route::get('/hatyai', function () {
    return view('hatyai');
});
Route::get('/kohlanta', function () {
    return view('kohlanta');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/checkstatus', function () {
    return view('checkstatus');
});

Route::get('/we', function () {
    return view('we');
});

Route::get('/hitkohlanta','ReservationsController@hitkohlanta');
Route::post('/hitkohlanta','ReservationsController@posthitkohlanta');

Route::get('/hitsurad','ReservationsController@hitsurad');
Route::post('/hitsurad','ReservationsController@posthitsurad');

Route::get('/hitnakhon','ReservationsController@hitnakhon');
Route::post('/hitnakhon','ReservationsController@posthitnakhon');

Route::get('/hithatyai','ReservationsController@hithatyai');
Route::post('/hithatyai','ReservationsController@posthithatyai');

Route::get('/reserve_2','ReservationsController@reserve_2');
Route::post('/reserve_2','ReservationsController@reserve_2');

Route::get('/vanroute', function () {
    return view('vanroute');
});

Route::POST('reserve_ticket','VanController@reserve_ticket');
Route::get('reserve_ticket','VanController@reserve_ticket');
Route::get('reserve_ticket','VanController@getreserve_ticket');
Route::get('/goback','VanController@goback');


Auth::routes();

Route::post('carride','CarrideController@carride');
Route::get('regis_carride','CarrideController@showcarrid');

Route::post('driver','DriverController@driver');
Route::get('regis_driver','DriverController@showdriver');

Route::post('van','VanController@van');
Route::get('regis_van','VanController@showvan');

Route::get('news','NewsController@newget');
Route::post('news','NewsController@news');
Route::get('regis_news','NewsController@shownews');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/serach','VanController@serach');
Route::get('/serach','VanController@serach');
Route::post('/reserve_2','VanController@serach1');
Route::get('/reserve_2','VanController@serach1');
Route::get('/reserve','VanController@reserve_2');
Route::get('/twoway','VanController@twoway');

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
Route::get('/deletenews/{id}', 'NewsController@delete');
Route::post('upload', 'NewsController@upload');
Route::get('upload', 'NewsController@upload');



Route::resource('reservations','ReservationsController');
Route::post('bookcar','VanController@bookcar');

Route::get('changepassword', 'Auth\UpdatePasswordController@index')->name('password.form');
Route::post('changepassword', 'Auth\UpdatePasswordController@update')->name('password.update');