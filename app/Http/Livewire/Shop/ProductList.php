<?php

namespace App\Http\Livewire\Shop;

use Livewire\WithPagination;

use Livewire\Component;

use App\Models\Shop\Category;

use App\Models\Shop\Product;

class ProductList extends Component
{
    use WithPagination;

    //public $term;

    public $category, $pageTitle, $priceBetween = [], $perPage = 10, $orderColumnLabel =  'Ngày Tháng', $orderColumnValue =  'created_at';

    public $sortBy = 'desc', $categoryChecked = [], $sortLabel = 'Giảm dần';

    //protected $queryString = ['term' => ['except' => '']];

    public $perPageData = [
        '5', '10', '20', '30', '50', '100', '150', '200',
    ];

    public $orderColumnData = [

        [ 'label' => 'Giá', 'value' => 'price'],

        [ 'label' => 'Tên', 'value' => 'name'],

        [ 'label' => 'Ngày Tháng', 'value' => 'created_at'],

    ];

    public $sortByData = [

        [ 'label' => 'Giảm dần', 'value' => 'desc' ],

        [ 'label' => 'Tăng dần', 'value' => 'asc' ],

    ];

    public $priceData = [

        [ 'value' => [ 'price_min' => 150000, 'price_max' => 350000], 'label'   => '150.000 - 350.000' ],

        [ 'value' => [ 'price_min' => 350000, 'price_max' => 500000], 'label'   => '350.000 - 500.000' ],

        [ 'value' => [ 'price_min' => 500000, 'price_max' => 1000000], 'label'  => '500.000 - 1.000.000' ],

        [ 'value' => [ 'price_min' => 1000000, 'price_max' => 1500000], 'label' => '1.000.000 - 1.500.000' ],

        [ 'value' => [ 'price_min' => 1500000, 'price_max' => 2000000], 'label' => '1.500.000 - 2.000.000' ],

        [ 'value' => [ 'price_min' => 2000000, 'price_max' => 100000000], 'label' => '2.000.000 - Trở lên' ],

    ];

    public function mount() {


        if($this->category->parent_id == null) {

            $cateChild = $this->category->child;

            foreach($cateChild as $key => $item) {

                $this->categoryChecked[$key] = $item->id;

            }

        }else{

            $this->categoryChecked[] = $this->category->id;

        }

        $this->pageTitle = $this->category->name ?? $this->pageTitle = 'Tất cả sản phẩm';

    }

    public function resetCategoryFilter() {

        $this->reset([ 'categoryChecked', 'perPage', 'pageTitle', 'priceBetween' ]);

        $this->perPage = 15;

        $this->pageTitle = 'Danh Sản Phẩm';
    }

    public function setCategoryChecked($cate) {

        $this->reset([ 'categoryChecked', 'priceBetween' ]);

        $this->categoryChecked[] = $cate['id'];

        $this->pageTitle = $cate['name'];

    }

    public function setSortBy($label, $sort) {

        $this->reset(['sortBy', 'sortLabel']);

        $this->sortBy = $sort;

        $this->sortLabel = $label;
    }

    public function setPerPage($per) {

        $this->reset('perPage');

        $this->resetPage();

        $this->perPage = $per;
    }

    public function setPriceChecked($price_min, $price_max) {

        $this->priceBetween[0] = $price_min;

        $this->priceBetween[1] = $price_max;

    }

    public function setOerderColumnChecked($label, $value) {

        $this->reset(['orderColumnValue', 'orderColumnLabel']);

        $this->orderColumnLabel = $label;

        $this->orderColumnValue = $value;
    }

    public function render()
    {

        $data = Product::with('category')->when($this->orderColumnValue, function($query) {

            return $query->where('status', 1);

        })->when($this->categoryChecked, function($query) {

            return $query->whereIn('category_id', $this->categoryChecked);

        })->when($this->priceBetween, function($p) {

           return $p->whereBetween('price', $this->priceBetween);

        });

        return view('livewire.shop.product-list', [

            'products' => $data->where('status', 1)->orderBy($this->orderColumnValue, $this->sortBy)->paginate($this->perPage),
                
            'parentCate' => Category::whereNull('parent_id')->with('child')->orderBy('order', 'asc')->get(),

            'title' => $this->pageTitle,

        ]);
    }


}
