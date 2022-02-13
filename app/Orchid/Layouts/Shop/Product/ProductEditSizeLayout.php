<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Group;

use App\Models\Shop\Size;

use App\Models\Shop\SizeValue;

class ProductEditSizeLayout extends Rows
{
    protected function fields(): array
    {
        return [

            Select::make('sizes.')
                ->tags()
                ->maximumSelectionLength(5)
                ->multiple()
                ->fromModel(Size::class, 'name')
                ->title('Sizes'),

        ];
    }
}
