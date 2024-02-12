<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->string('num_empleado')->primary()->default('0001');
            $table->string('nom_empleado');
            $table->integer('num_horas');
            $table->string('division');
            $table->unsignedBigInteger('id_puesto'); // Cambiado a unsignedBigInteger
            $table->date('ini_contrato');
            $table->date('fin_contrato');
            $table->timestamps();

            // Asegúrate de que num_empleado sea único
            $table->unique('num_empleado');

            // Agregar clave foránea para la columna id_puesto
            $table->foreign('id_puesto')->references('id')->on('puestos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
