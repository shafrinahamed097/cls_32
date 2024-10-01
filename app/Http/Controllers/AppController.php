<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    function publicMessage(Request $request){
        return response("This is for everyone",200);
    }

    function secretMessage(Request $request){
       
        if(!Auth::check()){
            return response("This is for logged in users only",401);
        }
    }
}
