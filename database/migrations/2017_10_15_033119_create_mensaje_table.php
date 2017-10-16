<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje', function(Blueprint $table) {
            $table->increments('id');
            $table->string('mensaje', 300);
            $table->datetime('fecha');
            $table->string('correo_remitente');
            $table->string('nombre_apellido_remitente');
            $table->string('telefono_remitente')->nullable();
            $table->integer('nino_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('mensaje', function(Blueprint $table) {
            $table->foreign('nino_id')->references('id')->on('nino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mensaje');
    }
}
