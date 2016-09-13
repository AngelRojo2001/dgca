<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadIndustrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_industrial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_rai', 12);
            $table->string('nombre_ui', 150);
            $table->string('razon_social', 150);
            $table->string('direccion_ui');
            $table->integer('distrito_ui')->nullable();
            $table->string('telefono')->nullable();
            $table->string('coord_x')->nullable();
            $table->string('coord_y')->nullable();
            $table->string('categoria', 5);
            $table->string('fase', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('unidad_industrial');
    }
}
