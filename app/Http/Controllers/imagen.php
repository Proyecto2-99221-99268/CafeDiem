<?php 
namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Session;

class imagen extends Controller {

  public function upload (Request $request)
  {
      dd($request->file('imagen'));
      // $file = $request->file('imagen');
      // // $this->validate($request, [
      // //       'imagen' => 'required|image|mimes:png|max:2048',
      // //   ]);
      // // if ($validator->fails()) {
      // //   // send back to the page with the input data and errors
      // //   return Redirect::to('agregarProducto')->withInput()->withErrors($validator);
      // // }
      // $CategoriaNombre=$request->Categoria;
      // $patch ="img/".$CategoriaNombre."/";
      // $imageName = $request->nombre;
      // $file->move(public_path($path), $imageName);

    }
}