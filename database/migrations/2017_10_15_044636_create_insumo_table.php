<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo', function(Blueprint $table) {
            $table->string('nombre');
            $table->string('fecha');
            $table->string('estado_requerimiento')->nullable();
            $table->string('motivo')->nullable();
            $table->integer('nino_id')->unsigned();
            $table->integer('categoria_insumo_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('insumo', function(Blueprint $table) {
            $table->foreign('nino_id')->references('id')->on('nino');
            $table->foreign('categoria_insumo_id')->references('id')->on('categoria_insumo');
            $table->primary(["nino_id", "categoria_insumo_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('insumo');
    }
}
