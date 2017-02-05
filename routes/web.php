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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index');

    Route::resource('hotel', 'HotelController');

    Route::resource('city', 'CityController');

    Route::resource('state', 'StateController');

    Route::resource('image', 'PhotoController');

    Route::get('image/create/{id}', ['uses' => 'PhotoController@create']);

    Route::get('hotel/images/{id}', ['uses' => 'HotelController@getImages']);

    Route::post('hotel/images/{id}', ['uses' => 'HotelController@postImages']);
});


Route::get('statesOfCity/{time}', ['as' => 'statesOfCity', 'uses' => 'StateController@getStates']);