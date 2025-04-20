<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

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
    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return route('dashboard');
        } elseif (auth()->user()->role === 'hr') {
            return route('manage_jobs');
        } elseif (auth()->user()->role === 'user') {
            return route('my_resume');
        }

        return '/';
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

    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}


    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
    
            $user = User::where('email', $googleUser->email)->first();
    
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id, 
                    'role'=>'user',
                    'password' => bcrypt(uniqid()), 
                ]);
            }
    
            auth()->login($user);
    
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'hr') {
                return redirect()->route('manage_jobs');
            } elseif ($user->role === 'user') {
                return redirect()->route('my_resume');
            } else {
                return redirect('/');
            }
            
    
        } catch (\Exception $e) {
            dd($e->getMessage())
            return redirect()->route('login')->with('error', 'Something went wrong, please try again.');
        }
    }
    
    
}
