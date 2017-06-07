<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'admin'],
    function (){
        Route::resource('/panel/map', 'Panel\MapController');
        Route::resource('/panel/city', 'Panel\CityController');
        Route::resource('/panel/fuel', 'Panel\FuelController');
        Route::resource('/panel/action', 'Panel\ActionController');
        Route::resource('panel', 'Panel\PanelController');
    });









