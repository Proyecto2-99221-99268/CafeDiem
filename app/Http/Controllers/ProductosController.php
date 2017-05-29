<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Categorias;
use App\http\Controllers\imagen;
use App\pertenece;

class ProductosController extends Controller
{
    
    public function __construct(){
        $this->middleware('admin', ['except' => ['index']]);  
      }

    public function index(){
    	return Productos::all();
    }
    public function listar(){
        return view('MisVistas.listar'); 
    }
    public function agregar(){
        return view('MisVistas.agregarProducto'); 
    }


    public function get($id){
    	//return Productos::find([$id, 1]);
    	$producto = Productos::where('id', $id)->first();
    	return view('MisVistas.producto',compact('producto'));
    }
    public function create (Request $request )
    {
    	
    	$Producto = new Productos;
    	$CategoriaNombre=$request->Categoria;
    	$Producto->idCategoria=$request->idCategoria;
    	$Producto->nombre=$request->nombre;
    	$Producto->precio=$request->precio;
    	$Producto->imagen='/img/'.$Producto->nombre.'.'.$request->imagen->getClientOriginalExtension();
    	$Producto->x=$request->x;
    	$Producto->y=$request->y;
    	$Producto->w=$request->w;
    	$Producto->h=$request->h;	
        $maxIdLocal=Productos::where('idCategoria',$Producto->idCategoria)->max('idLocal');
        $Producto->idLocal=$maxIdLocal+1;
	   	$imagen= request()->file('imagen');
	   	$nombreImagen = $Producto->nombre.'.'.$request->imagen->getClientOriginalExtension();
	   	$destinationPath = public_path('img');
        $imagen->move($destinationPath, $nombreImagen);
    	 $Producto->save();
         return redirect()->to('/productos/listar');
    	// dd($request);
    }
    public function edit (Request $request ){
        //dd($request->file('imagen'));
        if ($request->file('imagen') == null){
            $IMG=Productos::where('id', $request->id)->first()->select('imagen');
        }
        else{
            $IMG='img/'.$request->nombre.'.'.$request->imagen->getClientOriginalExtension();
            $imagen= request()->file('imagen');
            $nombreImagen = $request->nombre.'.'.$request->imagen->getClientOriginalExtension();
            $destinationPath = public_path('img');
            $imagen->move($destinationPath, $nombreImagen);
        }


        $producto = Productos::where('id', $request->id)->first()
        ->update(['nombre' => $request->nombre,'idCategoria'=> $request->idCategoria,
            'precio'=>$request->precio, 'imagen' =>$IMG,'x'=>$request->x,'y'=>$request->y,'w'=>$request->w,'h'=>$request->h]
            );
        
        return redirect()->to('/productos/listar');
    }
    public function eliminar ($id){
        $idCategoria=Productos::where('id',$id)->value('idCategoria');
        $idLocal=Productos::where('id',$id)->value('idLocal');
        // //control si existe en perteneces
        $rta=pertenece::where('idCategoria',$idCategoria)
                    ->where('idProductos',$idLocal)
                    ->get();

        if ($rta->isEmpty()){
            //puedo eliminar
            Productos::destroy($id);
        }
        // return $rta;
        //no puedo ya que pertenece a un desayuno personalizado

        return redirect()->to('/productos/listar');
    }


}
