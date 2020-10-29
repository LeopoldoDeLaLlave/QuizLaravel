@extends('layouts.ejemploLayout')

@section('titulo', 'Página 01 del proyecto')

@section('barralateral')

    <p>Esta parte está en la barra lateral</p>

@endsection


@section('contenido')

    <p>Esta en el body</p>
    
    <a href="{{url('pregunta', ['Historia', Crypt::encrypt(0)])}}" class="btn btn-xs btn-info pull-right">historia</a>

    <a href="{{url('pregunta', ['Economia',Crypt::encrypt(0)])}}" class="btn btn-xs btn-info pull-right">Economía</a>
    <a href="{{url('pregunta', ['Ingles',Crypt::encrypt(0)])}}" class="btn btn-xs btn-info pull-right">Inglés</a>
    <a href="{{url('api/preguntas', ['Historia', 0])}}" class="btn btn-xs btn-info pull-right">Historia pero JSon</a>

@endsection