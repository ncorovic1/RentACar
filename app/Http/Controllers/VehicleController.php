<?php

namespace App\Http\Controllers;

use View;
use App\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller {
    protected $redirectTo = '/operator';
    public function __construct() {}
    // display all vehicles as search results; no filters
    public function displayAll() {
        $vehicles = Vehicle::all();
        return View::make('pretraga')->with('vehicles', $vehicles);
    }
    // @register = @validator + @create
    public function register(\Illuminate\Http\Request $request) {
          $this->validator($request->all())->validate();
          $this->create($request->all());
          return redirect('/operator');
    }
    protected function validator(array $data) {
        return Validator::make($data, [
            'manufacturer' => 'required|max:25',
            'model' => 'required|max:30', 
            'production_year' => 'required|numeric|min:2000|max:'.date("Y"), 
            'color' => ' ', 
            'form_factor' => ' ', 
            'automatic' => ' ', 
            'air_conditioning' => ' ', 
            'passengers' => ' ', 
            'bags' => ' ', 
            'doors' => ' ',
            'available' => ' ',
            'current_parking_lot' => 'required|numeric|min:1|max:9999', 
            'image1' => 'required|url', 
            'image2' => 'required|url', 
            'image3' => 'required|url',
        ]);
    }
    protected function create(array $data) {
        return Vehicle::create([
            'manufacturer' => $data['manufacturer'],
            'model' => $data['model'], 
            'production_year' => $data['production_year'], 
            'color', 'form_factor' => $data['color'], 
            'automatic' => empty($data['automatic']) ? 0 : 1, 
            'air_conditioning' => empty($data['air_conditioning']) ? 0 : 1, 
            'passengers' => $data['passengers'], 
            'bags' => $data['bags'], 
            'doors' => $data['doors'], 
            'available' => 1, 
            'current_parking_lot' => $data['current_parking_lot'], 
            'image1' => $data['image1'], 
            'image2' => $data['image2'], 
            'image3' => $data['image3'],
        ]);
    }
}
