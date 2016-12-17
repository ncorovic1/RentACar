<?php

namespace App\Http\Controllers;

use App\ParkingLot;
use App\Http\Controllers\Controller;
use View;

class ParkingLotController extends Controller {

    public function loadParkingLots() {
        $lots = ParkingLot::all();
        return View::make('loadParkingLots')->with('lots', $lots);
    }
    
}