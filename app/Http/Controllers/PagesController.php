<?php

namespace App\Http\Controllers;

use Iluminate\Http\Request;
use DB;

class PagesController extends Controller {

    public function login(){
        return view("Pages.login");
    }

    public function viewServiceRequest(){
        $serviceReq = DB::table('consulta_servicio')->get();
        return view("Pages.viewServiceRequest")->with('requests',$serviceReq);
    }

    public function viewCustomer(){
        return view("Pages.viewCustomer");
    }

    public function viewService(){
        return view("Pages.viewService");
    }

    public function viewDepartment(){
        return view("Pages.viewDepartment");
    }
}