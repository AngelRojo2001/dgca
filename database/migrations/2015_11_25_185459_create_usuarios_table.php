<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login')->unique();
            $table->string('password', 60);
            $table->string('cargo');
            $table->enum('tipo', ['admin', 'user']);
            $table->boolean('active');
            $table->rememberToken();

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
        Schema::drop('usuario');
    }
}
