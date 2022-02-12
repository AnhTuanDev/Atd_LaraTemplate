<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Group;

use App\Models\Shop\Color;

class ProductEditColorLayout extends Rows
{
    protected function fields(): array
    {
        return [

            Select::make('colors.')
                //->empty('Chọn color', 0)
                //->tags()
                ->maximumSelectionLength(5)
                ->multiple()
                ->fromModel(Color::class, 'name')
                ->title('Color'),

        ];
    }
}
