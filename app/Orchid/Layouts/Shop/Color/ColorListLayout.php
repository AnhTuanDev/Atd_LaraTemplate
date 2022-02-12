<?php

namespace App\Orchid\Layouts\Shop\Color;

use Orchid\Screen\Layouts\Table;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;
use Orchid\Screen\TD;

use App\Models\Shop\Color;

use App\Models\Shop\Product;

class ColorListLayout extends Table
{

    protected $target = 'colors';

    protected function columns(): array
    {
        return [

            TD::make('id')
                ->sort()
                ->width('50'),

            TD::make('Tên')
                ->sort()
                ->width('280')
                ->filter(TD::FILTER_TEXT)
                ->render(function(Color $color) {
                        return Link::make($color->name)
                                ->route('admin.color.edit', $color->id);
                }),

            TD::make('Giá trị')
                ->sort()
                ->width('280')
                ->filter(TD::FILTER_TEXT)
                ->render(function(Color $color) {
                        return Link::make($color->value)
                                ->route('admin.color.edit', $color->id);
                }),

            TD::make('Hành Động')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function(Color $color) {
                    return DropDown::make()
                            ->class('btn btn-light btn-large fs-4')
                            ->icon('settings')
                            ->list([

                                Link::make('Chỉnh Sửa')
                                    ->icon('plus')
                                    ->route('admin.color.edit', $color->id),

                                ModalToggle::make('Xóa')
                                    ->modal('deleteModal')
                                    ->method('delete', ['id' => $color->id])
                                    ->icon('trash')
                            ]);
                }),
        ];
    }
}
