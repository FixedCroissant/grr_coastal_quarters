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
//By Default create a reservation -- main homepage will go through creating a new reservation.
Route::get('/', 'ReservationController@create');

Route::get('admin', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Protect routes
//Protect the main reservation index route.

Route::group(['middleware' => 'auth'], function () {
	//Create RESTful controller for reservations
	//NOT under auth middlware is
	//index,create,store
	//Route::resource('reservation','ReservationController');
	
	
	//Create RESTful controller for users
	Route::resource('users','UsersController');
});


//Allow for the update of Room Charges
//Get the view to display.
Route::get('reservation/{id}/charges',['as'=>'reservation.updateCharges','uses'=>'ReservationController@updateChargespre']);
//Update the room charges as needed.
Route::post('reservation/{id}/charges',['as'=>'reservation.updateChargesPOST','uses'=>'ReservationController@updateChargesPOST']);
//Update the status of the reservation as needed.
Route::post('reservation/{id}/status',['as'=>'reservation.updateStatusPOST','uses'=>'ReservationController@updateStatusPOST']);

Route::resource('reservation','ReservationController');





