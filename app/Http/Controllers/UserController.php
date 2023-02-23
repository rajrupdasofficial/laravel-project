<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //Show register create from
    public function register(){
        return view('users.register');
    }
}
