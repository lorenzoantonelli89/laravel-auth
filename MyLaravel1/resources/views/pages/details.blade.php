@extends('layouts.main-layout')
@section('title')
    Dettagli Brand
@endsection
@section('content')

    <main>
        <h1>
            dettagli car
        </h1>
        <table>
            <tr>
                <th>
                    id
                </th>
                <th>
                    model
                </th>
                <th>
                    kw
                </th>
            </tr>
            <tr>
                <td>
                    {{$car -> id}}
                </td>
                <td>
                    {{$car -> model}}
                </td>
                <td>
                    {{$car -> kW}}
                </td>
            </tr>
        </table>
        <h1>
            brand
        </h1>
        <table>
            <tr>
                <th>
                    id
                </th>
                <th>
                    name
                </th>
                <th>
                    nationality
                </th>
            </tr>
            <tr>
                <td>
                    {{$car -> brand -> id}}
                </td>
                <td>
                    {{$car -> brand -> name}}
                </td>
                <td>
                    {{$car -> brand -> nationality}}
                </td>
            </tr>
        </table>
        @if (count($car -> pilots) > 0)
            <h1>
                Pilot
            </h1>
            <table>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        name
                    </th>
                    <th>
                        lastname
                    </th>
                    <th>
                        nationality
                    </th>
                    <th>
                        date of birth
                    </th>
                </tr>
                @foreach ($car -> pilots as $pilot)
                    <tr>
                        <td>
                            {{$pilot -> id}}
                        </td>
                        <td>
                            {{$pilot -> firstname}}
                        </td>
                        <td>
                            {{$pilot -> lastname}}
                        </td>
                        <td>
                            {{$pilot -> nationality}}
                        </td>
                        <td>
                            {{$pilot -> date_of_birth}}
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <h1>
                non ci sono piloti per questa vettura
            </h1>
        @endif
        
        <a id="backHome" href="{{route('home')}}">
            back to home
        </a>
    </main>
    
@endsection