<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginValidar;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {

        return view('login');
    }

    public function login(loginValidar $req){



        return redirect('dashboard')->with('bienvenida','login');
    }

}
