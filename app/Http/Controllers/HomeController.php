<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $stats = ['products' => 42, 'posts' => 12, 'visitors' => 980];
        return view('home', compact('stats'));
    }
}
