<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('persona')->insertGetId([
            'nombres' => 'Alejandra',
            'apellidos' => 'Mujica Villa',
            'ci' => '1234567 LP'
        ]);
        DB::table('usuario')->insert([
        	'login' => 'ale',
        	'password' => bcrypt('123456'),
            'cargo' => 'Desarrollador de Tecnologías de la Información',
        	'tipo' => 'admin',
        	'active' => 1,
            'persona_id' => $id
        ]);
    }
}
