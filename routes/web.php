<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $myname = "Eslam";
    $myLastName = "Mohammed";
    return view('home', compact('myname', 'myLastName'));
});


Route::get('/loop', function () {
    $car_Types = ['Mercedes', 'BMW', 'Audi', 'Toyota', 'Honda'];
    $x = 10;
    $number_to_ten = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    return view('loop', compact('car_Types', 'number_to_ten', 'x'));
});
// Route::get('/home', [HomeController::class, 'index']);
