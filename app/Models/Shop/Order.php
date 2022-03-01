<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Database\Eloquent\Model;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use AsSource, HasFactory, Filterable, HasTrixRichText;
    //protected $table = 'colors';
    protected $fillable = [ 
        'cart_id', 
        'product_id', 
        'product_name', 
        'product_slug', 
        'subtotal',
        'options',
        'weight',
        'price',
        'qty', 
    ];

    //public $timestamps = false;

    protected $allowedSorts = [
        'product_id', 'product_name', 'price'
    ];

    protected $allowedFilters = [
        'product_id', 'product_name', 'price'
    ];

    protected $casts = [
        'options' => 'array',
    ];
}
