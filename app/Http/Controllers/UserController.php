<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //Show register create from
    public function register(){
        return view('users.register');
    }
    // Store user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
            
        ]);
        $formFields['password'] = bcrypt($formFields['password']);

        $user=User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message','User created and logged in');
    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','Session Destroyed Successfully');
    }
}
