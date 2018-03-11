<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;
use App\User;
use Hash;


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

    /**
     * Método para crear una frase por medio de la API. Este mñetodo está protegido por el middleware ComprobarUsuario que
     * comprueba que el usuario y clave proporcionados son correctos.
     */
    public function crearFrase(Request $request){

        $usuario = User::where('username', $request['username'])->first();

        $datos = [
            'user_id' => $usuario->id,
            'text' => $request['text']
        ];

        $text = Text::create($datos);

        return response()->json([
            'status' => 'La frase se ha creado correctamente',
            'text' => $text->text
        ]);
    }
}
