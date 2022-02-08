<?php

namespace App\Orchid\Screens\Shop\Attribute;

use Orchid\Screen\Screen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Table;
use Orchid\Support\Facades\Layout;

use App\Models\Shop\Attribute;
use App\Orchid\Layouts\Shop\Attribute\AttributeListLayout;
use App\Orchid\Layouts\Shop\Attribute\AttributeDeleteModalLayout;

class AttributeListScreen extends Screen
{

    public $name = 'Danh Sách Thuộc Tính';

    public function query(): array
    {

        return [
            'attributes' => Attribute::filters()->defaultSort('id', 'asc')->paginate(10),
        ];

    }

    public function commandBar(): array
    {

        return [
            Link::make('Thêm')
                ->icon('plus')
                ->route('admin.attribute.edit')
        ];

    }

    public function layout(): array
    {

        return [

            AttributeListLayout::class,

            Layout::modal('deleteModal', [
                AttributeDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ];

    }

    public function delete(Attribute $attribute)
    {
        $attribute->delete();

        Toast::info('Xóa thành công: ' . $attribute['name']);

        return redirect()->route('admin.attribute.list');
    }

}
