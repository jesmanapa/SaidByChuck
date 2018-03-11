@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-portada">
                    <div class="panel-body">
                        <div class="frase">@if($text) {{$text->text}} @else No hay frases que mostrar @endif</div>
                        @if($text)
                            <div class="pull-right firma">
                                <span>Chuck Norris</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12">
                    <a href="{{url()->previous()}}" class="btn btn-info pull-right">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
