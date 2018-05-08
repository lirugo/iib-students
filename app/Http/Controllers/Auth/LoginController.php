<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Authy\Exceptions\SmsRequestFailedExceptions;
use App\User;
use Auth;
use Authy;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, User $user){
        //Check have two factor auth
        if($user->hasTwoFactorAuthenticationEnabled()){
            return $this->logoutAndRedirectToTokenEntry($request, $user);
        }

        return redirect()->intended($this->redirectPath());
    }

    protected function logoutAndRedirectToTokenEntry($request, $user){
        Auth::guard()->logout();

        $request->session()->put('authy',[
            'user_id' => $user->id,
            'authy_id' => $user->authy_id,
            'using_sms' => false,
            'remember' => $request->has('remember'),
        ]);

        //Check have sms auth enable
        if($user->hasSmsTwoFactorAuthenticationEnabled()){
            try{
                Authy::requestSms($user);
            }catch (SmsRequestFailedExceptions $e){
                return redirect()->back();
            }
            //Set have sms auth
            $request->session()->push('authy.using_sms', true);
        }

        //Redirect to token page
        return redirect($this->redirectToTokenPath());
    }

    protected function redirectToTokenPath(){
        return $this->redirectToToken;
    }
}
