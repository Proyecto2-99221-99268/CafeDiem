<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('MisVistas.index');
});

Route::get('/home', function () {
     return redirect()->to('/');
});

Route::get('/agregarProducto', function () {
    return view('MisVistas.agregarProducto');
});

Route::get('/categorias/all', 'CategoriasController@index');

Route::get('/productos/agregar','ProductosController@agregar');
Route::get('productos/listar','ProductosController@listar');
Route::get('/productos/all', 'ProductosController@index');
Route::get('/productos/{id}','ProductosController@get');
Route::post('/productos/crear','ProductosController@create');
Route::post('/productos/edit','ProductosController@edit');




route::get('/personalizados/all','PersonalizadosController@index');
route::get("/personalizados/eliminar",'PersonalizadosController@eliminar');
route::post('/personalizados/crear','PersonalizadosController@add');
route::delete('/personalizados/{id}','PersonalizadosController@destroy');

route::get('/perteneces/all','PerteneceController@index');
route::post('/perteneces','PerteneceController@add');



// Route::get('/home', function (){
// 	return view ('MisVistas.index');
// });

// Auth::routes();


Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/{provider}',          'Auth\SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

// Route::get('administrador', 'paginaAdministrador@retornarPagina');

// Auth::routes();


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

 Route::post('password/reset/{token}', function($token)
 {
 	
    return View::make('reset')->with('token', $token);


 })->name('password/reset');

// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password/reset');

Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// Route::any('password/reset', 'Auth\ResetPasswordController@reset');
Route::post('reset', 'Auth\ResetPasswordController@reset');


Route::get('generarURL', 'URL@generar');