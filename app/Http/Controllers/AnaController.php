<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnaController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function adminpanel(){
        return view('dashboard');
    }
}
