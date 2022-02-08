<?php

namespace App\Orchid\Layouts\Shop\Attribute;

use Orchid\Screen\Fields\RadioButtons;
//use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Field;

use App\Models\Shop\Attribute;

class AttributeEditLayout extends Rows
{

    protected function fields(): array
    {
        return [

            Input::make('name')
                ->title('Tên')
                ->placeholder('Nhập tên'),

        ];
    }
}
