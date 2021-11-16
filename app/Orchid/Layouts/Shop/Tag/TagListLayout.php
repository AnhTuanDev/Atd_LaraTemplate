<?php

namespace App\Orchid\Layouts\Shop\Tag;

use Orchid\Screen\Layouts\Table;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;
use Orchid\Screen\TD;

use App\Models\Shop\Tag;

class TagListLayout extends Table
{

    protected $target = 'tags';

    protected function columns(): array
    {
        return [
            TD::make('id', 'Id')
                ->sort()
                ->width('50'),

            TD::make('name', 'Tên Danh Mục')
                ->sort()
                ->width('280')
                ->filter(TD::FILTER_TEXT)
                ->render(function(Tag $tag) {
                    return Link::make(Str::title($tag->name))
                            ->route('admin.tag.edit', $tag->id);
               
                }),

            TD::make('Hành Động')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function(Tag $tag) {
                    return DropDown::make()
                            ->class('btn btn-light btn-large fs-4')
                            ->icon('settings')
                            ->list([

                                Link::make('Chỉnh Sửa')
                                    ->icon('plus')
                                    ->route('admin.tag.edit', $tag->id),

                                ModalToggle::make('Xóa')
                                    ->modal('deleteModal')
                                    ->method('delete', ['id' => $tag->id])
                                    ->icon('trash')
                            ]);
                }),
        ];
    }
}
