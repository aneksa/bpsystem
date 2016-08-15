<?php

namespace App\Http\Controllers;

use Request;
use DB;
use DateTime;
use Session;
use Auth;

use App\Http\Requests;

class LoginController extends Controller
{
    //INDEX
    public function index(){
        if(session::has('username')){
            $cekuser=DB::table('users')
                ->where('email', session::get('email'))
                ->first();
            return redirect('home');
            
        } else {
            return redirect('login');
        }
    }

    //FORM LOGIN
    public function formLogin(){
    	return view('auth.login');
    }

    //LOGIN
    public function login(){
    	$cek=DB::table('users')->where('email', Request::get('email'))->where('password', Request::get('password'))->first();
        if ($cek)
        {
            session::put('email', $cek->email);
            return redirect('home');
        }
        else {
            return redirect('login');
        }
    }

    //LOGOUT
    public function logout(){
        session::forget('email');
        return redirect('/');
    }
}
