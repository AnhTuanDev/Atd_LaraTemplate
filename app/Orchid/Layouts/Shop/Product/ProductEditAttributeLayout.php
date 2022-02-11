<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;

use App\Models\Shop\Attribute;

use App\Models\Shop\AttributeValue;

class ProductEditAttributeLayout extends Rows
{
    protected function fields(): array
    {
        return [

            Select::make('attribute')
                //->tags()
                ->fromModel(Attribute::class, 'name')
                ->title('Attribute'),

            Select::make('attributeValue.')
                ->tags()
                ->maximumSelectionLength(5)
                ->multiple()
                ->fromModel(AttributeValue::class, 'value')
                ->title('Attribute Value'),

        ];
    }
}
