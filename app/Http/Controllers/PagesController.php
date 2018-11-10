<?php

namespace App\Http\Controllers;

use Iluminate\Http\Request;

class PagesController extends Controller {

    public function login(){
        return view("Pages.login");
    }

    public function viewServiceRequest(){
        return view("Pages.viewServiceRequest");
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