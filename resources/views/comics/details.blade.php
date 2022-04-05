@extends('layouts.app')
@section('content-body')
<div class="container">
    <div class="bg-white rounded mt-5 p-4">
        <h1 class="my-3 text-center text-secondary font-weight-bold">Detalles del comic</h1>
        <div class="col-12 my-3 text-center">
            <img src="{{ $comic2['thumbnail']['path'] }}.{{ $comic2['thumbnail']['extension'] }}" alt="{{ $comic2['title'] }}" style="height: 300px">
            <div class="mt-3">
               <h2>{{ $comic2['title'] }}</h2> 
            </div>
        </div>
        <div class="table-responsive my-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Volumen</th>
                        <th>Fecha de lanzamiento</th>
                        <th>Páginas</th>
                        <th>Descripción</th>
                        <th>Sucursales donde se encuentra</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>{{ $comic2['id'] }}</td>
                            <td>@if ($comic2['issueNumber'] != 0)
                                {{ $comic2['issueNumber'] }}
                            @else
                                Sin volumen
                            @endif</td>
                            <td>{{ $comic2['dates'][0]['date'] }}</td>
                            <td>{{ $comic2['pageCount'] }}</td>
                            <td>
                                @if ( $comic2['description'] )
                                    {!! $comic2['description'] !!}
                                @else
                                    Descripción no disponible
                                @endif
                            </td>
                            <td>
                                <ul>
                                    @foreach ($sucursal as $suc)
                                        @if ($suc->sucursal->name)
                                            <li>{!! $suc->sucursal->name !!}</li>
                                        @else
                                            No hay sucursales disponibles
                                        @endif
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </thead>
            </table>
        </div>
        <div class="row">
            <h2 class="my-3 col-12 text-center text-secondary font-weight-bold">Personajes en el comic</h2>
            @if (count($comic2['characters']['items']) > 0)
                <ul>
                    @foreach ($comic2['characters']['items'] as $comic)
                        <li>{{ $comic['name'] }}</li>
                    @endforeach
                </ul>
            @else
                <h4>No hay personajes disponibles</h4>
            @endif
        </div>
    </div>
</div>
@endsection