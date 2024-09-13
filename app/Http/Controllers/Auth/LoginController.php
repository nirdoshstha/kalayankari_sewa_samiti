<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    // protected $redirectTo = '/home';

    protected function authenticated(Request $request, $user)
    {
        if(auth()->user()->user_role =='1' || auth()->user()->user_role=='2'){
            
            return redirect()->route('dashboard.index')->with('success_message','Welcome '.auth()->user()->name.' to the Dashboard'); 
            
        }
        
        elseif(auth()->user()->user_role=='0'){  

            return redirect()->back()->with('success_message', ' Logged In Successfully !!'); 
            
            }

           
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

     // function for Login from username and email
     public function username(){
        $loginValue = request('username');
        $this->username = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$this->username=>$loginValue]);
        return property_exists($this,'username') ? $this->username : 'email';
    }
}
