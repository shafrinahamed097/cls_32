<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    function publicMessage(Request $request){
        return response("This is for everyone",200);
    }

    function secretMessage(Request $request){
       
        // if(!Auth::check()){
        //     // return response("You aren't logged in",401);
        //     abort(403,"Please Login");
        // }
        return response("This is for logged in users",200);
    }

    function login(Request $request){
        $credentials = [
            'email'=> 'me@me.com',
            'password'=>'123456789'
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }else{
            return response("Invalid credentials", 401);
        }
    }

    function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
