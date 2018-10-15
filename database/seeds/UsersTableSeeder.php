<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '123456';

        DB::table('users')->insert([
            [
                'name'          => 'Administrador',
                'email'         => 'admin@admin.com',
                'password'      => bcrypt($password),
                'categories_id' => 1,
            ],
            [
                'name'          => 'Atendente',
                'email'         => 'atendente@atendente.com',
                'password'      => bcrypt($password),
                'categories_id' => 2,
            ]
        ]);
    }
}
