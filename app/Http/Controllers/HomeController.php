<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['logged']);
    }

    public function getHome(){
        return view('frontend');

    }


}
