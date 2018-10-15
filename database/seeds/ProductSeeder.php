<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'name'             => 'Leite Integral',
                'product_types_id' => 1,
                'value'            => 6.0
            ],
            [
                'name'             => 'Leite Desnatado',
                'product_types_id' => 1,
                'value'            => 7.0
            ],
            [
                'name'             => 'Arroz Integral',
                'product_types_id' => 2,
                'value'            => 4.0
            ],
            [
                'name'             => 'Arroz Branco Tipo 1',
                'product_types_id' => 2,
                'value'            => 5.0
            ]
        );
    }
}
