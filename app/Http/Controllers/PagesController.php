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
}