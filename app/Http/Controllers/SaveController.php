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
    }

    public function deleteDepartment($id){
        DB::table('departamento')->where('id_departamento', $id)->delete();
        return redirect('Department');  
    }

    public function editDepartment(Request $request,$id) {

        $department_name = $request->input('nombre_departamento');
        $department_descipcion = $request->input('descripcion_departamento');
        $department_otros_detalles = $request->input('detalles_departamento');
        DB::update('update departamento set nombre_departamento = ? where id_departamento = ?',[$department_name,$id]);
        DB::update('update departamento set descripcion_departamento = ? where id_departamento = ?',[$department_descipcion,$id]);
        DB::update('update departamento set otros_detalles = ? where id_departamento = ?',[$department_otros_detalles,$id]);
        return redirect('Department');
     }

     public function showDepartment($id){
        $departamento = DB::table('departamento')->where('id_departamento',$id)->get();
        return view('Pages.editDepartment',['departamento'=>$departamento]);
     }

     
}