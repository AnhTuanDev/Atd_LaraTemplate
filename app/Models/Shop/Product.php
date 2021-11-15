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
        'id', 'name', 'slug', 'category_id', 'tag_id', 'description', 
        'meta_description', 'meta_keywords', 'sku', 'price', 'quantity',
        'stock', 'status', 'discount', 'cover_image', 'photos', 'featured'
    ];

    protected $allowedSorts = [
        'name', 'slug', 'id', 'price',
    ];

    protected $allowedFilters = [
        'name', 'slug', 'description', 'status', 'price',
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
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
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


