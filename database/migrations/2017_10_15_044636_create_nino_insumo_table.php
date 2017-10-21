<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNinoInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nino_insumo', function(Blueprint $table) {
            $table->integer('id');
            $table->string('nombre');
            $table->string('fecha');
            $table->string('estado_requerimiento')->nullable();
            $table->string('motivo')->nullable();
            $table->integer('nino_id')->unsigned();
            $table->integer('categoria_insumo_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('nino_insumo', function(Blueprint $table) {
            $table->foreign('nino_id')->references('id')->on('nino');
            $table->foreign('categoria_insumo_id')->references('id')->on('categoria_insumo');
            $table->primary(["id", "nino_id", "categoria_insumo_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nino_insumo');
    }
}
