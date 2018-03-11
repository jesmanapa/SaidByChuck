<?php

namespace App\Http\Controllers;

use App\Text;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class TextControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $frases = Auth::user()->frases()->where('text', 'LIKE', '%'.$request['filtro'].'%')->paginate(10);

        Session::put('filtro', $request['filtro']);

        return view('text.texts', compact('frases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('text.crear_text');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datos = [
            'user_id' => Auth::user()->id,
            'text' => $request['text']
        ];

        Text::create($datos);

        return redirect(url('/text'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function show(Text $text)
    {
        return view('text.ver_text', compact('text'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function edit(Text $text)
    {
        return view('text.editar_text', compact('text'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Text $text)
    {
        $text->update(['text' => $request['text']]);

        return redirect(url('/text'));
    }

    /**
     * Confirma que deseas realizar la acción de borrar una frase
     */
    public function confirmacionBorrar(Request $request, Text $text){

        return view('text.confirmaBorrado', compact('text'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function destroy(Text $text)
    {
        $text->delete();

        return redirect(url('/text'));
    }
}
