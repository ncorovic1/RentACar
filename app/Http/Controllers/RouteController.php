<?php

namespace App\Http\Controllers;

use View;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
            $users = User::all();
            $data = array(
                'users' => $users
            );
            return View::make('nalozi', $data);
        }
        else
            return \Redirect::route('korisnik');
    }
}
   
    