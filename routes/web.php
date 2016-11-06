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

Route::get('/', function () {
    if( Auth::guest() )
        return view('welcome');
    else if( Auth::user()->operator )
        return view('operator');
    else
        return view('korisnik');
})->name('welcome');

Auth::routes();

Route::get('/user', function() {
    if( Auth::guest() )
        return \Redirect::route('login');
    else if( Auth::user()->operator )
        return \Redirect::route('operator');
    else return view('korisnik');
})->name('korisnik');

Route::get('/register', function() {
    if( Auth::guest() )
        return \Redirect::route('login');
    else if( Auth::user()->operator )
        return view('auth/register');
    else return \Redirect::route('korisnik');
})->name('register');

Route::get('/registerVehicle', function() {
    return view('registerVehicle');
});

Route::post('/registerVehicle', ['as' => 'registerVehicle', 'uses' => 'VehicleController@register']);
            
//            function() {
//    if( Auth::guest() )
//        return \Redirect::route('login');
//    else if( Auth::user()->operator )
//        return view('registerVehicle');
//    else return \Redirect::route('korisnik');
//})->name('dodajAuto');

Route::get('/operator', function() {    
    if( Auth::guest() )
        return \Redirect::route('login');
    else if( Auth::user()->operator )
        return view('operator');
    else return \Redirect::route('korisnik');
})->name('operator');

Route::get('/renting', function () {
    if( Auth::guest() )
        return \Redirect::route('login');
    else if( Auth::user()->operator )
        return \Redirect::route('operator');
    else return view('iznajmljivanje');
})->name('iznajmljivanje');

Route::get('/myrents', function () {
    if( Auth::guest() )
        return \Redirect::route('login');
    else if( Auth::user()->operator )
        return \Redirect::route('operator');
    else return view('pregled');
})->name('pregled');

Route::get('/accounts', function () {
    if( Auth::guest() )
        return \Redirect::route('login');
    else if( Auth::user()->operator ) {
        $users = App\User::all();
        $data = array(
            'users' => $users
        );
        return view('nalozi', $data);
    }
    else return \Redirect::route('korisnik');
})->name('nalozi');






Route::get('/user2/{id}', function ($id) {
    $user2 = App\User2::find($id);
    echo 'Hello my name is ' . $user2->name . ' ' . $user2->surname;
    print_r($user2);
});

Route::get('name/{name}', function($name) {
    $user2 = App\User2::where('name', '=', $name)->first();
    if($user2 == null)
        echo "Korisnik sa trazenim imenom ne postoji!";
    else
        echo $user2->surname;
});

Route::get('auta/{name}', function($name) {
    $user2 = App\User2::where('name', '=', $name)->first();
    if($user2 == null) 
        echo "Korisnik sa trazenim imenom ne postoji!";
    else {    
        $cars = App\Car::all();
        foreach($cars as $car)
            if( $car->user2->name == $user2->name)
                echo $car->name . " is owned by " . $car->user2->name . "<br>";
    }
});

Route::get('proba', function() {
    $user2 = App\User2::all();
    $data = array(
        'user2' => $user2
        );
    return view('proba', $data);
});
