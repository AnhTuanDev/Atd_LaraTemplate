<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shop\Product;
use App\Models\Shop\Category;

class ShopController extends Controller
{

    public function index(Product $product) {

        return view('shop.index', [

            'productFeatured' => $product->getProduct()->where('featured', 1)->take(4),

            'productDiscount' => $product->getProduct()->where('discount', '>', 0)->take(4),

            'productLatest' => $product->getProduct()->take(4),

        ]);
    }

    public function shopCategory(Category $category, Product $product) {


        return view('shop.category', [
            'category' => $category,
        ]);

    }

    public function shopTag() {
        return "Tag List Product";
    }

    public function productShow(Product $product) {
        dd($product);
    }

}
