<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function signup(){
        return view('auth.signup');
    }

    public function signInGoogle() {
        return Socialite::driver('google')
            ->redirect();
    }
    public function gitRedirect() {
        return Socialite::driver('github')
            ->redirect();
    }
    public function linkRedirect() {
        return Socialite::driver('linkedin')
            ->redirect();
    }
    public function getLinkData()
    {
        $user = Socialite::driver('linkedin')->stateless()->user();
        $user = $this->process($user);
        return redirect()->route('logFirCode', ['user' => $user]);

    }
    public function getData()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $user = $this->process($user);
        return redirect()->route('logFirCode', ['user' => $user]);

    }
    public function getGitData()
    {
        $user = Socialite::driver('github')->stateless()->user();
        $user = $this->process($user);
        return redirect()->route('logFirCode', ['user' => $user]);

    }
    public function process($user){
        $email = $user->email;

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=[]{}|;:,.<>?';
        $randomNumber = '';
        for ($i = 0; $i < 8; $i++) {
            $randomNumber .= $characters[rand(0, strlen($characters) - 1)];
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = new User([
                'email' => $email,
                'password' => bcrypt($randomNumber),
            ]);
            $user->save();
        } else {
            $user->password = bcrypt($randomNumber);
            $user->save();
        }

        Mail::to($email)->send(new \App\Mail\NewRegistration($email, $randomNumber));

        return $user;

    }

    public function FirstLoginCode(User $user)
    {
        return view('auth.first-signup',['user'=>$user]);
    }
    public function loginAuthenticate(Request $request, User $user)
    {
        $request->validate([
            'otp' => 'required|string|max:8|min:8',
            ]);

        $cre['email'] = $user->email;
        $cre['password']= $request->otp;

        $user = User::where('email','=',$user->email)->first();
        $user->update(['email_verified_at' => now()]);

        if($cre){
        Auth::login($user, true);
        $redirectRoute =  RouteServiceProvider::HOME;
        return redirect()->intended($redirectRoute);
        }
        else{
            return back()->with('wrong-code','The code you have entered is wrong!!!');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
