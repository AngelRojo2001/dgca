<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaebUi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caeb_ui', function (Blueprint $table) {
            $table->integer('unidad_industrial_id')->unsigned();
            $table->foreign('unidad_industrial_id')
                ->references('id')->on('unidad_industrial');

            $table->integer('caeb_id')->unsigned();
            $table->foreign('caeb_id')
                ->references('id')->on('caeb');

            $table->string('categoria', 5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('caeb_ui');
    }
}
