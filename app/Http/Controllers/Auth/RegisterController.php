<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'student/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerView()
    {
        return view('students.auth.register');
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
            'sir_name' => ['required', 'string', 'max:255'],
            'other_names' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric'],
            'admission_number' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'before:2005-01-01'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'sir_name' => $data['sir_name'],
            'other_names' => $data['other_names'],
            'phone_number' => $data['phone_number'],
            'admission_number' => $data['admission_number'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
