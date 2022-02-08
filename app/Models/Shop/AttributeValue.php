<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class AttributeValue extends Model
{
    use AsSource, HasFactory, Filterable;

    protected $table = 'attribute_values';

    protected $fillable = [ 'attribute_id', 'product_id', 'key', 'value' ];

    public $timestamps = false;

    protected $allowedSorts = [
        'id', 'key', 'value'
    ];

    protected $allowedFilters = [
        'key', 'value',
    ];

    //protected $casts = [
    //    'order' => 'string'
    //];

    public function attribute()
    {
        return $this->hasMany(Attribute::class, 'attribute_id');
    }

}
