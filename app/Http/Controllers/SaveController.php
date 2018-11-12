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

class SaveController extends BaseController
{

    public function addDepartment(Request $req){
        $id_department = $req->input('id_department');
        $department_name = $req->input('nombre_departamento');
        $department_descrip = $req->input('descripcion_departamento');
        $other_details = $req->input('detalles_departamento');

        $values = array(
            'id_departamento'     =>   $id_department, 
            'nombre_departamento'   =>   $department_name,
            'descripcion_departamento' => $department_descrip,
            'otros_detalles' => $other_details
        );

        DB::table('departamento')->insert($values);
        
        return redirect('Department');
       /*
        echo "Detalles del departamento" . $id_department;
        echo "Detalles del departamento" . $department_name;
        echo "Detalles del departamento" . $department_descrip;
        echo "Detalles del departamento" . $other_details;*/

    }

    public function deleteDepartment($id){

        //echo $id;

        DB::table('departamento')->where('id_departamento', $id)->delete();

        return redirect('Department');  
    }
}