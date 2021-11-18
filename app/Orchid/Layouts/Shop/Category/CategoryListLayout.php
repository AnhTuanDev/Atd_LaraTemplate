<?php

namespace App\Orchid\Layouts\Shop\Category;

use Orchid\Screen\Layouts\Table;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;
use Orchid\Screen\TD;

use App\Models\Shop\Category;

class CategoryListLayout extends Table
{

    protected $target = 'categories';

    protected function columns(): array
    {
        return [
            TD::make('order', 'Thứ Tự')
                ->sort()
                ->width('50'),

            TD::make('name', 'Tên Danh Mục')
                ->sort()
                ->width('280')
                ->filter(TD::FILTER_TEXT)
                ->render(function(Category $category) {
                    if($category->parent !== null) {
                        return Link::make($category->parent->name .' --> ' . Str::title($category->name))
                                ->route('admin.category.edit', $category->id);
                    }
                    else {
                        return Link::make(Str::title($category->name))
                                ->route('admin.category.edit', $category->id);
                    }
                }),

            TD::make('Danh Mục Cha')
                ->width('200px')
                ->render(function(Category $category) {
                    $category = $category->parent ?? null;
                    return $category ? 
                        Link::make(Str::title($category->name))
                            ->route('admin.category.list')
                            ->class('btn') : '';
                }),

            TD::make('Hành Động')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function(Category $category) {
                    return DropDown::make()
                            ->class('btn btn-light btn-large fs-4')
                            ->icon('settings')
                            ->list([

                                Link::make('Chỉnh Sửa')
                                    ->icon('plus')
                                    ->route('admin.category.edit', $category->id),

                                ModalToggle::make('Xóa')
                                    ->modal('deleteModal')
                                    ->method('delete', ['id' => $category->id])
                                    ->icon('trash')
                            ]);
                }),
        ];
    }
}
