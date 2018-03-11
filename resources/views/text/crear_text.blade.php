@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Frase</div>
                    <div class="panel-body">
                        <form action="{{url('/text')}}" method="POST">
                            {{csrf_field()}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="text">Frase</label>
                                    <textarea class="form-control" id="text" name="text" rows="3"></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success pull-left">Guardar</button>
                                    <a href="{{url()->previous()}}" class="btn btn-info pull-right">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection