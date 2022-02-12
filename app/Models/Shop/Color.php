<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Color extends Model
{
    use AsSource, HasFactory, Filterable;

    //protected $table = 'colors';

    protected $fillable = [ 'name', 'slug', 'value', 'material' ];

    public $timestamps = false;

    protected $allowedSorts = [
        'id', 'name', 'value'
    ];

    protected $allowedFilters = [
        'name', 'value',
    ];
}
