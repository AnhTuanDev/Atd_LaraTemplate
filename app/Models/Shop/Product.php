<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Models\Attachment;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Carbon\Carbon;

class Product extends Model
{
    use AsSource, HasFactory, Filterable, Attachable;

    protected $fillable = [
        'name', 'slug', 'category_id', 'tag_id', 'description', 
        'meta_description', 'meta_keywords', 'sku', 'price', 'quantity',
        'stock', 'status', 'discount', 'cover_image', 'photos', 'featured'
    ];

    protected $allowedSorts = [
        'name', 'slug', 'id'
    ];

    protected $allowedFilters = [
        'name', 'slug', 'description', 'status',
    ];
}
