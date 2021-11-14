<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //$this->call([ //CategorySeeder::class, ProductSeeder::class, ]);
        //$this->call(ProductSeeder::class);
        $this->call(TagSeeder::class);
    }
}
