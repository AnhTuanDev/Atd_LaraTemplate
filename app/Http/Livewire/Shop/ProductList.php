<?php

namespace App\Http\Livewire\Shop;

use Livewire\WithPagination;

use Livewire\Component;

use App\Models\Shop\Category;

use App\Models\Shop\Product;

class ProductList extends Component
{
    use WithPagination;

    public $term;

    public $category;

    public $pageTitle;

    public $perPage = 10;

    public $sortBy = 'desc';

    public $categoryChecked = [];

    public $sortLabel = 'Giảm dần';

    protected $queryString = ['term' => ['except' => '']];

    public $perPageData = [
        '2', '10', '20', '30', '50', '100',
    ];

    public $sortByData = [
        [
            'label' => 'Giảm dần',
            'value' => 'desc'
        ],
        [
            'label' => 'Tăng dần',
            'value' => 'asc'
        ],
    ];


    public function mount() {

        $this->reset(['term']);

        if($this->category->parent_id == null) {

            $cateChild = $this->category->child;

            foreach($cateChild as $key => $item) {

                $this->categoryChecked[$key] = $item->id;

            }

        }else{

            $this->categoryChecked[] = $this->category->id;

        }

        $this->pageTitle = $this->category->name;

    }

    public function resetCategoryFilter() {

        $this->reset([ 'categoryChecked', 'perPage', 'pageTitle', 'term' ]);

        $this->perPage = 15;

        $this->pageTitle = 'Danh Sản Phẩm';
    }

    public function setCategoryChecked($cate) {

        $this->reset('categoryChecked');

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

    public function render()
    {

        $search = '%'.$this->term.'%';

        $data = Product::when($this->term, function($query) {
            return $query->where('name', 'like', '%'.$this->term.'%');
        });

       $data = Product::when($this->categoryChecked, function($query) {

            return $query->where('status', 1)->whereIn('category_id', $this->categoryChecked);

       });//->orderBy('id', $this->sortBy)->paginate($this->perPage);

        return view('livewire.shop.product-list', [

            'products' => $data->paginate(3),
                
            'parentCate' => Category::whereNull('parent_id')->with('child')->orderBy('order', 'asc')->get(),

            'title' => $this->pageTitle,

        ]);
    }


}
