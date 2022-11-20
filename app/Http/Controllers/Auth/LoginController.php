<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    protected function authenticated(Request $request, $user)
    {
        $request->validate([
            'email' => 'required|email|min:4|max:50',
            'password' => 'required'
        ]);
    
        $remember_me = $request->has('remember_me') ? true : false;
    
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            if ($user->hasRole(['Super Admin', 'Admin'])) {
                return redirect()->route('dashboard');
            } elseif ($user->hasRole('User')) {
                return redirect()->route('landing');
            } else {
                return redirect()->route('landing');
            }
        } else {
            return redirect()->route('login');
        }
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
