<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    public function Bangle(){
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'bangle');
        return redirect()->back();
    }

    public function English(){
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }


}
