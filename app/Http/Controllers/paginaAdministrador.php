<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paginaAdministrador extends Controller
{
    //
    public function __construct(){
		$this->middleware('admin');
    }
    public function retornarPagina(){
    	return view ('administradorPagina');
    }
}
