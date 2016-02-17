<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controllers to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('master');
});*/

//Route::resource('users', 'UserController');

Route::get('/', function() {
    return view('lockers/index');
});

// API ROUTES ==================================
Route::group(array('prefix' => 'api'), function() {
    Route::resource('users', 'UserController');
    Route::get('leerlingen/indexcustom', 'LeerlingController@indexCustom');
    Route::resource('leerlingen', 'LeerlingController');
    Route::resource('klassen', 'KlasController');
    Route::get('lockersgewenst/indexcustom', 'LockerGewenstController@indexCustom');
    Route::resource('lockersgewenst', 'LockerGewenstController');
    Route::resource('lockertypes', 'LockerTypeController');

    Route::get('lockers/indexcustom', 'LockerController@indexCustom');
    Route::get('lockers/storebatch', 'LockerController@storeBatch');
    Route::resource('lockers', 'LockerController');
});

