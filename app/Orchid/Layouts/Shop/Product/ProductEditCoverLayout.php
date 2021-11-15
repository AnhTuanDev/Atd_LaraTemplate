<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
//use Orchid\Screen\Fields\Picture;
//use App\Orchid\Atd\Screen\Fields\AtdPicture as Picture;
use Orchid\Screen\Fields\Upload as Picture;

class ProductEditCoverLayout extends Rows
{
    protected function fields(): array
    {
        return [

            Picture::make('product.cover_image')
                ->targetId()
                ->closeOnAdd()
                ->maxFiles(1)
                ->acceptedFiles('image/*')
                ->title('Hình Cover')
                ->groups('product-cover'),
                //->horizontal(),
        ];
    }
}
