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
            'password' => bcrypt('finan0721'),//ih4DdtLkq6
            'cargo'=>'Financiero'
        ]);
        DB::table('users')->insert([
            'name' => 'Administracion Nombre',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('admin2107'),//JkBR5dkTLQ
            'cargo'=>'Administracion'
        ]);
        DB::table('users')->insert([
            'name' => 'Benjamin Monterrosa',
            'email' => 'programador@gmail.com',
            'password' => bcrypt('root12345'),//lW0SmtOGDs,str_random(10)
            'cargo'=>'Programador'
        ]);
    }
}
