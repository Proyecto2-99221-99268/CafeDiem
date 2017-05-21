<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pertenece;


class PerteneceController extends Controller
{
 	public function __construct(){
        $this->middleware('admin', ['except' => ['index']]);  
    }

 	public function index () {
    	return pertenece::all();
    }    //
    public function add (Request $request) {
    	// $pertenece = new pertenece;
				
    	
    	// $idCategoria=$request->idCategoria;
    	// $idDesayuno=$request->idDesayuno;
    	// $idProducto=$request->idProductos;

    	// $pertenece->idCategoria=$idCategoria;
    	// $pertenece->idDesayuno=$idDesayuno;
    	// $pertenece->idProductos=$idProducto;


    	// $pertenece->save();
    	return($request->data);
    	
    }   
}
