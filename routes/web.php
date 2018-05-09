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

Route::get('/stepreserve', function () {
    return view('stepreserve');
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

Route::get('/cart','ReservationsController@cart');
Route::get('/ticket','ReservationsController@ticket');
Route::post('/ticket','ReservationsController@ticket');

Route::get('/hitkohlanta','ReservationsController@hitkohlanta');
Route::post('/hitkohlanta','ReservationsController@posthitkohlanta');

Route::get('/hitsurad','ReservationsController@hitsurad');
Route::post('/hitsurad','ReservationsController@posthitsurad');

Route::get('/hitnakhon','ReservationsController@hitnakhon');
Route::post('/hitnakhon','ReservationsController@posthitnakhon');

Route::get('/hithatyai','ReservationsController@hithatyai');
Route::post('/hithatyai','ReservationsController@posthithatyai');


Route::get('/vanroute', function () {
    return view('vanroute');
});

Route::get('/receipts', function () {
    return view('receipts');
});

Route::get('/success', 'ReservationsController@success');
Route::get('/mailsuccess','ReservationsController@mailsuccess');
Route::get('/deposit', 'ReservationsController@deposit');
Route::post('/depose', 'ReservationsController@depose');
Route::post('/reserve_deposit', 'ReservationsController@reserve_deposit');
Route::get('/reservations_deposit', 'ReservationsController@reservations_deposit');

Route::post('reserve_ticket','VanController@reserve_ticket');
Route::get('reserve_ticket','VanController@reserve_ticket');
Route::get('reserve_ticket','VanController@getreserve_ticket');
Route::get('/goback','VanController@goback');


Auth::routes();

Route::post('carride','CarrideController@carride');
Route::get('regis_carride','CarrideController@showcarrid');

Route::post('point','CarrideController@point');
Route::get('regis_point','CarrideController@showpoint');

Route::post('pointticket','CarrideController@pointticket');
Route::get('regis_pointticket','CarrideController@showpointticket');

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
Route::post('/reserve_3','VanController@reserve_3');
Route::get('/reserve_3','VanController@reserve_3');
Route::get('/reserve_2','VanController@serach1');
Route::get('/reserve','VanController@reserve_2');
Route::get('/receipts','ReservationsController@receipts');
Route::post('/show_income_each','ReservationsController@show_income_each');
Route::post('/show_income_month','ReservationsController@show_income_month');
Route::get('/anony_reserve','ReservationsController@anony_reserve');
Route::get('/twoway','VanController@twoway');

Route::get('/main','VanController@main');
Route::get('/main_1','VanController@main_1');
Route::get('/main_admin','VanController@main_admin');

Route::get('/update/{id}', 'CarrideController@update');
Route::post('/update', 'CarrideController@updateAction');
Route::get('/delete/{id}', 'CarrideController@delete');

Route::get('/updatepoint/{id}', 'CarrideController@updatepoint');
Route::post('/updatepoint', 'CarrideController@updateActiona');
Route::get('/deletepoint/{id}', 'CarrideController@deletepoint');

Route::get('/updatepointticket/{id}', 'CarrideController@updatepointticket');
Route::post('/updatepointticket', 'CarrideController@updateActionpointticket');
Route::get('/deletepointticket/{id}', 'CarrideController@deletepointticket');

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

Route::post('update_status','ReservationsController@update_status');
Route::post('deletedeposit','ReservationsController@delete');

Route::get('/send', 'NewsController@send');

Route::get('pointticket/{id}', 'CarrideController@show');

Route::get('/message','ReservationsController@message');

    