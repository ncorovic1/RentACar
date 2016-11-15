<?php

namespace App\Http\Controllers;

use App\ParkingLot;
use App\Http\Controllers\Controller;
use View;

class ParkingLotController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function loadParkingLots() {
        $lots = ParkingLot::All();
        return View::make('loadParkingLots')->with('lots', $lots);
    }
}