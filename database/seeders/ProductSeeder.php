<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Shop\Product;

class ProductSeeder extends Seeder
{


    public function run()
    {
        Product::factory(20)->create();
    }
}
