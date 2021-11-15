<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;

class ProducEditContentLayout extends Rows
{

    protected function fields(): array
    {
        return [

            Input::make('name')
                ->class('w-100 border rounded py-2 px-3')
                ->maxlength(160)
                ->title('Tên Sản Phẩm')
                ->placeholder('Nhập tên sản phẩm'),

            SimpleMDE::make('product.description')
                ->rows(100)
                ->maxlength(255)
                ->title('Mô Tả Sản Phẩm')
                ->toolbar(['text', 'color', 'quote', 'header', 'list', 'format'])
                ->placeholder('Viết mô tả'),

        ];
    }
}
