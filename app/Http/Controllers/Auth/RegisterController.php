<?php

namespace App\Http\Controllers\Auth;

use App\DiallingCode;
use App\Services\Authy\Exceptions\RegistrationFailedException;
use App\Services\Authy\Exceptions\SmsRequestFailedExceptions;
use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Authy;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';
    protected $redirectToToken = '/auth/token';
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        //Create user
        $user =  User::create([
            'surname' => $data['surname'],
            'name' => $data['name'],
            'middle_name' => $data['middle_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        //Add phone to user
        $user->addPhoneNumber($data['phone'], $data['dialling_code']);
        //Add authy id
        try {
            $authyId = Authy::registerUser($user);
            $user->authy_id = $authyId;
            $user->save();
        }catch(RegistrationFailedException $e){
            return redirect()->back();
        }

        //Redirect to token
        return $user;
    }

    /**
     * Method overriding
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function showRegistrationForm(){
        return view('auth.register')->with([
            'diallingCodes' => DiallingCode::all(),
        ]);
    }

    /**
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function registered(Request $request, $user)
    {
        //Logout
        Auth::guard()->logout();
        //Add data in session
        $request->session()->put('authy',[
            'user_id' => $user->id,
            'authy_id' => $user->authy_id,
            'using_sms' => false,
            'remember' => $request->has('remember'),
        ]);
        //Send sms
        try{
            Authy::requestSms($user);
        }catch (SmsRequestFailedExceptions $e){
            return redirect()->back();
        }
        //Set have sms auth
        $request->session()->push('authy.using_sms', true);
        //Redirect to token page
        return redirect($this->redirectToTokenPath());
    }

    //Redirect to token path

    /**
     * @return string
     */
    protected function redirectToTokenPath(){
        return $this->redirectToToken;
    }
}
