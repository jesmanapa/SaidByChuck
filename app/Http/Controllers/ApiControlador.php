<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;

class ApiControlador extends Controller
{
    /**
     * Método que devuelve una frase aleatoria
     */
    public function fraseAleatoria(){

        //Obtenemos una frase aleatoria
        $text = Text::inRandomOrder()->first();

        return response()->json([
            'frase' => utf8_encode($text->text)
        ]);
    }
}
