<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id(); //id autoincremental en este caso.

            $table->string('Nombre');
            $table->string('PrimerApellido');
            $table->string('SegundoApellido');
            $table->string('Correo');
            $table->string('Foto');


            $table->timestamps(); //tiempo en que genera un registro
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
 