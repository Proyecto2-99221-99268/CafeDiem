<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personalizados;


class PersonalizadosController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['except' => ['index']]);  
    }

    public function index()
    {
        return personalizados::all();
    }
    
    public function add(Request $request){
    	$personalizados = new personalizados;
    	$personalizados->nombre=$request->nombre;
    	$personalizados->save();

    	return $personalizados->id;
    }
    public function destroy($id){

        $id=$request->id;
        $personalizados::find(id);
        $personalizados->delete();
        return $personalizados->id;
    }

}
