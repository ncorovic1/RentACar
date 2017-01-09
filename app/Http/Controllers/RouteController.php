<?php

namespace App\Http\Controllers;

use View;
use Auth;
use App\User;
use App\Reservation;
use App\Vehicle;
use App\Incident;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RouteController extends Controller {
    
    protected $redirectTo = '/welcome';
    
    public function __construct() {}
    
    public function index() {
        if (Auth::guest())
            return View::make('welcome');
        else if (Auth::user()->operator)
            return View::make('operator');
        else
            return View::make('korisnik');
    }
    
    public function user() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return \Redirect::route('operator');
        else
            return View::make('korisnik');
    }
    
    public function operator() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return View::make('operator');
        else
            return \Redirect::route('korisnik');
    }
    
    public function registerGet() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator)
            return View::make('auth/register');
        else
            return \Redirect::route('korisnik');
    }
    
    public function accounts() {
        if (Auth::guest())
            return \Redirect::route('login');
        else if (Auth::user()->operator) {
            $users = User::paginate(10);
            $reservations = Reservation::all();
            $vehicles = Vehicle::all();
            $data = array(
                'users' => $users,
                'reservations' => $reservations,
                'vehicles' => $vehicles
            );
            return View::make('nalozi', $data);
        }
        else
            return \Redirect::route('korisnik');
    }

    public function loginAndroidGet($email, $pw) {
        $user = User::where('email', '=', $email)->first();
        
        $result = false;
        if ($user != null && Hash::check($pw, $user['password'])) {
            $reservations = $user->reservations->sortByDesc('created_at');
            $vehicles = array();
            foreach ($reservations as $r) {
                $v = Vehicle::where('id', '=', $r->vehicle_id)->first();
                array_push($vehicles, $v);
            }
            $result = true;
            return Response::json([
                'result' => $result,
                'user' => $user,
                'reservations' => $reservations,
                'vehicles' => $vehicles
            ]);
        }
        else {
            return Response::json([
                'result' => $result
            ]);
        }
    }

    public function loginAndroidPost(Illuminate\Http\Request $request) {
        $email = $request["email"];
        $pw = $request["password"];
        $user = User::where('email', '=', $email)->first();
        $result = false;
        if ($user != null && Hash::check($pw, $user['password']))
            $result = true;
        return Response::json([
            'result' => $result,
        ]);
    }
}
   
    