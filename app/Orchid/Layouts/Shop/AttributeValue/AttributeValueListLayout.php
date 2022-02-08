<?php

namespace App\Orchid\Layouts\Shop\AttributeValue;

use Orchid\Screen\Layouts\Table;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;
use Orchid\Screen\TD;

use App\Models\Shop\AttributeValue;

class AttributeValueListLayout extends Table
{

    protected $target = 'attribute_values';

    protected function columns(): array
    {
        return [

            TD::make('name', 'Tên')
                ->sort()
                ->width('280')
                ->filter(TD::FILTER_TEXT)
                ->render(function(AttributeValue $attributeValue) {
                    if($attributeValue->parent !== null) {
                        return Link::make($attributeValue->parent->name .' --> ' . Str::title($attributeValue->name))
                                ->route('admin.attribute.edit', $attributeValue->id);
                    }
                    else {
                        return Link::make(Str::title($attributeValue->name))
                                ->route('admin.attribute.edit', $attributeValue->id);
                    }
                }),

            TD::make('Danh Mục Cha')
                ->width('200px')
                ->render(function(AttributeValue $attributeValue) {
                    $attributeValue = $attributeValue->parent ?? null;
                    return $attributeValue ? 
                        Link::make(Str::title($attributeValue->name))
                            ->route('admin.attribute-value.list')
                            ->class('btn') : '';
                }),

            TD::make('Hành Động')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function(AttributeValue $attributeValue) {
                    return DropDown::make()
                            ->class('btn btn-light btn-large fs-4')
                            ->icon('settings')
                            ->list([

                                Link::make('Chỉnh Sửa')
                                    ->icon('plus')
                                    ->route('admin.attributeValue.edit', $attributeValue->id),

                                ModalToggle::make('Xóa')
                                    ->modal('deleteModal')
                                    ->method('delete', ['id' => $attributeValue->id])
                                    ->icon('trash')
                            ]);
                }),
        ];
    }
}
