<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro__academicos', function (Blueprint $table) {
            $table->integer('id_estudiante');
            $table->string('rut');
            $table->string('nombre');
            $table->string('A_paterno');
            $table->string('A_materno');
            $table->date('fecha_inscripcion');
            $table->decimal('promedio');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro__academicos');
    }
}
