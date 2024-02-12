    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        @if ($profesor)
            <h1>Editando Profesor</h1>
        @else
            <h1>Creando Nuevo Profesor</h1>
        @endif

    @stop

    @section('content')
        <p>Welcome to this beautiful admin panel.</p>

        <div class="box">
            <div class="box-body">
                <form action="{{ route('guardar.profesor') }}" method="POST">
                    @csrf
                <!-- <div class="form-group">
                        <label for="num_empleado">Número de empleado:</label>-->
                        <input type="hidden" name="num_empleado" value="{{ $profesor ? str_pad($profesor->num_empleado, 4, '0', STR_PAD_LEFT) : '' }}" readonly>
                    <div class="form-group">
                        <label for="nom_empleado" class="">Nombre:</label>
                        <input type="text" name="nom_empleado" class="form-control"
                            value="{{ $profesor ? $profesor->nom_empleado : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="num_horas">Número de horas (semanales):</label>
                        <input type="number" name="num_horas" value="{{ $profesor ? $profesor->num_horas : '' }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="division">División:</label>
                        <select name="division" class="form-control" required>
                            <option value="">Selecciona una división</option>
                            @foreach ($divisiones as $division)
                                <option value="{{ $division->codigo }}"
                                    {{ isset($profesor) && $profesor->division == $division->codigo ? 'selected' : '' }}>
                                    {{ $division->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="puesto">Puesto:</label>
                        <select name="puesto" class="form-control" required>
                            <option value="">Selecciona el puesto</option>
                            @foreach ($puestos as $puesto)
                                <option value="{{ $puesto->id }}" {{ isset($profesor) && $profesor->id_puesto == $puesto->id ? 'selected' : '' }}>
                                    {{ $puesto->nombre }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ini_contrato">Inicio de contrato:</label>
                        <input type="date" name="ini_contrato" value="{{ $profesor ? $profesor->ini_contrato : '' }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fin_contrato">Fin de contrato:</label>
                        <input type="date" name="fin_contrato" value="{{ $profesor ? $profesor->fin_contrato : '' }}"
                            class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

    @stop
