<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
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
    protected $redirectTo = '/posts';
    public const HOME = '/posts';
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('auth')->only('logout');
    // }

    protected function credentials(Request $request)
    {
        return $request->only('name', 'password'); 
    }

    public function validateLogin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);


        if (Auth::attempt($credentials)) {
            $userId = Auth::id();
        
            \Log::info('Before regenerate', [
                'session_id' => session()->getId(),
                'user_id' => $userId
            ]);
    
            $request->session()->regenerate();
            
            // Store this for after regeneration
            $request->session()->put('auth.user_id', $userId);
            
            // Force the session to be saved and started
            $request->session()->save();
            
            \Log::info('After save', [
                'session_id' => session()->getId(),
                'user_id' => $userId,
                'session_data' => $request->session()->all()
            ]);
    

            //return redirect()->intended(RouteServiceProvider::HOME);
            return redirect()->intended('/posts');
        }


        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }
}
