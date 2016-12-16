<?php

namespace App\Http\Controllers;

use View;
use Auth;
use App\Vehicle;
use App\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller {
    
    protected $redirectTo = '/operator';
    
    public function __construct() {}
    
    public function deleteVehicle($id) {
        Vehicle::destroy($id);
    }
    
    public function addReservation($u_id, $v_id, $r_date, $e_date) {
        $r_date = date("Y-m-d H:i:s", strtotime($r_date));
        $e_date = date("Y-m-d H:i:s", strtotime($e_date));
        if ( Auth::guest() )
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return \Redirect::route('operator');
        else {
            Reservation::create([
                'user_id'     => $u_id,
                'vehicle_id'  => $v_id, 
                'rent_date'   => $r_date, 
                'expire_date' => $e_date,
            ]);
            return redirect('/myrents');
        }
    }
    
    //Browse cars
    public function search() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return \Redirect::route('operator');
        else 
            return View::make('renting');
    }
    
    public function browse() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return View::make('browseVehicles');
        else 
            return \Redirect::route('korisnik');
    }
    
    public function myrents() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return \Redirect::route('operator');
        else {
            $reservations = Auth::user()->reservations->sortByDesc('created_at');
            $vehicles = array();
            foreach($reservations as $r) {
                $v = Vehicle::where('id', '=', $r->vehicle_id)->first();
                array_push($vehicles, $v);
            }
            $data = array(
                'reservations' => $reservations,
                'vehicles' => $vehicles
            );
            return View::make('pregled', $data);
        }
    }

    public function rents($id) {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator) {
            $reservations = Reservation::where('user_id', '=', $id)->get();
            $vehicles = array();
            foreach ($reservations as $reservation) {
                $vehicle = Vehicle::where('id', '=', $reservation->vehicle_id)->first();
                array_push($vehicles, $vehicle);
            }
            return View::make('loadUserVehicles')->with('vehicles', $vehicles);
        }
        else {
            return \Redirect::route('korisnik');
        }
    }
    
    public function purchaseVehicle() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            echo "purchaseVehicle.blade.php nije implementirano!";
        else
            return \Redirect::route('korisnik');
    }
    
    public function companyVehicles() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            echo "companyVehicles.blade.php nije implementirano!";
        else
            return \Redirect::route('korisnik');
    }
    //Filter cars
    public function displayCars($price, $form, $transmission, $fuel, $priorities) {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return \Redirect::route('operator');
        else {
            $vehicles = Vehicle::where('id', '>', '0');
            if ($price != 'Any')
                $vehicles = $vehicles->where('price_per_hour', '<', $price);
            if ($form != 'Any')
                $vehicles = $vehicles->where('form_factor', '=', $form);
            if ($transmission != 'Any')
                $vehicles = $vehicles->where('automatic', '=', $transmission == "Automatic" ? 1 : 0);
            if ($fuel != 'Any')
                $vehicles = $vehicles->where('fuel_consumption', '<', $fuel);
            $order = array("price_per_hour", "fuel_consumption");
            for ($i = 0; $i <= strlen($priorities) - 2; $i++)
                for ($j = $i + 1; $j <= strlen($priorities) - 1; $j++)
                    if ($priorities[$i] < $priorities[$j]) {
                        $temp = $order[$i];
                        $order[$j] = $order[$i];
                        $order[$i] = $temp;
                        $temp = $priorities[$i];
                        $priorities[$j] = $priorities[$i];
                        $priorities[$i] = $temp;
                    }
            $vehicles->orderBy($order[0], 'ASC', $order[1], 'ASC')->get();
            $vehicles = $vehicles->get();
            return View::make('filterCars')->with('vehicles', $vehicles);
        }
    }
    //Filter cars Operator
    public function displayCarsOperator($price, $form, $transmission, $fuel, $priorities) {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (!Auth::user()->operator)
            return \Redirect::route('korisnik');
        else {
            $vehicles = Vehicle::where('id', '>', '0');
            if ($price != 'Any')
                $vehicles = $vehicles->where('price_per_hour', '<', $price);
            if ($form != 'Any')
                $vehicles = $vehicles->where('form_factor', '=', $form);
            if ($transmission != 'Any')
                $vehicles = $vehicles->where('automatic', '=', $transmission == "Automatic" ? 1 : 0);
            if ($fuel != 'Any')
                $vehicles = $vehicles->where('fuel_consumption', '<', $fuel);
            $order = array("price_per_hour", "fuel_consumption");
            for ($i = 0; $i <= strlen($priorities) - 2; $i++)
                for ($j = $i + 1; $j <= strlen($priorities) - 1; $j++)
                    if ($priorities[$i] < $priorities[$j]) {
                        $temp = $order[$i];
                        $order[$j] = $order[$i];
                        $order[$i] = $temp;
                        $temp = $priorities[$i];
                        $priorities[$j] = $priorities[$i];
                        $priorities[$i] = $temp;
                    }
            $vehicles->orderBy($order[0], 'ASC', $order[1], 'ASC')->get();
            $vehicles = $vehicles->get();
            return View::make('filterCarsOperator')->with('vehicles', $vehicles);
        }
    }
    public function registerGet() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return View::make('registerVehicle');
        else
            return \Redirect::route('korisnik');
    }
    // @register = @validator + @create
    public function registerPost(\Illuminate\Http\Request $request) {
          $this->validator($request->all())->validate();
          $this->create($request->all());
          return redirect('/operator');
    } 
    
    protected function validator(array $data) {
        return Validator::make($data, [
            'manufacturer'        => 'required|max:25',
            'model'               => 'required|max:30', 
            'production_year'     => 'required|numeric|min:2000|max:'.date("Y"), 
            'color'               => ' ', 
            'form_factor'         => ' ', 
            'automatic'           => ' ', 
            'air_conditioning'    => ' ', 
            'passengers'          => ' ', 
            'bags'                => ' ', 
            'doors'               => ' ',
            'available'           => ' ',
            'current_parking_lot' => 'required|numeric|min:1|max:9999',
            'price_per_hour'      => 'required|numeric|min:0|max:500',
            'fuel_consumption'    => 'required|numeric|min:4|max:20',
            'image1'              => 'required|url', 
            'image2'              => 'required|url', 
            'image3'              => 'required|url',
        ]);
    }
    
    protected function create(array $data) {
        return Vehicle::create([
            'manufacturer'        => $data['manufacturer'],
            'model'               => $data['model'], 
            'production_year'     => $data['production_year'], 
            'color'               => $data['color'],
            'form_factor'         => $data['form_factor'], 
            'automatic'           => empty($data['automatic']) ? 0 : 1, 
            'air_conditioning'    => empty($data['air_conditioning']) ? 0 : 1, 
            'passengers'          => $data['passengers'], 
            'bags'                => $data['bags'], 
            'doors'               => $data['doors'], 
            'available'           => 1, 
            'current_parking_lot' => $data['current_parking_lot'],
            'price_per_hour'      => $data['price_per_hour'],
            'fuel_consumption'    => $data['fuel_consumption'],
            'image1'              => $data['image1'], 
            'image2'              => $data['image2'], 
            'image3'              => $data['image3'],
        ]);
    }
}
