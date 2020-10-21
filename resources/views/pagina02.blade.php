@extends('layouts.ejemploLayout')

@section('titulo', 'Página 02 del proyecto')

@section('barralateral')

    @parent
    <p>Esta parte está en la barra lateral</p>

@endsection


@section('contenido')

    <p>Esta en el body 2</p>

    <a href="{{url('/')}}" class="btn btn-xs btn-info pull-right">1</a>

@endsection