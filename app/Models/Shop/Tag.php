<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Models\Attachment;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Carbon\Carbon;

class Tag extends Model
{
    use AsSource, HasFactory, Filterable, Attachable;

    protected $fillable = [ 'name', 'slug', 'color', 'icon' ];

    public $timestamps = false;

    protected $allowedSorts = [
        'id', 'name', 'slug',
    ];

    protected $allowedFilters = [
        'name', 'slug',
    ];

    protected $casts = [
        //
    ];
}
