<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use DB;
use Session;

class UserController extends BaseController
{
    
    public function loginme(Request $req){

        $username = $req->input('username');
        $password = $req->input('password');

        //echo $username . "----" .$password;
    
        $checkLogin = DB::table('login')->where(['user_name'=>$username,'password'=>$password])->get();

        if(count($checkLogin) > 0){
            
            echo "User found";
            session(['currentUser'=>$username]);
            return redirect('ServiceRequest');
            echo "Nombre del usuario es " . Session::get('currentUser') . "</br>";
            session()->forget('currentUser');
            if(session()->has('currentUser')){
                echo "Nombre del usuario es " . Session::get('currentUser') . "</br>";
            }else{
                echo "User was removed from session</br>";
            }
            

            //In order to check if session has a value with key
            /*
                if(session()->has('currentUser')){

                }else{

                }
            */

        }else{
            echo "User did not found";
        }

    }
}