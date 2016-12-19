<?php

namespace App\Http\Controllers;

use View;
use Auth;
use App\VehiclePurchase;
use App\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VehiclePurchaseController extends Controller {
    
    protected $redirectTo = '/operator';
    
    public function __construct() {}
    
    //Purchase vehicles
    public function purchaseVehicle() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator) {
            $vehicles = VehiclePurchase::all();
            return View::make('purchaseVehicle')->with('vehicles', $vehicles);
        }
        else
            return \Redirect::route('korisnik');
    }
}
