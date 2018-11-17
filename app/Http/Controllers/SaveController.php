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

    //Fabricante
    public function addFabricante(Request $req){
        $codigo_fabricante = $req->input('codigo_fabricante');
        $nombre_fabricante = $req->input('nombre_fabricante');
        $otro_detalle = $req->input('otro_detalle');        

        $values = array(
            'codigo_fabricante'     =>   $codigo_fabricante, 
            'nombre_fabricante'   =>   $nombre_fabricante,
            'otro_detalle' => $otro_detalle,            
        );

        DB::table('fabricante_vehiculo')->insert($values);
        
        return redirect('Fabricante');
    }

    public function deleteFabricante($id){
        DB::table('fabricante_vehiculo')->where('codigo_fabricante', $id)->delete();
        return redirect('Fabricante');  
    }

    public function editFabricante(Request $request,$id) {

        $nombre_fabricante = $request->input('nombre_fabricante');
        $otro_detalle = $request->input('otro_detalle');
        DB::update('update fabricante_vehiculo set nombre_fabricante = ? where codigo_fabricante = ?',[$nombre_fabricante,$id]);
        DB::update('update fabricante_vehiculo set otro_detalle = ? where codigo_fabricante = ?',[$otro_detalle,$id]);        
        return redirect('Fabricante');
     }

     public function showFabricante($id){
        $departamento = DB::table('fabricante_vehiculo')->where('codigo_fabricante',$id)->get();
        return view('Pages.editFabricante',['fabricante'=>$departamento]);
     }

    //Categoria
    public function addCategoria(Request $req){
        $codigo_categoria_vehiculo = $req->input('codigo_categoria_vehiculo');
        $descripcion_categoria = $req->input('descripcion_categoria');        

        $values = array(
            'codigo_categoria_vehiculo'     =>   $codigo_categoria_vehiculo, 
            'descripcion_categoria'   =>   $descripcion_categoria            
        );

        DB::table('categoria_vehiculo')->insert($values);
        
        return redirect('Categoria');
    }

    public function deleteCategoria($id){
        DB::table('categoria_vehiculo')->where('codigo_categoria_vehiculo', $id)->delete();
        return redirect('Categoria');  
    }

    public function editCategoria(Request $request,$id) {

        $descripcion_categoria = $request->input('descripcion_categoria');
        
        DB::update('update categoria_vehiculo set descripcion_categoria = ? where codigo_categoria_vehiculo = ?',[$descripcion_categoria,$id]);
        
        return redirect('Categoria');
     }

     public function showCategoria($id){
        $categoria = DB::table('categoria_vehiculo')->where('codigo_categoria_vehiculo',$id)->get();
        return view('Pages.editCategoria',['categoria'=>$categoria]);
     }
    //Modelo
    public function addModelo(Request $req){
        $codigo_modelo = $req->input('codigo_modelo');
        $nombre_modelo = $req->input('nombre_modelo');
        $codigo_fabricante = $req->input('codigo_fabricante');        

        $values = array(
            'codigo_modelo'     =>   $codigo_modelo, 
            'nombre_modelo'   =>   $nombre_modelo,
            'codigo_fabricante' => $codigo_fabricante            
        );

        DB::table('modelo_vehiculo')->insert($values);
        
        return redirect('Modelo');
    }

    public function deleteModelo($id){
        DB::table('modelo_vehiculo')->where('codigo_modelo', $id)->delete();
        return redirect('Modelo');  
    }

    public function editModelo(Request $request,$id) {

        $nombre_modelo = $request->input('nombre_modelo');
        $codigo_fabricante = $request->input('codigo_fabricante');
        
        DB::update('update modelo_vehiculo set nombre_modelo = ? where codigo_modelo = ?',[$nombre_modelo,$id]);
        DB::update('update modelo_vehiculo set codigo_fabricante = ? where codigo_modelo = ?',[$codigo_fabricante,$id]);
        
        return redirect('Modelo');
     }

     public function showModelo($id){
        $modelo = DB::table('modelo_vehiculo')->where('codigo_modelo',$id)->get();
        return view('Pages.editModelo',['modelo'=>$modelo]);
     }
}