<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class SalesHasProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales_has_products')->insert(
            [
                'id'          => 1,
                'products_id' => 1,
                'sales_id'    => 1,
//                'users_id'    => 1,
                'value'       => 5.0,
                'tax'         => 5.0,
            ],
            [
                'id'          => 2,
                'products_id' => 1,
                'sales_id'    => 1,
//                'users_id'    => 1,
                'value'       => 6.0,
                'tax'         => 5.0,
            ]
        );
    }
}
