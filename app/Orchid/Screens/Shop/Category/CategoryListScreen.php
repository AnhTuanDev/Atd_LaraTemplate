<?php

namespace App\Orchid\Screens\Shop\Category;

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

use App\Models\Shop\Category;
use App\Orchid\Layouts\Shop\Category\CategoryListLayout;
use App\Orchid\Layouts\Shop\Category\CategoryDeleteModalLayout;

class CategoryListScreen extends Screen
{

    public $name = 'Danh Sách Danh Mục';

    public function query(): array
    {

        return [
            'categories' => Category::filters()->defaultSort('order', 'asc')->paginate(10),
        ];

    }

    public function commandBar(): array
    {

        return [
            Link::make('Thêm Danh Mục')
                ->icon('plus')
                ->route('admin.category.edit')
        ];

    }

    public function layout(): array
    {

        return [

            CategoryListLayout::class,

            Layout::modal('deleteModal', [
                CategoryDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ];

    }

    public function delete(Category $category)
    {
        $category->delete();

        Toast::info('Xóa thành công: ' . $category['name']);

        return redirect()->route('admin.category.list');
    }

}
