<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\SocialAccountService;
use Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function redirectTo(){

    //     $user=Auth::user();
        
    //     if ($user->esAdmin)
    //         return redirect()->to('/productos/listar');
    // }
    protected function authenticated(Request $request, $user)
    {
        if ( $user->esAdmin ) {// do your margic here
            return redirect()->to('productos/listar');
        }
        else
            return redirect()->to('/');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $github = Socialite::driver('github')->user();

        $user = User::whereEmail($github->getEmail())->first();    

        if (!$user) {
            $user = User::create([
                'email' => $github->getEmail(),
                'name' => $github->getName(),
                'password' => 'password',
            ]);
        }

        auth()->login($user);

        return redirect()->to('/');
    }
    public function redirectToProviderFacebook(){
            return Socialite::driver('facebook')->redirect(); 
    }
    
    public function handleProviderCallbackFacebook(SocialAccountService $service){
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->to('/');
    }


   

}
