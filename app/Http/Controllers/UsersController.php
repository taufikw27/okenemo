<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users', ['users' => $users]);
    }
    public function create(Request $request){
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
        // Mail::to($user->email)->send(new \App\Mail\UserRegistered());
       
        // Redirect to the login page after registration
        return redirect()->route('users.index')->with('success', 'Successful.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:8', // 'sometimes' allows for updating without changing the password
            'role' => 'required',
        ], [
            'name.required' => 'Please enter your name!',
            'email.required' => 'Please enter a valid email address!',
            'password.required' => 'Please enter your password!',
            'role.required' => 'Please select a role!',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
