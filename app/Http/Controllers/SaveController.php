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

    //Customer functions

    public function addCustomer(Request $req){
        $id_cliente = $req->input('id_cliente');
        $correo_electronico = $req->input('correo_electronico');
        $telefono = $req->input('telefono');
        $provincia = $req->input('provincia');
        $canton = $req->input('canton');
        $distrito = $req->input('distrito');
        $direccion_exacta = $req->input('direccion_exacta');
        $otro_detalle = $req->input('otro_detalle');

        $valuesCliente = array(
            'id_cliente'     =>   $id_cliente,
            'telefono'     =>   $telefono, 
            'correo_electronico'     =>   $correo_electronico,
            'id_direccion' => $id_cliente,
            'otro_detalle' => $otro_detalle
        );

        $valuesDireccion =  array(
            'id_direccion' => $id_cliente,
            'provincia'     =>   $provincia,
            'canton'     =>   $canton,
            'distrito'     =>   $distrito,
            'direccion_exacta'     =>   $direccion_exacta
        );

        DB::table('direccion_cliente')->insert($valuesDireccion);
        DB::table('cliente')->insert($valuesCliente);
        
        return redirect('Customer');
    }

    public function showCustomer($id){
        $customer = DB::table('cliente')->where('id_cliente',$id)->get();
        $direccion = DB::table('direccion_cliente')->where('id_direccion',$id)->get();
        return view('Pages.editCustomer',['cliente'=>$customer],['direccion'=>$direccion]);
     }

    public function editCustomer(Request $request,$id) {

        $cliente = DB::table('cliente')->where('id_cliente',$id)->get();
        $direccion = DB::table('direccion_cliente')->where('id_direccion',$id)->get();

        $telefono = $request->input('telefono');
        $correo_electronico = $request->input('correo_electronico');
        $otro_detalle = $request->input('otro_detalle');

        $provincia = $request->input('provincia');
        $canton = $request->input('canton');
        $distrito = $request->input('distrito');
        $direccion_exacta = $request->input('direccion_exacta');

        DB::update('update cliente 
            set telefono = ?,
            correo_electronico = ?,
            otro_detalle = ? 
            where id_cliente = ?',
            [$telefono, $correo_electronico, $otro_detalle, $id]);

        DB::update('update direccion_cliente 
            set provincia = ?,
            canton = ?,
            distrito = ?,
            direccion_exacta = ?
            where id_direccion = ?',
            [$provincia, $canton, $distrito, $direccion_exacta, $id]);

        return redirect('Customer');
     }
     
     public function deleteCustomer($id){
        DB::table('cliente')->where('id_cliente', $id)->delete();
        DB::table('direccion_cliente')->where('id_direccion', $id)->delete();
        return redirect('Customer');  
    }
}