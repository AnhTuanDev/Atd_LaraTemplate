<?php

namespace App\Orchid\Layouts\Shop\Size;

use Orchid\Screen\Fields\RadioButtons;
//use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Field;

use App\Models\Shop\Size;

class SizeEditLayout extends Rows
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
