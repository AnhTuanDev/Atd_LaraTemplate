<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Orchid\Attachment\Models\Attachment;
//use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Attribute extends Model
{
    use AsSource, HasFactory, Filterable;

    protected $fillable = [ 'name', 'slug' ];

    public $timestamps = false;

    protected $allowedSorts = [
        'id', 'name', 'slug'
    ];

    protected $allowedFilters = [
        'name', 'slug',
    ];

    //protected $casts = [
    //    'order' => 'string'
    //];

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
