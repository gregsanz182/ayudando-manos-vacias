<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNinoCancerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nino_cancer', function(Blueprint $table) {
            $table->date('fecha_desde');
            $table->string('estado_actual')->nullable();
            $table->string('nombre_otro')->nullable();
            $table->integer('nino_id')->unsigned();
            $table->integer('cancer_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('nino_cancer', function(Blueprint $table) {
            $table->foreign('nino_id')->references('id')->on('nino');
            $table->foreign('cancer_id')->references('id')->on('cancer');
            $table->primary(["nino_id", "cancer_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nino_cancer');
    }
}
