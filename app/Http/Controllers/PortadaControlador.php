<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;

class PortadaControlador extends Controller
{

    public function portada(Request $request){

        //Obtenemos una frase aleatoria
        $text = Text::inRandomOrder()->first();

        //Si ha encontrado una frase la actualizamos como mostrada
        if($text) {
            $text->update(['show' => 1]);
        }

        return view('portada.portada', compact('text'));
    }
}
