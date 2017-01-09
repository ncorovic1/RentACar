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

Auth::routes();

// RouteController
Route::get('/', 'RouteController@index')->name('welcome');
Route::get('/user', 'RouteController@user')->name('korisnik');
Route::get('/operator', 'RouteController@operator')->name('operator');
Route::get('/accounts', 'RouteController@accounts')->name('nalozi');
Route::get('/register', 'RouteController@registerGet')->name('register');
Route::post('/loginAndroidPost', 'RouteController@loginAndroidPost')->name('loginAndroidPost');
Route::get('/loginAndroidGet/{email}/{pw}', 'RouteController@loginAndroidGet')->name('loginAndroidGet');
// VehicleController
Route::get('/companyVehicles', 'VehicleController@companyVehicles')->name('companyVehicles');
Route::get('/renting', 'VehicleController@search')->name('renting');
Route::get('/browseVehicles', 'VehicleController@browse')->name('browseVehicles');
Route::get('/myrents', 'VehicleController@myrents')->name('pregled');
Route::get('/registerVehicle', 'VehicleController@registerGet')->name('dodajAuto');
Route::post('/registerVehicle', 'VehicleController@registerPost')->name('registerVehicle');
Route::get('/deleteVehicle/{id}', 'VehicleController@deleteVehicle')->name('deleteVehicle');
Route::get('filterCars/{price}/{form}/{transmission}/{fuel}/{priorities}', 'VehicleController@displayCars')->name('filterCars');
Route::get('filterCarsOperator/{price}/{form}/{transmission}/{fuel}/{priorities}', 'VehicleController@displayCarsOperator')->name('filterCarsOperator');
Route::get('addReservation/{u_id}/{v_id}/{r_date}/{e_date}', 'VehicleController@addReservation')->name('addReservation');
Route::get('checkAvailability/{vehicle_id}/{d1}/{d2}', 'VehicleController@checkAvailability')->name('checkAvailability');
Route::get('loadUserVehicles/{id}', 'VehicleController@rents')->name('loadUserVehicles');

// ParkingLotController
Route::get('loadParkingLots', 'ParkingLotController@loadParkingLots')->name('loadParkingLots');

// IncidentController
Route::post('/reportIncident', 'IncidentController@reportIncident')->name('reportIncident');

// VehiclePurchaseController
Route::get('/purchaseVehicle', 'VehiclePurchaseController@purchaseVehicle')->name('purchaseVehicle');

