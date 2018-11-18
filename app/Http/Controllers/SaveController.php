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
     //Service
    public function addService(Request $req){
        $id_servicio = $req->input('id_servicio');
        $next_id_service = $req->input('next_id_service');
        $id_departamento = $req->input('id_departamento');      
        $nombre_servicio = $req->input('nombre_servicio');
        $costo_servicio = $req->input('costo_servicio');
        $descripcion_servicio = $req->input('descripcion_servicio');     
        $otros_detalles = $req->input('otros_detalles');        

        $values = array(
            'id_servicio'     =>   $id_servicio, 
            'next_id_service'   =>   $next_id_service,
            'id_departamento' => $id_departamento,
            'nombre_servicio'     =>   $nombre_servicio, 
            'costo_servicio'   =>   $costo_servicio,
            'descripcion_servicio' => $descripcion_servicio,
            'otros_detalles' => $otros_detalles
        );

        DB::table('servicio')->insert($values);
        
        return redirect('Service');
    }

    public function deleteService($id){
        DB::table('servicio')->where('id_servicio', $id)->delete();
        return redirect('Service');  
    }

    public function editService(Request $request,$id) {

        $next_id_service = $request->input('next_id_service');
        $id_departamento = $request->input('id_departamento');      
        $nombre_servicio = $request->input('nombre_servicio');
        $costo_servicio = $request->input('costo_servicio');
        $descripcion_servicio = $request->input('descripcion_servicio');     
        $otros_detalles = $request->input('otros_detalles');  
        
        DB::update('update servicio set next_id_service = ? where id_servicio = ?',[$next_id_service,$id]);
        DB::update('update servicio set id_departamento = ? where id_servicio = ?',[$id_departamento,$id]);
        DB::update('update servicio set nombre_servicio = ? where id_servicio = ?',[$nombre_servicio,$id]);
        DB::update('update servicio set costo_servicio = ? where id_servicio = ?',[$costo_servicio,$id]);
        DB::update('update servicio set descripcion_servicio = ? where id_servicio = ?',[$descripcion_servicio,$id]);
        DB::update('update servicio set otros_detalles = ? where id_servicio = ?',[$otros_detalles,$id]);
        
        return redirect('Service');
     }

     public function showService($id){
        $service = DB::table('servicio')->where('id_servicio',$id)->get();
        return view('Pages.editService',['service'=>$service]);
     }

    //Service Request
    public function addServiceRequest(Request $req){
        $id_servicio_consulta = $req->input('id_servicio_consulta');
        $is_servicio_consulta_previo = $req->input('is_servicio_consulta_previo');
        $id_cliente = $req->input('id_cliente');     
        $id_vehiculo = $req->input('id_vehiculo');
        $id_servicio = $req->input('id_servicio');
        $fecha_servicio_solicitada = $req->input('fecha_servicio_solicitada');     
        $fecha_servicio_efectuado = $req->input('fecha_servicio_efectuado');
        $costo_servicio = $req->input('costo_servicio');
        $id_prueba_adicional = $req->input('id_prueba_adicional');     
        $otro_detalle = $req->input('otro_detalle');        

        $values = array(
            'id_servicio_consulta'     =>   $id_servicio_consulta, 
            'is_servicio_consulta_previo'   =>   $is_servicio_consulta_previo,
            'id_cliente' => $id_cliente,
            'id_vehiculo'     =>   $id_vehiculo, 
            'id_servicio'   =>   $id_servicio,
            'fecha_servicio_solicitada' => $fecha_servicio_solicitada,
            'fecha_servicio_efectuado'     =>   $fecha_servicio_efectuado, 
            'costo_servicio'   =>   $costo_servicio,
            'id_prueba_adicional' => $id_prueba_adicional,
            'otro_detalle' => $otro_detalle            
        );

        DB::table('consulta_servicio')->insert($values);
        
        return redirect('ServiceRequest');
    }

    public function deleteServiceRequest($id){
        DB::table('consulta_servicio')->where('id_servicio_consulta', $id)->delete();
        return redirect('ServiceRequest');  
    }

    public function editServiceRequest(Request $request,$id) {

        $is_servicio_consulta_previo = $request->input('is_servicio_consulta_previo');
        $id_cliente = $request->input('id_cliente');     
        $id_vehiculo = $request->input('id_vehiculo');
        $id_servicio = $request->input('id_servicio');
        $fecha_servicio_solicitada = $request->input('fecha_servicio_solicitada');     
        $fecha_servicio_efectuado = $request->input('fecha_servicio_efectuado');
        $costo_servicio = $request->input('costo_servicio');
        $id_prueba_adicional = $request->input('id_prueba_adicional');     
        $otro_detalle = $request->input('otro_detalle');   
        
        DB::update('update consulta_servicio set is_servicio_consulta_previo = ? where id_servicio_consulta = ?',[$is_servicio_consulta_previo,$id]);
        DB::update('update consulta_servicio set id_cliente = ? where id_servicio_consulta = ?',[$id_cliente,$id]);
        DB::update('update consulta_servicio set id_vehiculo = ? where id_servicio_consulta = ?',[$id_vehiculo,$id]);
        DB::update('update consulta_servicio set id_servicio = ? where id_servicio_consulta = ?',[$id_servicio,$id]);
        DB::update('update consulta_servicio set fecha_servicio_solicitada = ? where id_servicio_consulta = ?',[$fecha_servicio_solicitada,$id]);
        DB::update('update consulta_servicio set fecha_servicio_efectuado = ? where id_servicio_consulta = ?',[$fecha_servicio_efectuado,$id]);
        DB::update('update consulta_servicio set costo_servicio = ? where id_servicio_consulta = ?',[$costo_servicio,$id]);
        DB::update('update consulta_servicio set id_prueba_adicional = ? where id_servicio_consulta = ?',[$id_prueba_adicional,$id]);
        DB::update('update consulta_servicio set otro_detalle = ? where id_servicio_consulta = ?',[$otro_detalle,$id]);        
        
        return redirect('ServiceRequest');
     }

     public function showServiceRequest($id){
        $request = DB::table('consulta_servicio')->where('id_servicio_consulta',$id)->get();
        return view('Pages.editServiceRequest',['request'=>$request]);
     }
     //Vehicle
    public function addVehicle(Request $req){
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

    public function deleteVehicle($id){
        DB::table('modelo_vehiculo')->where('codigo_modelo', $id)->delete();
        return redirect('Modelo');  
    }

    public function editVehicle(Request $request,$id) {

        $nombre_modelo = $request->input('nombre_modelo');
        $codigo_fabricante = $request->input('codigo_fabricante');
        
        DB::update('update modelo_vehiculo set nombre_modelo = ? where codigo_modelo = ?',[$nombre_modelo,$id]);
        DB::update('update modelo_vehiculo set codigo_fabricante = ? where codigo_modelo = ?',[$codigo_fabricante,$id]);
        
        return redirect('Modelo');
     }

     public function showVehicle($id){
        $modelo = DB::table('modelo_vehiculo')->where('codigo_modelo',$id)->get();
        return view('Pages.editModelo',['modelo'=>$modelo]);
     }
     //Pruebas
    public function addPruebas(Request $req){
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

    public function deletePruebas($id){
        DB::table('modelo_vehiculo')->where('codigo_modelo', $id)->delete();
        return redirect('Modelo');  
    }

    public function editPruebas(Request $request,$id) {

        $nombre_modelo = $request->input('nombre_modelo');
        $codigo_fabricante = $request->input('codigo_fabricante');
        
        DB::update('update modelo_vehiculo set nombre_modelo = ? where codigo_modelo = ?',[$nombre_modelo,$id]);
        DB::update('update modelo_vehiculo set codigo_fabricante = ? where codigo_modelo = ?',[$codigo_fabricante,$id]);
        
        return redirect('Modelo');
     }

     public function showPruebas($id){
        $modelo = DB::table('modelo_vehiculo')->where('codigo_modelo',$id)->get();
        return view('Pages.editModelo',['modelo'=>$modelo]);
     }
}