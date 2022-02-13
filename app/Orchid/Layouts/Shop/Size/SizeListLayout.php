<?php

namespace App\Orchid\Layouts\Shop\Size;

use Orchid\Screen\Layouts\Table;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;
use Orchid\Screen\TD;

use App\Models\Shop\Size;

class SizeListLayout extends Table
{

    protected $target = 'sizes';

    protected function columns(): array
    {
        return [
            TD::make('id', 'Id')
                ->sort()
                ->width('50'),

            TD::make('name', 'Tên')
                ->sort()
                ->width('280')
                ->filter(TD::FILTER_TEXT)
                ->render(function(Size $size) {
                    return Link::make(Str::title($size->name))
                            ->route('admin.size.edit', $size->id);
               
                }),

            TD::make('Hành Động')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function(Size $size) {
                    return DropDown::make()
                            ->class('btn btn-light btn-large fs-4')
                            ->icon('settings')
                            ->list([

                                Link::make('Chỉnh Sửa')
                                    ->icon('plus')
                                    ->route('admin.size.edit', $size->id),

                                ModalToggle::make('Xóa')
                                    ->modal('deleteModal')
                                    ->method('delete', ['id' => $size->id])
                                    ->icon('trash')
                            ]);
                }),
        ];
    }
}
