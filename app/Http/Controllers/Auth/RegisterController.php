<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Permissions\HasPermissionTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/pasien/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['status'] == 'santri'){
          return Validator::make($data, [
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'nis' => ['required', 'string', 'unique:users'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],
              'address' => ['required'],
              'phone' => ['required'],
          ]);
        }else{
          return Validator::make($data, [
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],
              'address' => ['required'],
              'phone' => ['required'],
          ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['status'] == 'santri'){
          $user = User::create([
            'name' => strtolower($data['name']),
            'nis' => $data['nis'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'status_pendaftaran' => $data['status'],
            'gender' => $data['gender'],
          ]);
        }else{
          $user = User::create([
            'name' => strtolower($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'status_pendaftaran' => $data['status'],
            'gender' => $data['gender'],
          ]);
        }

        $user->assignRole('pasien');

        return $user;
    }

}
