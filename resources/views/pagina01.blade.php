@extends('layouts.ejemploLayout')

@section('titulo', 'Página 01 del proyecto')

@section('barralateral')

    <p>Esta parte está en la barra lateral</p>

@endsection


@section('contenido')

    <p>Esta en el body</p>
    <a href="{{url('/dos')}}" class="btn btn-xs btn-info pull-right">2</a>

@endsection