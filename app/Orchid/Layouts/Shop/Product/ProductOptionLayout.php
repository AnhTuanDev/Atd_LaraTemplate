<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
//use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Select;
//use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Upload;

use App\Models\Shop\Category;
use App\Models\Shop\Tag;

class ProductOptionLayout extends Rows
{
    protected function fields(): array
    {
        //$query = $this->query['];
        return [

            Select::make('product.category_id')
                //->required()
                ->empty()
                ->fromModel(Category::class, 'name')
                ->placeholder('Chọn chủ danh mục')
                ->title('Danh Mục'),

            Select::make('tags.')
                //->tags()
                //->required()
                ->maximumSelectionLength(5)
                ->multiple()
                ->fromModel(Tag::class, 'name')
                ->placeholder('Chọn tag')
                ->empty()
                ->title('Tags'),

            Upload::make('attachment')
                //->required()
                ->closeOnAdd()
                ->maxFiles(6)
                ->acceptedFiles('image/*')
                ->title('Hình Ảnh Sản Phẩm')
                //->media()
                ->groups('product'),

            RadioButtons::make('product.status')
                //->required()
                ->options([
                    'published' => 'Công khai',
                    'private' => 'Không công khai',
                    'drafting' => 'Bản nháp',
                ])->title('Trạng thái bài đăng'),

        ];
    }
}
