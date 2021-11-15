<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;

class ProductEditDataLayout extends Rows
{
    protected function fields(): array
    {

        return [

            Input::make('product.price')
                ->title('Giá')
                ->mask([
                    'mask'         => '999 999 999',
                    'numericInput' => true,
                ]),

            Input::make('product.discount')
                ->title('Giảm Giá')
                ->mask([
                    'mask'         => '999 999 999',
                    'numericInput' => true,
                ]),

            Input::make('product.sku')
                //->required()
                ->title('Mã Sku')
                ->placeholder('Nhập Mã Sku')
                ->help('Mã sku: thương hiêu - danh mục - loại - size - màu sắc'),

            Input::make('product.quantity')
                ->type('number')
                //->required()
                ->title('Số lượng')
                ->placeholder('Nhập số lượng')
                ->help('Số lượng sản phẩm nhập vào kho'),

            Input::make('product.stock')
                ->type('number')
                //->required()
                ->title('Số lượng trong kho')
                ->placeholder('Nhập số lượng')
                ->help('Số lượng sản phẩm cồn lại trong kho'),

        ];

    }
}
