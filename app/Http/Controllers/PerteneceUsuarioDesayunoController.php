<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\perteneceUsuarioDesayuno;
use App\modelosUsuario;


class PerteneceUsuarioDesayunoController extends Controller
{
    //
    public function all ($idUsuario){
        // $mu = modelosUsuario::where('idUsuario', $id)->get();
        $ids =modelosUsuario::where('idUsuario',$idUsuario)->pluck('id')->toArray();

        // $aRetornar=perteneceUsuarioDesayuno::where('idModelos',$idModelos)->get();
        $aRetornar=perteneceUsuarioDesayuno::whereIn('idModelos',$ids)->get();
        return $aRetornar;
    }

    public function crear (Request $request){

    	$arreglo = json_decode($request->data);
        $idModelos=$arreglo[0]->idModelos;
        //actualizacion => elimino todos los viejos registros
        $deletedRows=perteneceUsuarioDesayuno::where('idModelos',$idModelos)->delete();//elimino todos los registros con id desayuno para luego actualizarlos

        foreach ($arreglo as $valor) {
                $pertenece = new perteneceUsuarioDesayuno;
                $pertenece->idModelos=$valor->idModelos;
                $pertenece->idProductos=$valor->idProductos;
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
