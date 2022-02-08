<?php

namespace App\Orchid\Screens\Shop\AttributeValue;

use Orchid\Screen\Screen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Orchid\Support\Facades\Toast;
use App\Orchid\Fields\Tag;
use Orchid\Screen\Actions\Link;
//use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Table;
use Orchid\Support\Facades\Layout;

use App\Models\Shop\AttributeValue;
use App\Orchid\Layouts\Shop\AttributeValue\AttributeValueListLayout;
use App\Orchid\Layouts\Shop\AttributeValue\AttributeValueDeleteModalLayout;

class AttributeValueListScreen extends Screen
{

    public $name = 'Danh Sách Attribute Value';

    public function query(): array
    {

        return [
            'attribute_values' => AttributeValue::filters()->defaultSort('order', 'asc')->paginate(10),
        ];

    }

    public function commandBar(): array
    {

        return [
            Link::make('Thêm')
                ->icon('plus')
                ->route('admin.attribute-value.edit')
        ];

    }

    public function layout(): array
    {

        return [

            AttributeValueListLayout::class,

            Layout::modal('deleteModal', [
                AttributeValueDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ];

    }

    public function delete(AttributeValue $attributeValue)
    {
        $attributeValue->delete();

        Toast::info('Xóa thành công: ' . $attributeValue['name']);

        return redirect()->route('admin.attribute-value.list');
    }

}
