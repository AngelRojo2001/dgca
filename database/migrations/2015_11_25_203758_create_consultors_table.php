<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('renca', 5);
            $table->boolean('active');

            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')
                ->references('id')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consultor');
    }
}
