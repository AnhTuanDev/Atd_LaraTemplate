<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Shop\Product;
use App\Models\Shop\Category;

class ProductFactory extends Factory
{

    protected $model = App\Models\Shop\Product::class;

    public function definition() 
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->words(3, true), 
            'category_id' => Category::factory()->random()->id,
            'description' => $this->faker->realText(200),
            'meta_description' => 'trillium fashion',
            'meta_keywords' => 'trillium fashion',
            'sku' => 'trillfa_product',
            'price' => $this->faker->randomFloat(2, 150000, 1500000),
            'quantity' => $this->faker->randomFloat(2, 15, 150),
            'discount' => null,
            'stock' => $this->faker->boolean,
            'status' => rand(0,1),
            //'cover_image' => null,
            //'photos' => null,
            'featured' => 0,
        ];
    }
}
