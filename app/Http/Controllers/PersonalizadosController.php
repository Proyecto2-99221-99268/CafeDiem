<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personalizados;
use App\pertenece;


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

        $personalizado=personalizados::find($id);
        if ($personalizado == null)
            return redirect()->to('/');
        else{
            $perteneceEliminar=pertenece::where('idDesayuno',$id)->delete();
            $personalizado->delete();
            return redirect()->to('/');
            }
    }

    public function eliminar(){
        $personalizados = personalizados::all();
        return view ("misVistas.personalizadosEliminar",compact('personalizados'));    
    }

}
