<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLocalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidad', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->integer('localidad_id')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('localidad', function(Blueprint $table) {
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
        //
    }
}
