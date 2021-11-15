<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;
//use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Switcher;
//use Orchid\Screen\Fields\Relation;

use App\Models\Shop\Category;
use App\Models\Shop\Tag;

class ProductEditOptionLayout extends Rows
{
    protected function fields(): array
    {
        //$query = $this->query['];
        return [

            Switcher::make('product.status')
                ->value(true)
                ->novalue(0)
                ->yesvalue(1)
                ->sendTrueOrFalse()
                ->title('Trạng Thái Sản Phẩm'),
            
            Switcher::make('product.featured')
                ->novalue(0)
                ->yesvalue(1)
                ->sendTrueOrFalse()
                ->title('Sản phẩm nổi bật'),

            Select::make('product.category_id')
                ->empty()
                ->fromModel(Category::class, 'name')
                ->placeholder('Chọn chủ danh mục')
                ->title('Danh Mục'),

            Select::make('tags.')
                //->tags()
                ->maximumSelectionLength(5)
                ->multiple()
                ->fromModel(Tag::class, 'name')
                ->placeholder('Chọn tag')
                ->empty()
                ->title('Tags'),

        ];
    }
}
