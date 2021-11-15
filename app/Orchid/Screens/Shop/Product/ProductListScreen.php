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
use App\Orchid\Layouts\Shop\Product\ProductListLayout;
use App\Orchid\Layouts\Shop\Product\ProductDeleteModalLayout;

class ProductListScreen extends Screen
{
    public $name = 'Danh Sách Sản Phẩm';

    public function query(): array
    {
        return [
            'products' => Product::filters()
                ->whereStatus(1)
                ->defaultSort('id', 'desc')->paginate(10),
        ];
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
        return [

            ProductListLayout::class,

            Layout::modal('deleteModal', [
                ProductDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ];
    }//End layout

    public function delete(Product $product)
    {
        $product->delete();

        Toast::info('Xóa thành công: ' . $product['name']);

        return redirect()->route('admin.product.list');
    }
}
