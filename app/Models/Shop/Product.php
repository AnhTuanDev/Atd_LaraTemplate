<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

use App\Traits\ProductTrait;
use Carbon\Carbon;

class Product extends Model
{

    use AsSource, HasFactory, Filterable, Attachable, ProductTrait;

    protected $fillable = [
        'id', 'name', 'slug', 'category_id', 'tag_id', 'description', 
        'meta_description', 'meta_keywords', 'sku', 'price', 'quantity',
        'stock', 'status', 'discount', 'cover_image', 'photos', 'featured', 'home_banner',
    ];

    protected $allowedSorts = [
        'name', 'slug', 'id', 'price',
    ];

    protected $allowedFilters = [
        'category_id', 'name', 'slug', 'description', 'status', 'price', 'home_banner',
    ];

    protected $casts = [
        'photos' => 'array',
        'price' => 'string',
        'discount' => 'string',
    ];

    //Carbon set vn locale.
    public function getViTime($time = '')
    {
        Carbon::setLocale('vi');
    }
    
    //Relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }

    public function cover()
    {
        return $this->hasOne(Attachment::class, 'id', 'cover_image')->withDefault();
    }

    public function images()
    {
        return $this->hasOne(Attachment::class, 'id', 'photos')->withDefault();
    }

}


