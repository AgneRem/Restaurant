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
//
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//midleware rodo, kad tik prisijungusiems
Route::get('/cart/checkout', 'OrderController@checkOut')->name('checkOut')->middleware('auth');
Route::get('/cart/all', 'CartController@deleteCart')->name('cart.deleteCart');
Route::get('/reservation', 'ReservationController@create')->name('reservation')->middleware('auth');
Route::post('/reservation', 'ReservationController@store')->name('reservation.store')->middleware('auth');
Route::post('/cart/add', 'CartController@ajaxAdd')->name('cart.add');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/{id}', 'CartController@deleteByOne')->name('cart.deleteByOne');
Route::get('/cart/all/{id}', 'CartController@deleteAll')->name('cart.deleteAll');
Route::get('/user/profile', 'OrderController@userProfile')->name('userProfile');




//nurodom, kad sitie keliai bus tik prisijungusiems. prefix nurodo, kad pradzioje url visada bus admin ir kad nereiketu rasytu
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function() {
  Route::get('/', 'AdminController@index')->name('admin');
  Route::resource('/menu', 'MenuController');
  Route::resource('/dish', 'DishController');


});
