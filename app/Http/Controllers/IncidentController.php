<?php

namespace App\Http\Controllers;

use View;
use Auth;
use App\User;
use App\Incident;
use App\Vehicle;
use App\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IncidentController extends Controller {

    public function reportIncident(\Illuminate\Http\Request $request) {
        $this->validator($request->all())->validate();
        $this->create($request->all());
        if ($request['typeOfIncident'] != 'Crash - Not Guilty' && $request['typeOfIncident'] != 'Car Failure') {
            $update = 0.0;
            if ($request['typeOfIncident'] == 'Crash - Guilty') {
                $update = 5.0;
            }
            else if ($request['typeOfIncident'] == 'Car Damage') {
                $update = 3.0;
            }
            else if ($request['typeOfIncident'] == 'Low Fuel') {
                $update = 0.5;
            }
            else if ($request['typeOfIncident'] == 'Return Overdue') {
                $update = 1.0;
            }
            $current = User::where('id', '=', $request['userID'])->pluck('reputation')->first();
            $value = $current;
            if ($value > $update) {
                $value = $value - $update;
                User::where('id', '=', $request['userID'])->update(array('reputation' => $value));
            }
            else {
                User::where('id', '=', $request['userID'])->update(array('status' => 'inactive', 'reputation' => 0.0));
            }
        }
        return redirect('/accounts');
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'user_id'        => ' ',
            'vehicle_id'     => ' ', 
            'type'           => ' ', 
            'date'           => ' ',
            'description'    => ' ', 
            'damage'         => ' ',
        ]);
    }

    protected function create(array $data) {
        return Incident::create([
            'user_id'        => $data['userID'],
            'vehicle_id'     => $data['vehiclesRented'], 
            'type'           => $data['typeOfIncident'], 
            'date'           => $data['dateOfIncident'],
            'description'    => $data['description'], 
            'damage'         => $data['damage'],
        ]);
    }

}