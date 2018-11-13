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
        $customers = DB::table('cliente')
            ->join('direccion_cliente','cliente.id_direccion', '=', 'direccion_cliente.id_direccion')
            ->select('cliente.id_cliente','cliente.telefono','cliente.correo_electronico','direccion_cliente.provincia','direccion_cliente.canton','direccion_cliente.distrito','direccion_cliente.direccion_exacta')
            ->get();
        return view("Pages.viewCustomer")->with('customers',$customers);
        //echo $customers;
    }

    public function viewService(){
        $services = DB::table('servicio')->get();
        return view("Pages.viewService")->with('services',$services);
        //echo $services;
    }

    public function viewDepartment(){
        $departamentos = DB::table('departamento')->get();
        return view("Pages.viewDepartment")->with('departamentos',$departamentos);
    }

    public function addNewDepartment(){
        return view("Pages.addNewDepartment");
    }

    public function editDepartment(){
        return view("Pages.editDepartment");
    }
}