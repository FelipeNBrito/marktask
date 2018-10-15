<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert(
            [
                'id'       => 1,
                'code'     => 00000001,
                'users_id' => 1,
            ],
            [
                'id'       => 2,
                'code'     => 00000002,
                'users_id' => 1,
            ]
        );
    }
}
