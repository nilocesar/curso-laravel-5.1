<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
                    'name'          => 'EspecializaTi',
                    'email'         => 'contato@especializati.com.br',
                    'password'      => bcrypt('CursoLaravel5')
                ];
        DB::table('users')->insert($user);
    }
}
