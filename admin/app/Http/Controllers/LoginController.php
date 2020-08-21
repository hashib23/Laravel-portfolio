<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;

class LoginController extends Controller
{
    function Login(){
        return view('login');
    }

    function onLogin(Request $request){

        $user=$request->input('user');
        $pass=$request->input('pass');

        $countValue=AdminModel::where('user_name','=',$user)->where('password','=',$pass)->count();
            If($countValue==1){
                $request->session()->put('user',$user); //here goes to middleware to set session data
                return 1;
            }else{
                return 0;
            }
    }

    function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/Login');
    }

}
