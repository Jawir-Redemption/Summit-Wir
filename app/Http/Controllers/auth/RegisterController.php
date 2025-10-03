<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);
 
        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);
 
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function verification()
    {
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request) 
    {
        $request->fulfill();

        return redirect()->route('home');
    }

    public function resendVerification(Request $request) {
        $request->user()->sendEmailVerificationNotification();
 
        return back()->with('message', 'Verification link sent!');
    }
}
