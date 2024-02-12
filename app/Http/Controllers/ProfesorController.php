<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Profesor;
use App\Models\Puesto;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{

    public function view(Request $request)
{
    $divisiones = Division::all();
    $puestos = Puesto::all();
    $profesor = null;

    if ($request->has('id')) {
        $num_empleado = $request->id; // Cambiado de num_empleado a id
        //echo 'Tengo idNum_empleado: ' . $num_empleado;

        $profesor = Profesor::where('num_empleado', $num_empleado)->first();
        // Verificar si el profesor existe y formatear el número de empleado
        if ($profesor) {
            $profesor->num_empleado = str_pad($profesor->num_empleado, 4, '0', STR_PAD_LEFT);
        }
    } else {
        $profesor = new Profesor();
        $profesor->num_empleado = $this->generarNumeroEmpleado();
    }

    return view('profesor', compact('divisiones','profesor','puestos'));
}









    public function store(Request $req)
    {
        // Validación de datos aquí si es necesario...

        $profesor = Profesor::where('num_empleado', $req->num_empleado)->first();

        if (!$profesor) {
            $profesor = new Profesor();
        }

        $profesor->num_empleado = $req->num_empleado;
        $profesor->nom_empleado = $req->nom_empleado;
        $profesor->num_horas = $req->num_horas;
        $profesor->division = $req->division;

        $profesor->id_puesto = $req->input('puesto');

        $profesor->ini_contrato = $req->ini_contrato;
        $profesor->fin_contrato = $req->fin_contrato;

        $profesor->save();

        return redirect()->route('profesores');
    }

    private function generarNumeroEmpleado()
    {
        // Obtener el último número de empleado en la base de datos
        $ultimoNumeroEmpleado = Profesor::max('num_empleado');

        // Incrementar el número de empleado y llenar con ceros a la izquierda
        $nuevoNumeroEmpleado = sprintf('%04d', (int)$ultimoNumeroEmpleado + 1);

        // Convertir a cadena para preservar los ceros a la izquierda
        $nuevoNumeroEmpleado = (string)$nuevoNumeroEmpleado;

        return $nuevoNumeroEmpleado;
    }




    public function index()
    {
        $profesores = Profesor::all();
        $divisiones = Division::all();
        $puestos = Puesto::all();

        return view('profesores', compact('divisiones', 'profesores'));
    }

    public function delete(Request $req)
    {
        $profesor = Profesor::find($req->id);
        $profesor->delete();

        return redirect()->to('/profesores');
    }
}
