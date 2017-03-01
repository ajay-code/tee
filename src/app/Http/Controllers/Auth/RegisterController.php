<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Mail\UserConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'firstname' => 'required',
            'lastname' => 'required',
            'sex' => 'required',
            'phone_number' => 'required',
            'dob' => 'required|date',
            'handicap' => 'digits_between:0,52'

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
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'sex' => $data['sex'],
            'phone_number' => $data['phone_number'],
            'dob' => $data['dob'],
            'handicap' => $data['handicap']
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        Auth::logout();

        $token = $user->activationToken()->create([
            'token' => str_random(128)
        ]);

        $email = new UserConfirmationEmail($user, $token);
        Mail::to($request->input('email'))->send($email);

        alert()->success('Confirmation Email has been sent to you');

        return redirect('/login');

    }
}
