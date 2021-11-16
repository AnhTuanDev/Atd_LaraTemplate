<?php

namespace App\Orchid\Layouts\Shop\Tag;

use Orchid\Screen\Fields\RadioButtons;
//use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Field;

use App\Models\Shop\Tag;

class TagEditLayout extends Rows
{

    protected function fields(): array
    {
        return [

            Input::make('name')
                ->title('Tên Thẻ Tag')
                ->placeholder('Nhập tên thẻ tag'),

        ];
    }
}
