<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\TextArea;

class ProductEditMetaLayout extends Rows
{
    protected function fields(): array
    {

        return [

            TextArea::make('product.meta_keywords')
                //->required()
                ->rows(4)
                ->maxlength(200)
                ->title('Seo Meta keyword')
                ->class('w-100 border rounded py-2 px-3 no-resize')
                ->help('Meta keywords hợp giúp google nhận diện tốt hơn')
                ->placeholder('Keywords tốt cho seo'),

            TextArea::make('product.meta_description')
                //->required()
                ->rows(4)
                ->maxlength(200)
                ->title('Seo Meta description')
                ->class('w-100 border rounded py-2 px-3 no-resize')
                ->help('Meta description nên từ 140 - 160 ký tự')
                ->placeholder('Viết mô tả hiển thị khi tìm kiếm'),

        ];

    }
}
