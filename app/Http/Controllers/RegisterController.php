<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function login(){
        return view('backend.layout.registration');
    }
}
