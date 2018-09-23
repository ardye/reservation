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

Route::group(['middleware' => ['web']], function() {
     Route::get('/', 'HomeController@index');
     Route::post('addReview', 'HomeController@addReview');
     Route::post('booking', 'HomeController@booking');
     Route::post('register', 'HomeController@register');
     Route::delete('/{home}', 'HomeController@destroy');

     $this->post('login', 'Auth\LoginController@login');
     $this->get('logout', 'Auth\LoginController@logout');

     Route::get('dashboard', 'DashboardController@index');

     Route::get('kategori', 'KategoriController@index');
     Route::post('kategori', 'KategoriController@store');
     Route::post('hapusKategori', 'KategoriController@destroy');
     Route::post('editKategori', 'KategoriController@update');
     Route::get('dataKategori', 'KategoriController@dataKategori');


    Route::get('event', 'EventController@index');
    Route::get('event/create','EventController@create');
    Route::post('event','EventController@store');
    Route::get('event/{event}', 'EventController@show');
    Route::get('event/{event}/edit', 'EventController@edit');
    Route::patch('event/{event}', 'EventController@update');
    Route::post('hapusEvent', 'EventController@destroy');
    Route::get('dataEvent', 'EventController@dataEvent');

    Route::get('fasilitas', 'FasilitasController@index');
    Route::get('fasilitas/create','FasilitasController@create');
    Route::post('fasilitas','FasilitasController@store');
    Route::get('fasilitas/{fasilitas}/edit', 'FasilitasController@edit');
    Route::patch('fasilitas/{fasilitas}', 'FasilitasController@update');
    Route::post('hapusFasilitas', 'FasilitasController@destroy');
    Route::get('dataFasilitas', 'FasilitasController@dataFasilitas');

    Route::get('menu', 'MenuController@index');
    Route::get('menu/create','MenuController@create');
    Route::post('menu','MenuController@store');
    Route::get('menu/{menu}/edit', 'MenuController@edit');
    Route::get('menu/{menu}', 'MenuController@show');
    Route::patch('menu/{menu}', 'MenuController@update');
    Route::post('hapusMenu', 'MenuController@destroy');
    Route::get('dataMenu', 'MenuController@dataMenu');
    Route::post('deleteReview', 'MenuController@deleteReview');

    Route::get('booked', 'BookedController@index');
    Route::get('booked/create','BookedController@create');
    Route::post('booked','BookedController@store');
    Route::get('booked/{booked}', 'BookedController@show');
    Route::patch('booked/{booked}', 'BookedController@update');
    Route::post('hapusBooked', 'BookedController@destroy');
    Route::get('dataBooked', 'BookedController@dataBooked');
    Route::get('status/{status}', 'BookedController@status');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
