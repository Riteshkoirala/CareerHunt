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

//this class id for the login and registration of the user in the database
class LoginController extends Controller
{
    //this function shows the login page to the user
    public function index(){
        //here we are returning the view
        return view('auth.login');
    }
    //this function shows the login page to the user
    public function signup(){
        //here we are returning the view
        return view('auth.signup');
    }
//when we use google to login then we are redirected to this
    public function signInGoogle() {
        //this returns us to the google signin page
        return Socialite::driver('google')
            ->redirect();
    }
    //when we use github to login then we are redirected to this
    public function gitRedirect() {
        //this returns us to the github signin page
        return Socialite::driver('github')
            ->redirect();
    }
    //when we use github to login then we are redirected to this
    public function linkRedirect() {
        //this returns us to the linkedin signin page
        return Socialite::driver('linkedin')
            ->redirect();
    }
    //after we get the signup or signin from the specific they redirect the user
    //to the furter process
    public function getLinkData()
    {
        //getting the data of the user form the linkedin
        $user = Socialite::driver('linkedin')->stateless()->user();
        // we go through his process which send us mail of password and make us able to login
        $user = $this->process($user);
        //then we are redirected to the password entry page with the user data
        return redirect()->route('logFirCode', ['user' => $user]);

    }
    //after we get the signup or signin from the specific they redirect the user
    //to the furter process
    public function getData()
    {
        //getting the data of the user form the google
        $user = Socialite::driver('google')->stateless()->user();
        // we go through his process which send us mail of password and make us able to login
        $user = $this->process($user);
        //then we are redirected to the password entry page with the user data
        return redirect()->route('logFirCode', ['user' => $user]);

    }
    //after we get the signup or signin from the specific they redirect the user
    //to the furter process
    public function getGitData()
    {
        //getting the data of the user form the git
        $user = Socialite::driver('github')->stateless()->user();
        // we go through his process which send us mail of password and make us able to login
        $user = $this->process($user);
        //then we are redirected to the password entry page with the user data
        return redirect()->route('logFirCode', ['user' => $user]);

    }
    // this is the process that was happening above from where the mail of the pass
    //word to the user is being sent
    public function process($user){
        //getting the user email after they signin form any medial
        $email = $user->email;
        //this are the character from which we make the 8 digit password
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=[]{}|;:,.<>?';
        //this is the random number will bw added from here
        $randomNumber = '';
        //this loop with add 8 random digit to the randomnumber
        for ($i = 0; $i < 8; $i++) {
            $randomNumber .= $characters[rand(0, strlen($characters) - 1)];
        }
        //this will check if the user is in the user table or not
        $user = User::where('email', $email)->first();
        //also check if the admin has deleted the user
        $use = User::onlyTrashed()->where('email', $email)->first();
        // id the user has been deleted before then they wont bw able to signin
        if ($use) {
            //they will be redirect to the home
            return redirect()->route('Home');
        }
        //if the user does not exists it will create an user from here
        if (!$user) {
            //the pawword send will also be bycrypted
            $user = new User([
                'email' => $email,
                'password' => bcrypt($randomNumber),
            ]);
            $user->save();//then finally we save the user
        } else {
            //if the user is register before then we send the password to their mail
            //to login and update the user table
            $user->password = bcrypt($randomNumber);
            $user->save();
        }
        //this is the mail templete been sent tot he user
        Mail::to($email)->send(new \App\Mail\NewRegistration($email, $randomNumber));
        // it returen the user whi just logged in
        return $user;

    }
//this functiio redirect to the password login page
    public function FirstLoginCode(User $user)
    {
        // this will help the user to send the mail by giving the user data
        return view('auth.first-signup',['user'=>$user]);
    }
    //this function is to resent the password in the mail of the user.
    public function resendLink(User $user)
    {
        //this will call the above function
        $user = $this->process($user);
        //this will again redirect user to the password login page
        return redirect()->route('logFirCode', ['user' => $user]);
    }
    //this is for the admin login which is already registered in the databae while we run the project
    public function adminLogin(){
        //this will give the admin to login and the login palce
        $user = User::where('is_admin',1)->first();
        //this is the view in which the user can type th password then login into the system
        return view('auth.admin-login',compact('user'));
    }
    //this function is to authenciate the user who is logging in
    public function loginAuthenticate(Request $request, User $user)
    {
        //this is to validate the user password
        $request->validate([
            'otp' => 'required|string|max:8|min:8',
            ]);

        //this will check  the crediantial in the database for the email and passwor
        //whether they match or not
        $cre['email'] = $user->email;
        $cre['password']= $request->otp;


        //if the login is succcessfull then the user is sent to the homepage after login
        if (Auth::attempt($cre)) {
            // The email and password are correct; log the user in.
            $user = Auth::user();
            $user->update(['email_verified_at' => now()]);
            //this is how it is redirected
            $redirectRoute = RouteServiceProvider::HOME;
            return redirect()->intended($redirectRoute);
        }
        else{
            //if the password is wrong then we get this message
            return back()->with('wrong-code','The code you have entered is wrong!!!');
        }
    }

    //this is fpr the logout function
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
