<?php

namespace App\Http\Controllers\Auth;

use App\Services\Authy\Exceptions\InvalidTokenException;
use Auth;
use Authy;
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
}
