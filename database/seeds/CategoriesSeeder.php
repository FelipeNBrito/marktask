<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id'          => 1,
                'name'        => 'Administrador',
                'description' => 'Administrador do sistema, pode operar o sistema e gerenciar outros usuários',
            ],
            [
                'id'          => 2,
                'name'        => 'Atendente',
                'description' => 'Pode fazer as operações do sistema, mas não pode gerenciar os usuários.',
            ]
        ]);
    }
}
