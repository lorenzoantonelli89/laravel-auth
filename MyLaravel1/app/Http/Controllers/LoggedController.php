<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Brand;
use App\Car;
use App\Pilot;
use App\Mail\CarCreate;

class LoggedController extends Controller
{
    private function getRules(){

        return [
            'model' => 'required|string|min:2',
            'kW' => 'required|integer|min:30|max:400',
            'brand_id' => 'required|exists:brands,id|integer',
            'pilots_id.*' => 'nullable|distinct|exists:pilots,id|integer'
        ];
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newCar(){

        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.new-car', compact('brands', 'pilots'));

    }

    public function store(Request $request){

        $validate = $request -> validate($this -> getRules());
        
        $car = Car::make($validate);

        $brand = Brand::findOrFail($request -> get('brand_id'));
        $car -> brand() -> associate($brand);
        $car -> save();
        
        // valorizzo $img con il value dell'input con name image
        $img = $request -> file('image');
        // valorizzo una variabile con l'estensione del file
        $imgExt = $img -> getClientOriginalExtension();
        // assegno un nuovo nome univoco all'immagine 
        $imgNewName = time() . rand(1, 1000) . '.' . $imgExt;
        // creo la cartella in cui andranno le immagini
        $folder = '/car-img/';
        // inserisco l'immagine dentro la cartella creata
        $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
        // inserito dentro la colonna image nella table cars il nome dell'immagine
        $car -> image  = $imgNewName;
        // dd($img, $imgExt, $imgNewName);

        $car -> pilots() -> attach($request -> get('pilots_id'));
        $car -> save();

        $user = Auth::user();

        // mail all'admin sito
        Mail::to('admin@miosito.com')->send(new CarCreate($car));
        // mail all'utente loggato
        Mail::to($user)->send(new CarCreate($car));

        // dd($car);
        return redirect() -> route('home');
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
        return redirect() -> route('home');
    }

    public function destroy($id){

        $car = Car::findOrFail($id);

        $car -> delete = true;

        $car -> save();

        return redirect() -> route('home');
    }

    public function test(){

        return view('home');
    }

}
