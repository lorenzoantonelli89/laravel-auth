<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;

class HomeController extends Controller
{
    public function home()
    {
        $cars = Car::where('delete', false) -> get();

        return view('pages.home', compact('cars'));
    }

    public function detailsCar($id){

        $car = Car::findOrFail($id);

        return view('pages.details', compact('car'));
    }
}
