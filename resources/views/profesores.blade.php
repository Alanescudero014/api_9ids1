@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Profesores</h3>
        </div>
        <div class="box-body">
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Número de Empleado</th>
                        <th>Nombre del Empleado</th>
                        <th>Número de Horas</th>
                        <th>División</th>
                        <th>Puesto</th>
                        <th>Inicio de Contrato</th>
                        <th>Fin de Contrato</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profesores as $profesor)
                        <tr>
                            <td>{{ str_pad($profesor['num_empleado'], 4, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $profesor['nom_empleado'] }}</td>
                            <td>{{ $profesor['num_horas'] }}</td>
                            <td>{{ $profesor['division'] }}</td>
                            <td>{{ $profesor['id_puesto'] }}</td>
                            <td>{{ $profesor['ini_contrato'] }}</td>
                            <td>{{ $profesor['fin_contrato'] }}</td>
                            <td>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <a href="{{ route('nueva.profesor', ['id' => sprintf('%04d', $profesor->num_empleado)]) }}" class="btn btn-success btn-sm rounded-0">
                                            <span class="far fa-edit"> Editar</span>
                                        </a>
                                        <a href="{{ route('eliminar.profesor', ['id' => sprintf('%04d', $profesor->num_empleado)]) }}" class="btn btn-danger btn-sm rounded-0">
                                            <span class="far fa-trash-alt"> Eliminar</span>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#table-data').DataTable({
                "scrollX": true
            });
        });
    </script>
@stop
