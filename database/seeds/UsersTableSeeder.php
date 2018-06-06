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
            'password' => bcrypt('ih4DdtLkq6'),//ih4DdtLkq6, admin2107
            'cargo'=>'Financiero'
        ]);
        DB::table('users')->insert([
            'name' => 'Administracion Nombre',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('JkBR5dkTLQ'),//JkBR5dkTLQ, finan0721
            'cargo'=>'Administracion'
        ]);
        DB::table('users')->insert([
            'name' => 'Benjamin Monterrosa',
            'email' => 'programador@gmail.com',
            'password' => bcrypt('lW0SmtOGDs'),//lW0SmtOGDs,str_random(10), root12345
            'cargo'=>'Programador'
        ]);
    }
}
