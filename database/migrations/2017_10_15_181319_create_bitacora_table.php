<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->integer('usuario_admin_id')->unsigned()->nullable();
            $table->integer('usuario_representante_id')->unsigned()->nullable();
            $table->string('tabla');
            $table->string('accion');
            $table->timestamps();
        });

        Schema::table('bitacora', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}
