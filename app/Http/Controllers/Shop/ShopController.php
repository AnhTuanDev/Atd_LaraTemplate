<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shop\Product;

class ShopController extends Controller
{

    public function index(Product $product) {
        return view('shop.index', [
            //$product->featured(),
            //'products' => Product::with('category')->where('status', 1)->get()->take(4),
            'latest' => $product->getProduct()->take(4),
        ]);
    }

    public function category() {
        return "category";
    }

}
