<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Models\Attachment;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Carbon\Carbon;

class Category extends Model
{
    use AsSource, HasFactory, Filterable, Attachable;
    //
    //Carbon set vn locale.
    public function getViTime($time = '')
    {
        Carbon::setLocale('vi');
    }

    protected $fillable = [ 'name', 'slug', 'order', 'location', 'parent_id', 'img' ];

    public $timestamps = false;

    protected $allowedSorts = [
        'id', 'name', 'slug', 'id', 'price',
    ];

    protected $allowedFilters = [
        'name', 'slug',
    ];

    protected $casts = [
        'order' => 'string'
    ];

    
    //Relationship
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    //Relationship
    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
