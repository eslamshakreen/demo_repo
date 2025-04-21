<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $myname = "Eslam";
        $mylastname = "mohammed";
        return view('home', compact('myname', 'mylastname'));
    }
}
