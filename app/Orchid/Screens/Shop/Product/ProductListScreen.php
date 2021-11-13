<?php

namespace App\Orchid\Screens\Shop\Product;

use Orchid\Screen\Screen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Orchid\Support\Facades\Toast;
use App\Orchid\Fields\Tag;
use Orchid\Screen\Actions\Link;
//use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Table;
use Orchid\Support\Facades\Layout;

use App\Models\Shop\Product;
//use App\Orchid\Layouts\Post\PostListLayout;

class ProductListScreen extends Screen
{
    public $name = 'Danh Sách Sản Phẩm';

    public function query(): array
    {
        return [];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Thêm Sản Phẩm')
                ->icon('plus')
                ->route('admin.product.edit')
        ];
    }

    public function layout(): array
    {
        return [];
    }
}
