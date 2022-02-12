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

use App\Models\Shop\Product;

use App\Models\Shop\Attribute;

class AttributeValueListLayout extends Table
{

    protected $target = 'attribute_values';

    protected function columns(): array
    {
        return [

            TD::make('attribute_id', 'Thuộc tính')
                ->sort()
                ->width('200px')
                ->render(function(AttributeValue $atv) {
                    $id = $atv->attribute_id ?: null;
                    if($id) {
                        $at = Attribute::findOrFail($id);
                        return $at ? 
                            Link::make(Str::title($at->name))
                                ->route('admin.attribute.edit', $at->id)
                                ->class('btn') : '';
                    }
                }),

            TD::make('Giá trị thuộc tính')
                ->sort()
                ->width('280')
                ->filter(TD::FILTER_TEXT)
                ->render(function(AttributeValue $attributeValue) {
                        return Link::make($attributeValue->value)
                                ->route('admin.attribute-value.edit', $attributeValue->id);
                }),

            TD::make('product_id', 'Sản Phẩm')
                ->width('200px')
                ->render(function(AttributeValue $atv) {
                    $pr = Product::findOrFail($atv->product_id)->first();
                    return $pr ? 
                        Link::make(Str::title($pr->name))
                            ->route('admin.product.edit', $pr->id)
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
                                    ->route('admin.attribute-value.edit', $attributeValue->id),

                                ModalToggle::make('Xóa')
                                    ->modal('deleteModal')
                                    ->method('delete', ['id' => $attributeValue->id])
                                    ->icon('trash')
                            ]);
                }),
        ];
    }
}
