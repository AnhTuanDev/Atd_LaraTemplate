<?php

namespace App\Observers\Shop;

use App\Models\Shop\Product;

class ProductObsever
{
    public function deleting(Product $product)
    {
        //$product->cover()->delete();

        $product->attachment->each->delete();
    }
}
