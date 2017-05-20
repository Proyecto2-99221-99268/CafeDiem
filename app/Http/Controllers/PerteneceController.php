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
    	return pertenece::all();
    }   
}
