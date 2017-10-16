<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nino', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('genero');
            $table->date('fecha_nacimiento');
            $table->string('situacion_actual');
            $table->string('relacion_repr');
            $table->string('identificacion')->nullable();
            $table->integer('representante_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('nino', function(Blueprint $table) {
            $table->foreign('representante_id')->references('id')->on('representante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nino');
    }
}
