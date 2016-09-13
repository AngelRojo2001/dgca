<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_legal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 50)->nullable();

            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')
                ->references('id')->on('persona')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::drop('r_legal');
    }
}
