<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'       => 'required|max:255',
            'email'      => 'required|email|max:255|unique:users',
            'username'   => 'required|max:45|unique:users',
            'password'   => 'required|min:6|confirmed',
            'status'     => 'in:active,suspended,inactive',
            'reputation' => 'required|numeric|between:1,20',
            'operator'   => '',
        ]);
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'username'   => $data['username'],
            'password'   => bcrypt($data['password']),
            'status'     => $data['status'],
            'reputation' => (int)$data['reputation'],
            'operator'   => empty($data['operater']) ? 0 : 1,
        ]);
    }
    //Main register function
    public function register(\Illuminate\Http\Request $request)
    {
        // validate the form 

        $this->validator($request->all())->validate();

        // add the user
        $this->create($request->all());

        // redirect user
        return redirect($this->redirectPath());
    }
}
