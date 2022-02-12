<?php

namespace App\Orchid\Layouts\Shop\Color;

use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Field;

use App\Models\Shop\Color;

use App\Models\Shop\Product;

class ColorEditLayout extends Rows
{

    protected function fields(): array
    {
        return [

            Input::make('name')
                ->title('Tên')
                ->placeholder('Nhập tên'),

            Input::make('color.value')
                ->title('Giá trị')
                ->placeholder('Nhập giá trị'),

        ];
    }
}
