<?php

namespace App\Orchid\Layouts\Shop\Category;

use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Field;

use App\Models\Shop\Category;

class CategoryEditLayout extends Rows
{

    protected function fields(): array
    {
        return [

            Select::make('category.parent_id')
                ->fromQuery(Category::where('parent_id', null)->orderBy('name', 'asc'), 'name')
                ->empty('Chọn danh mục')
                ->title('Danh Mục Cha'),

            Input::make('name')
                ->title('Tên Danh Mục')
                ->placeholder('Nhập tên danh mục'),

            Input::make('category.order')
                ->title('Thứ Tự')
                ->placeholder('Nhập thứ tự')
                ->help('1 - 1.1 - 1.2 - 2 - 2.1 v.v...'),

            RadioButtons::make('category.location')
                ->options([
                    'navbar' => 'Danh mục chính',
                    'sidebar' => 'Thanh bên',
                    'footer' => 'Chân trang',
                    'feader' => 'Header',
                ])
                ->title('Vị Trí')
                ->help('Vị trí danh mục sẽ xuất hiện trên trang web'),
        ];
    }
}
