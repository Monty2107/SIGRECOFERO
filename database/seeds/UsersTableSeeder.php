<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Financiera Nombre',
            'email' => 'financiero@gmail.com',
            'password' => bcrypt('finan0721'),
            'cargo'=>'Financiero'
        ]);
        DB::table('users')->insert([
            'name' => 'Administracion Nombre',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('admin2107'),
            'cargo'=>'Administracion'
        ]);
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'programador@gmail.com',
            'password' => bcrypt('root12345'),
            'cargo'=>'Programador'
        ]);
    }
}
