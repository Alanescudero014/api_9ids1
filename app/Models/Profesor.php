<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = "profesores";
    protected $primaryKey = 'num_empleado';
    protected $fillable = ['num_empleado', 'nom_empleado', 'num_horas', 'division', 'id_puesto', 'ini_contrato', 'fin_contrato'];



    private static function generarNumeroEmpleado()
    {
        // Obtener el último número empleado registrado
        $ultimoNumEmpleado = Profesor::max('num_empleado');

        // Incrementar el número y asegurarse de tener 4 dígitos
        $nuevoNumEmpleado = sprintf('%04d', (intval($ultimoNumEmpleado) + 1));

        // Verificar si el nuevo número ya está ocupado
        while (Profesor::where('num_empleado', $nuevoNumEmpleado)->exists()) {
            $nuevoNumEmpleado = sprintf('%04d', (intval($nuevoNumEmpleado) + 1));
        }

        return $nuevoNumEmpleado;
    }
}
