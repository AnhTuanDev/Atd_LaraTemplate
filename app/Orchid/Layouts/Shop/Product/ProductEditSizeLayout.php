<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Group;

use App\Models\Shop\Attribute;

use App\Models\Shop\AttributeValue;

class ProductEditSizeLayout extends Rows
{
    protected function fields(): array
    {
        return [

            Select::make('size')
                //->tags()
                ->disabled()
                ->fromQuery(Attribute::whereSlug('size')->take(1), 'name')
                ->title('Thuộc Tính'),

            Select::make('sizes.')
                ->tags()
                ->maximumSelectionLength(5)
                ->multiple()
                ->fromModel(AttributeValue::class, 'name')
                ->title('Sizes'),

        ];
    }
}
