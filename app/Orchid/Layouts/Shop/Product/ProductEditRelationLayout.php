<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;

use App\Models\Shop\Category;
use App\Models\Shop\Tag;

class ProductEditRelationLayout extends Rows
{
    protected function fields(): array
    {
        return [

            Select::make('product.category_id')
                ->fromQuery(Category::where('parent_id', '!=', null)->orderBy('name', 'desc'), 'name')
                ->title('Danh Mục'),

            Select::make('tags.')
                //->tags()
                ->maximumSelectionLength(5)
                ->multiple()
                ->fromModel(Tag::class, 'name')
                ->title('Tags'),

        ];
    }
}
