<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Car;
use App\Pilot;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    private function getRules(){

        return [
            'model' => 'required|string|min:3',
            'kW' => 'required|integer|min:70|max:400',
            'brand_id' => 'required|exists:brands,id|integer',
        ];
    }

    public function carList(){

        $cars = Car::where('delete', false) -> get();

        return view('pages.home', compact('cars'));
    }

    public function detailsCar($id){

        $car = Car::findOrFail($id);

        return view('pages.details', compact('car'));
    }

    public function newCar(){

        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.new-car', compact('brands', 'pilots'));

    }

    public function store(Request $request){

        $validate = $request -> validate($this -> getRules());
        
        $brand = Brand::findOrFail($request -> get('brand_id'));

        $car = Car::make($validate);

        $car -> brand() -> associate($brand);
        $car -> save();

        $car -> pilots() -> attach($request -> get('pilots_id'));
        $car -> save();

        // dd($car);
        return redirect() -> route('car-list');
    }

    public function edit($id){

        $car = Car::findOrFail($id);
        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.edit', compact('car', 'brands', 'pilots'));
    }

    public function update(Request $request, $id){

        $validate = $request -> validate($this -> getRules());


        $car = Car::findOrFail($id);

        $car -> update($validate);

        $brand = Brand::findOrFail($request -> get('brand_id'));

        $car -> brand() -> associate($brand);
        $car -> save();

        $car -> pilots() -> attach($request -> get('pilots_id'));
        $car -> save();

        // dd($car);
        return redirect() -> route('car-list');
    }

    public function destroy($id){

        $car = Car::findOrFail($id);

        $car -> delete = true;

        $car -> save();

        return redirect() -> route('car-list');
    }
}
