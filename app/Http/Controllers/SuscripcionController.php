<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    //
    public function index()
    {
        return view('pricing.subscription');
    }

    public function pro()
    {
        return view('pricing.pro');
    }

    public function starter()
    {
        return view('pricing.starter');
    }

    public function senior()
    {
        return view('pricing.senior');
    }
}
