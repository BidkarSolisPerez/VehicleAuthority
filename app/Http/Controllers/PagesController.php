<?php

namespace App\Http\Controllers;

use Iluminate\Http\Request;
use DB;

class PagesController extends Controller {

    public function login(){
        return view("Pages.login");
    }

    //Routing for department
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

    //Routing for customer
    public function viewCustomer(){
        $customers = DB::table('cliente')
            ->join('direccion_cliente','cliente.id_direccion', '=', 'direccion_cliente.id_direccion')
            ->select('cliente.id_cliente','cliente.telefono','cliente.correo_electronico','cliente.otro_detalle','direccion_cliente.provincia','direccion_cliente.canton','direccion_cliente.distrito','direccion_cliente.direccion_exacta')
            ->get();
        return view("Pages.viewCustomer")->with('customers',$customers);
        //echo $customers;
    }

    public function addNewCustomer(){
        return view("Pages.addNewCustomer");
    }

    public function editCustomer(){
        return view("Pages.editCustomer");
    }

    //Fabricante
    public function viewFabricante(){
        $fabricantes = DB::table('fabricante_vehiculo')->get();
        return view("Pages.viewFabricante")->with('fabricantes',$fabricantes);
    }

    public function addNewFabricante(){
        return view("Pages.addNewFabricante");
    }

    public function editFabricante(){
        return view("Pages.editFabricante");
    }

    //Categoria
    public function viewCategoria(){
        $categorias = DB::table('categoria_vehiculo')->get();
        return view("Pages.viewCategoria")->with('categorias',$categorias);
    }

    public function addNewCategoria(){
        return view("Pages.addNewCategoria");
    }

    public function editCategoria(){
        return view("Pages.editCategoria");
    }

    //Modelo
    public function viewModelo(){
        $modelos = DB::table('modelo_vehiculo')->get();
        return view("Pages.viewModelo")->with('modelos',$modelos);
    }

    public function addNewModelo(){
        return view("Pages.addNewModelo");
    }

    public function editModelo(){
        return view("Pages.editModelo");
    }

    //Service
    public function viewService(){
        $services = DB::table('servicio')->get();
        return view("Pages.viewService")->with('services',$services);        
    }

    public function addNewService(){
        return view("Pages.addNewService");
    }

    public function editService(){
        return view("Pages.editService");
    }

    //Service Request
    public function viewServiceRequest(){
        $serviceReq = DB::table('consulta_servicio')->get();
        return view("Pages.viewServiceRequest")->with('requests',$serviceReq);
    }

    public function addNewServiceRequest(){
        return view("Pages.addNewServiceRequest");
    }

    public function editServiceRequest(){
        return view("Pages.editServiceRequest");
    }
}