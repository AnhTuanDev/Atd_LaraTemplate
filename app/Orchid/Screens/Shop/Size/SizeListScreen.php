<?php

namespace App\Orchid\Screens\Shop\Size;

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

use App\Models\Shop\Size;
use App\Orchid\Layouts\Shop\Size\SizeListLayout;
use App\Orchid\Layouts\Shop\Size\SizeDeleteModalLayout;

class SizeListScreen extends Screen
{

    public $name = 'Danh Sách Size';

    public function query(): array
    {

        return [
            'sizes' => Size::filters()->defaultSort('id', 'asc')->paginate(10),
        ];

    }

    public function commandBar(): array
    {

        return [
            Link::make('Thêm')
                ->icon('plus')
                ->route('admin.size.edit')
        ];

    }

    public function layout(): array
    {

        return [

            SizeListLayout::class,

            Layout::modal('deleteModal', [
                SizeDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ];

    }

    public function delete(Size $size)
    {
        $size->delete();

        Toast::info('Xóa thành công: ' . $size['name']);

        return redirect()->route('admin.size.list');
    }

}
