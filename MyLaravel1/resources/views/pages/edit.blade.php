@extends('layouts.main-layout')
@section('title')
    Update Car
@endsection
@section('content')

    <main>
        <h1>
            Update Car
        </h1>
        
        <form method="POST" action="{{route('update', $car -> id)}}">

            @csrf
            @method('POST')
            <div>
                <div class="container-label">
                    <label for="model">
                        Model
                    </label>
                </div>
                <input type="text" name="model" value="{{$car -> model}}" require>
            </div>
            <div>
                <div class="container-label">
                    <label for="kW">
                        kW
                    </label>
                </div>
                <input type="number" name="kW" value="{{$car -> kW}}" require>
            </div>
            <div>
                <div class="container-label">
                    <label for="brand">
                        Brand
                    </label>
                </div>
                <select name="brand_id" id="brand_id" require>
                    @foreach ($brands as $brand)
                        <option value="{{$brand -> id}}" 
                            @if ($car -> brand -> id == $brand -> id)
                                selected
                            @endif
                        >
                            {{$brand -> name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <ul id="container-pilot">
                    @foreach ($pilots as $pilot)
                        <li>
                            <input type="checkbox" name="pilots_id[]" value="{{$pilot -> id}}" 
                                @foreach ($car -> pilots as $pilotActive)
                                    @if ($pilotActive -> id == $pilot -> id)
                                        checked
                                    @endif
                                @endforeach
                            >
                            <label for="pilots_id[]">{{$pilot -> firstname}} {{$pilot -> lastname}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="submit">
                <input type="submit" value="Edit Car">
            </div>
        </form>
    </main>
    
@endsection