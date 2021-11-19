<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Switcher;

use App\Models\Shop\Category;
use App\Models\Shop\Tag;

class ProductEditOptionLayout extends Rows
{
    protected function fields(): array
    {
        return [

            Switcher::make('product.status')
                ->value(true)
                ->novalue(0)
                ->yesvalue(1)
                ->sendTrueOrFalse()
                ->help('Bán sản phẩm')
                ->title('Trạng Thái Sản Phẩm'),
            
            Switcher::make('product.featured')
                ->novalue(0)
                ->yesvalue(1)
                ->sendTrueOrFalse()
                ->help('Đặt làm sản phẩm nổi bật')
                ->title('Sản phẩm nổi bật'),

            Switcher::make('product.home_banner')
                ->novalue(0)
                ->yesvalue(1)
                ->sendTrueOrFalse()
                ->help('Đặt làm banner trang chủ')
                ->title('Banner trang chủ'),

        ];
    }
}
