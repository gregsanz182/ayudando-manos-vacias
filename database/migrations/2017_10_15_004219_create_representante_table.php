<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representante', function(Blueprint $table) {
            $table->string('ci', 20);
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('direccion');
            $table->integer('localidad_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('representante', function(Blueprint $table) {
            $table->primary('ci');
            $table->foreign('localidad_id')->references('id')->on('localidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('representante');
    }
}
