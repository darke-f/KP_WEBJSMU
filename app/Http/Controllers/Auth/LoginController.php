<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use illuminate\http\Request;

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
    protected $redirectTo = '/about';
    protected function _construct(){
        if($user->bool !== 1){
            return $redirectTo = '/dashboardadmin';
        } else {
            return $redirectTo = '/dashboard';
        }
         
    }

    
    /*protected function check()
    {
        if($user->bool('1')) {
            return redirect('/dashboardadmin');
        } else {
            return redirect('/dashboard');
        }
    }
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


}
