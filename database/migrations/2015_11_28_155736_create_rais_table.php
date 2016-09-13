<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('archivado', 50);
            $table->string('tipo_registro', 50);
            $table->date('fecha_registro');

            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                ->references('id')->on('usuario');

            $table->integer('consultor_id')->unsigned();
            $table->foreign('consultor_id')
                ->references('id')->on('consultor');

            $table->integer('unidad_industrial_id')->unsigned();
            $table->foreign('unidad_industrial_id')
                ->references('id')->on('unidad_industrial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rai');
    }
}
