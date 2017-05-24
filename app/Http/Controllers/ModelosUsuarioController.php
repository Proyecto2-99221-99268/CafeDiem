<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelosUsuario;

class ModelosUsuarioController extends Controller
{
    //
    public function crear(Request $request){
    	//'nombre': nombreDesayuno,'id_Usuario':usuarioID
	 	$modelo_usuario = new modelosUsuario;
    	$modelo_usuario->nombre=$request->nombre;
    	$modelo_usuario->idUsuario=$request->idUsuario;

    	$modelo_usuario->save();


    	return $modelo_usuario->id;
    }
}
