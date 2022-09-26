<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function __construct(){

    }

    public function getHome(){
        return view('frontend');

    }


}
