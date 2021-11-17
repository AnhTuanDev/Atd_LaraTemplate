<?php

namespace App\Orchid\Layouts\Shop\Product;

use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;
use Orchid\Screen\TD;

use App\Orchid\Atd\Screen\Fields\AtdTag;//Atd custom tag

use App\Models\Shop\Product;

class ProductListLayout extends Table
{

    protected $target = 'products';

    protected function columns(): array
    {
        return [
            TD::make('id', 'Hình Ảnh')
                ->sort()
                ->width('96')
                ->render(function(Product $product) {
                    $url = $product->cover ? $product->cover->url() : '/';
                    $id = $product->id ?: null;
                    return "
                        <img class='img-thumbnail' src='$url'><br/>
                        <span class='small text-muted mt-2 mb-0'># $id</span>
                    ";
                }),
            TD::make('name', 'Tên Sản Phẩm')
                ->sort()
                ->width('280')
                ->filter(TD::FILTER_TEXT)
                ->render(function(Product $product) {
                    return
                        Link::make(Str::title($product->name))
                            ->route('admin.product.edit', $product->id);
                }),

            /*
            TD::make('Mô tả Sản Phẩm')
                ->width('300px')
                ->render(function(Product $product) {
                    return Str::words($product->description, 30, ' ...');
                }),
            */

            TD::make('Danh Mục')
                ->width('200px')
                ->render(function(Product $product) {
                    $category = $product->category;
                    return $category ? 
                        Link::make(Str::title($category->name))
                            ->route('admin.product.list')
                            ->class('btn') : '';
                }),

            TD::make('Tag')
                ->width('250px')
                ->render(function(Product $product) {
                    return AtdTag::make('Tags')
                        ->route('admin.product.list')
                        ->class('btn')
                        ->data($product);
                }),

            TD::make('Hành Động')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function(Product $product) {
                    return DropDown::make()
                            ->class('btn btn-light btn-large fs-4')
                            ->icon('settings')
                            ->list([

                                Link::make('Chỉnh Sửa')
                                    ->icon('plus')
                                    ->route('admin.product.edit', $product->id),

                                ModalToggle::make('Xóa')
                                    ->modal('deleteModal')
                                    ->method('delete', ['id' => $product->id])
                                    ->icon('trash')
                            ]);
                }),
        ];
    }
}
