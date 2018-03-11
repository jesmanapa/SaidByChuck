@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tus Frases <a href="{{url('/text/create')}}" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus"></i> Añadir</a></div>

                    <div class="panel-body">

                        <form action="{{url('/text')}}">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="filtro" placeholder="Introduzca texto" value="{{Session::get('filtro')}}">
                                </div>

                                <div class="col-sm-2">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                        </form>
                        <br><br>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Frase</th>
                                    <th>Mostrada</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($frases as $frase)
                                    <tr>
                                        <td>{{$frase->text}}</td>
                                        <td style="text-align: center">@if($frase->show) <i class="fas fa-check"> @else <i class="fas fa-times"> @endif</td>
                                        <td style="display: flex; justify-content: space-between;">
                                            <a href="{{url('/text/'.$frase->id)}}" title="Ver"  data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                                            <a href="{{url('/text/'.$frase->id.'/edit')}}" title="Editar"  data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{url('/text/'.$frase->id.'/borrar')}}" title="Borrar"  data-toggle="tooltip"><i class="fas fa-trash-alt" style="color: red"></i></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{ $frases->appends(['filtro' => Session::get('filtro')])->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
