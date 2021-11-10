<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category_id', 'tag_id', 'description', 
        'meta_description', 'meta_keywords', 'sku', 'price', 'quantity',
        'stock', 'status', 'discount', 'cover_image', 'photos', 'featured'
    ];
}
