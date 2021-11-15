<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Upload;
//use Orchid\Screen\Fields\Picture;
use App\Orchid\Atd\Screen\Fields\AtdPicture as Picture;

class ProductEditPhotosLayout extends Rows
{
    protected function fields(): array
    {
        //$query = $this->query['];
        return [

            Upload::make('product.photos')
                //->required()
                ->closeOnAdd()
                ->maxFiles(6)
                ->acceptedFiles('image/*')
                ->title('Hình Ảnh Sản Phẩm')
                //->media()
                //->horizontal()
                ->groups('product'),

        ];
    }
}
