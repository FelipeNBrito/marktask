<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategoriesSeeder::class);
         $this->call(UsersTableSeeder::class);
//         $this->call(ProductTypesSeeder::class);
//         $this->call(ProductSeeder::class);
//         $this->call(SalesSeeder::class);
//         $this->call(SalesHasProductsSeeder::class);
    }
}
