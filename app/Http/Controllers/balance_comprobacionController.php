<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class balance_comprobacionController extends Controller
{
    public function index()
    {

        return view('balance-comprobacion');
    }

    public function pdf_bcomp()
    {

        return view('pdf/balance-comp');
    }
}
