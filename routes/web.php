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

Route::get('/user',     'RouteController@user')->name('korisnik');
Route::get('/operator', 'RouteController@operator')->name('operator');
Route::get('/accounts', 'RouteController@accounts')->name('nalozi');
Route::get('/register', 'RouteController@registerGet')->name('register');

Route::get('/purchaseVehicle',  'VehicleController@purchaseVehicle')->name('purchaseVehicle');
Route::get('/companyVehicles',  'VehicleController@companyVehicles')->name('companyVehicles');
Route::get('/renting',          'VehicleController@search')->name('renting');
Route::get('/myrents',          'VehicleController@myrents')->name('pregled');   
Route::get('/registerVehicle',  'VehicleController@registerGet')->name('dodajAuto');
Route::post('/registerVehicle', 'VehicleController@registerPost')->name('registerVehicle');
Route::get('filterCars/{price}/{form}/{transmission}/{fuel}/{priorities}', 'VehicleController@displayCars')->name('filterCars');


