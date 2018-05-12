<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function index(){
        if(!Session::has('locale')){
            Session::put('locale', Input::get('locale'));
        } else {
            Session::put('locale', Input::get('locale'));
        }
        return redirect()->back();
    }
}
