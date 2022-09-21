<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function __construct(){

    }

    public function getHome(){


//        $routes = Route::getRoutes()->getRoutesByName();
//        foreach ($routes as $route){
//            dd($route->action['as']);
//        }
//        dd($routes);

        return view('frontend');

        return 'hi';
    }
}
