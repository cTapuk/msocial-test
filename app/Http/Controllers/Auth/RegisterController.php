<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    private $avatarPath = "";
    private $request;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'sname' => ['required', 'string', 'max:255'],            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'aboutyou' => ['string', 'nullable', 'max:255'],
            'avatar' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:1536'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($this->request->hasfile('avatar')) {
            $this->avatarPath = $this->request->file('avatar')->store('avatars', 'public');
        }

        return User::create([
            'name' => $data['name'],
            'sname' => $data['sname'],
            'email' => $data['email'],
            'aboutyou' => $data['aboutyou'],
            'avatar' => $this->avatarPath,
            'password' => Hash::make($data['password']),
        ]);
    }
}
