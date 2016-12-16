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

Route::get('/', 'RouteController@index')->name('welcome');

Auth::routes();

Route::get('/user',     'RouteController@user')->name('korisnik'); // user; korisnik
Route::get('/operator', 'RouteController@operator')->name('operator'); // operator; operator
Route::get('/accounts', 'RouteController@accounts')->name('nalozi'); // accounts; nalozi
Route::get('/register', 'RouteController@registerGet')->name('register'); // register; register

Route::get('/purchaseVehicle',  'VehicleController@purchaseVehicle')->name('purchaseVehicle'); // purchaseVehicle; purchaseVehicle
Route::get('/companyVehicles',  'VehicleController@companyVehicles')->name('companyVehicles'); // companyVehicles; companyVehicles
Route::get('/renting',          'VehicleController@search')->name('renting'); // renting; renting
Route::get('/browseVehicles',   'VehicleController@browse')->name('browseVehicles'); // browseVehicles; browseVehicles
Route::get('/myrents',          'VehicleController@myrents')->name('pregled'); // myrents; pregled
Route::get('/registerVehicle',  'VehicleController@registerGet')->name('dodajAuto'); //registerVehicle; dodajAuto
Route::post('/registerVehicle', 'VehicleController@registerPost')->name('registerVehicle'); // registerVehicle; registerVehicle
Route::get('/deleteVehicle/{id}', 'VehicleController@deleteVehicle')->name('deleteVehicle'); // deleteVehicle; deleteVehicle
Route::get('filterCars/{price}/{form}/{transmission}/{fuel}/{priorities}', 'VehicleController@displayCars')->name('filterCars'); // filterCars; filterCars
Route::get('filterCarsOperator/{price}/{form}/{transmission}/{fuel}/{priorities}', 'VehicleController@displayCarsOperator')->name('filterCarsOperator'); // filterCarsOperator; filterCarsOperator
Route::get('addReservation/{u_id}/{v_id}/{r_date}/{e_date}', 'VehicleController@addReservation')->name('addReservation'); // addReservation; addReservation
Route::get('loadParkingLots',   'ParkingLotController@loadParkingLots')->name('loadParkingLots'); // loadParkingLots; loadParkingLots
Route::get('loadUserVehicles/{id}',   'VehicleController@rents')->name('loadUserVehicles'); // loadUserVehicles; loadUserVehicles
Route::post('/reportIncident', 'IncidentController@reportIncident')->name('reportIncident'); // reportIncident; reportIncident

