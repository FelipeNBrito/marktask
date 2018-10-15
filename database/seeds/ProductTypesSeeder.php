<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert(
            [
                'id'          => 1,
                'description' => 'Leite',
                'tax'         => 5.0,
            ],
            [
                'id'          => 2,
                'description' => 'Arroz',
                'tax'         => 3.0,
            ]
        );
    }
}
