<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuASController extends Controller
{
    public function show(){
        return view('menuas');
    }
        
}