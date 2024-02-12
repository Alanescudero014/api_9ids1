@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

        <div class="box">
            <div class="box-body">
                <form action="{{route('guardar.puesto')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$puesto->id}}">
                    <div class="form-group">
                        <label for="codigo" class="">Código:</label>
                        <input type="text" name="codigo" class="form-control" value="{{$puesto->codigo}}" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <input type="text" name="nombre" class="form-control" value="{{$puesto->nombre}}"  required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

@stop
