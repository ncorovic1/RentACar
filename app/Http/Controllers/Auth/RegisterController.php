<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;
    protected $redirectTo = '/register';

    public function __construct()
    {
        $this->middleware('auth');
    }

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
    
    protected function create(array $data)
    {
        return User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'username'   => $data['username'],
            'password'   => bcrypt($data['password']),
            'status'     => $data['status'],
            'reputation' => (int)$data['reputation'],
            'operator'   => empty($data['operator']) ? 0 : 1,
        ]);
    }
    
    public function register(\Illuminate\Http\Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());
        return redirect($this->redirectPath());
    }
}
