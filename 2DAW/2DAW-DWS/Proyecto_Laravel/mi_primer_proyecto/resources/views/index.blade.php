@extends('layouts.app')

@section('content')

    <h2>Listado de frutas</h2>

    <ul>
        @foreach ($frutas as $fruta)
            <li>{{ $fruta['Nombre'] }} ({{ $fruta['Categoria'] }})</li>
        @endforeach
    </ul>
@endsection