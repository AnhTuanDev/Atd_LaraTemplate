<?php

namespace App\Orchid\Layouts\Shop\Category;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;

class CategoryDeleteModalLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Input::make('Note')
                //->class('bg-transparent border-0 fs-4 text-center')
                ->readonly()
                ->placeholder('Bạn vẫn muốn xóa danh mục này ?')
                ->disabled(),
        ];
    }
}
