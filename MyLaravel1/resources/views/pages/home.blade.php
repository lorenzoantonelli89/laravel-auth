@extends('layouts.main-layout')
@section('title')
    Home
@endsection
@section('content')

    <main>
        <h1>
            lista car
        </h1>
        <a id="newCar" href="{{route('newCar')}}">
            add new car
        </a>
        <table>
            <tr>
                <th>
                    id
                </th>
                <th>
                    name
                </th>
                <th>
                    kw
                </th>
                <th>
                    edit
                </th>
                <th>
                    delete
                </th>
            </tr>
            @foreach ($cars as $car)
                <tr>
                    <td>
                        <a href="{{route('details', $car -> id)}}">
                            {{$car -> id}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('details', $car -> id)}}">
                            {{$car -> model}}
                        </a>
                    </td>
                    <td>
                        {{$car -> kW}}
                    </td>
                    <td>
                        <a href="{{route('edit', $car -> id)}}">
                            &#9998;
                        </a>
                    </td>
                    <td>
                        <a href="{{route('destroy', $car -> id)}}">
                            &#10060;
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
    
@endsection