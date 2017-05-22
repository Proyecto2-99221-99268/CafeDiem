<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pertenece;
use App\personalizados;

class PerteneceController extends Controller
{
 	public function __construct(){
        $this->middleware('admin', ['except' => ['index']]);  
    }

 	public function index () {
    	return pertenece::all();
    }    //
    

    public function add (Request $request) {
    
    	$arreglo = json_decode($request->data);
        $idDesayuno=$arreglo[0]->idDesayuno;
        //actualizacion => elimino todos los viejos registros
        $deletedRows=pertenece::where('idDesayuno',$idDesayuno)->delete();//elimino todos los registros con id desayuno para luego actualizarlos

        foreach ($arreglo as $valor) {
                $pertenece = new pertenece;
                $pertenece->idProductos=$valor->idProductos;
                $pertenece->idDesayuno=$valor->idDesayuno;
                $pertenece->idCategoria=$valor->idCategoria;
                $pertenece->save();
            }
    				
        if ($deletedRows == null){
            return ("Se creó un nuevo modelo. Presione ok para ver los cambios");
        }
        else{
            return ("Se actualizo el modelo. Presione ok para ver los cambios");
        }
        	
        }
}
