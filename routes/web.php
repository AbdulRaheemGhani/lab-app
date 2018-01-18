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

Route::get('/', 'SessionsController@create');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


Route::group(['middleware' => ['auth']], function(){
    Route::get('checkups', 'CheckupsController@index')->name('checkups.index');
    Route::get('checkups/create', 'CheckupsController@create')->name('checkups.create');
    Route::post('checkups', 'CheckupsController@store')->name('checkups.store');
});



Route::group(['middleware' => ['auth', 'admin']], function() {
    //Doctors
    Route::resource('doctors', 'DoctorsController');
    //Technitions
    Route::resource('technitions', 'TechnitionsController');
    //Test Categories
    Route::resource('cats', 'CatsController');
    //Tests
    Route::resource('testings', 'TestsController');
    //Checkups
   
    //User Types
    Route::resource('usertypes', 'UsertypesController');
    //Users
    Route::resource('users', 'UsersController');    

    Route::get('checkups/{checkup}', 'CheckupsController@show')->name('checkups.show');
    Route::get('checkups/{checkup}/edit', 'CheckupsController@edit')->name('checkups.edit');
    Route::put('checkups/{checkup}', 'CheckupsController@update')->name('checkups.update');
    Route::delete('checkups/{checkup}', 'CheckupsController@destroy')->name('checkups.destroy');

    Route::get('/doctors/{doctor}/search', 'DoctorsController@search');

});






Route::get('/users/{user}/changePassword', 'UsersController@changePassword')->name('users.changePassword');
Route::put('/users/{user}/changePassword', 'UsersController@passwordUpdate')->name('users.passwordUpdate');




