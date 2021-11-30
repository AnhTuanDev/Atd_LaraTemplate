<?php

namespace App\Traits;

use App\Models\Shop\Product;

trait ProductTrait
{

    //get product.
    public function getProduct($with = 'category', $status = 1, $col = 'id', $order = 'desc') {

        return $product = Product::with($with)
            ->where('status', $status)
            ->orderBy($col, $order)
            ->get();
    } 

    public function scopeSearch($query, $term) {

        $term = '%'.$term.'%';

        $query->where(function ($query) use ($term) {
            $query->where('status', 1)
                  ->orWhere('name', 'like', $term);
        });
    }

    /*
    function currency_format($number, $suffix = 'đ') {

        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }

    }
     */

    //format price
    public function getPriceAttribute($value)
    {
        //return ucfirst($value);
        return number_format($value, 0, '.', '.') . ' '. 'đ';
    }

    //format discount
    public function getDiscountAttribute($value)
    {
        //return ucfirst($value);
        return number_format($value, 0, '.', '.') . ' '. 'đ';
    }




}
