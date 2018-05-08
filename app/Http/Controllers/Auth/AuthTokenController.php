<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Authy;
use App\Services\Authy\Exceptions\InvalidTokenException;
use App\Services\Authy\Exceptions\SmsRequestFailedExceptions;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthTokenController extends Controller
{
    public function getToken(Request $request){
        //Check if user have user id in session
        if(!$request->session()->has('authy')){
            //Redirect to home page
            return redirect()->to('/');
        }
        //Show token page
        return view('auth.token');
    }

    public function postToken(Request $request){
        //Validate
        $this->validate($request, [
            'token' => 'required'
        ]);
        //Verify token
        try{
            $verification = Authy::verifyToken($request->token);
        }catch (InvalidTokenException $e){
            return redirect()->back()->withErrors([
                'token' => 'Invalid token',
            ]);
        }

        if(Auth::loginUsingId(
            $request->session()->get('authy.user_id'),
            $request->session()->get('authy.remember')
        )){
            $request->session()->forget('authy');
            return redirect()->intended();
        }

        return redirect()->url('/');
    }

    public function getResend(Request $request){
        //Get user id in session
        $user = User::findOrFail($request->session()->get('authy.user_id'));
        //Check have user sms two factor auth if not redirect back
        if(!$user->hasSmsTwoFactorAuthenticationEnabled()){
            return redirect()->back();
        }

        try{
            Authy::requestSms($user);
        }catch(SmsRequestFailedExceptions $e){
            return redirect()->back();
        }

        return redirect()->back();

    }
}
