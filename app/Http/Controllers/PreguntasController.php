<?php

namespace App\Http\Controllers;
use App\Preguntas;

use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function devuelvePreguntas($tema){
        return Preguntas::where('tema', $tema)->inRandomOrder()->first();
    }

    public function cargaPregunta($tema, $marcador){
        return view('pregunta')->with('pregunta', Preguntas::where('tema', $tema)->inRandomOrder()->limit(1)->get())
        ->with('tema', $tema)
        ->with('marcador', \Crypt::decrypt($marcador));
    }
}
