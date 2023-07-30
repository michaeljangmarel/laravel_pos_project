<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\auth;
use Illuminate\Routing\Controller;

class auth extends Controller
{
    //

    //  url login to ui login amd register

    public function none() {
        return view('register');
    }

     public function login() {
         return view('login');
     }

     public function register() {
        return view('register');
     }
     // url login to ui login and register



}
