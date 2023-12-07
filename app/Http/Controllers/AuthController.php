<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
   
    public function index()  {
        return view('login');
    }
    public function lupapas()  {
        return view('lupa-password');
    }
    public function passbaru()  {
        return view('password-baru');
    }
    public function register()  {
        return view('register');
    }
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required', // You may need to create a custom rule for roles
        ], [
            'name.required' => 'Please enter your name!',
            'email.required' => 'Please enter a valid email address!',
            'password.required' => 'Please enter your password!',
            'role.required' => 'Please select a role!',
            
        ]);
        // dd($request->input('role'));
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->input('password'));
        $user->save();
            // Send email
        Mail::to($user->email)->send(new \App\Mail\UserRegistered());
       
        // Redirect to the login page after registration
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
    public function lupapasSub(Request $request)  {
        $user = User::where('email',$request->input('email'))->first();
        if($user){
            Mail::to($request->input('email'))->send(new \App\Mail\UserForgot());
            Session::put('user_email', $request->input('email'));
            return redirect()->back()->with('success', 'Forgot Password is Successfull. Please Check Your Email.');
        }else{
            
            return redirect()->back()->with('error', 'Email does not exist');
        }
 
    }
    public function passbaruSub(Request $request)  {
        $email = Session::get('user_email');
        $user = User::where('email',$email)->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('login')->with('success', 'Successful. Please log in.');
        
 
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'Please enter a valid email address!',
            'password.required' => 'Please enter your password!',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard'); // Redirect to the intended URL after successful login
        } else {
            return redirect()->back()->with('error', 'Invalid email or password. Please try again.');
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

}
