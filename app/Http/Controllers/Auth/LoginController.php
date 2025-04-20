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
        // Step 1: Get Google user data
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Step 2: Dump full Google user data to check
        // ⚠️ Ye line sirf debugging ke liye hai. Kaam ho jaye to hata dena.
        // dd($googleUser);

        // Step 3: Find user in DB
        $user = User::where('email', $googleUser->email)->first();

        // Step 4: If user doesn't exist, create it
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id, 
                'role' => 'user',
                'password' => bcrypt(uniqid()),
            ]);
        }

        // Step 5: Login the user
        auth()->login($user);

        // Step 6: Redirect based on role
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
        // Step 7: Show exact error message
        dd('Error: ' . $e->getMessage());
        // Ya agar tu redirect karna chahta hai to:
        // return redirect()->route('login')->with('error', $e->getMessage());
    }
}


    
    
}
