<?php

namespace App\Orchid\Layouts\Shop\AttributeValue;

use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Field;

use App\Models\Shop\Attribute;

use App\Models\Shop\Product;

class AttributeValueEditLayout extends Rows
{

    protected function fields(): array
    {
        return [

            Select::make('attributeValue.attribute_id')
                ->fromModel(Attribute::class, 'name')
                ->empty('Chọn Value')
                ->title('Attribute Value'),

            Select::make('attributeValue.product_id')
                ->fromModel(Product::class, 'name')
                ->empty('Chọn Sản phẩm')
                ->title('Danh sách sản phẩm'),

            Input::make('attributeValue.value')
                ->title('Tên')
                ->placeholder('Nhập tên'),

        ];
    }
}
