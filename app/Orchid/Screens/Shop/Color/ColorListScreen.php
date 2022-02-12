<?php

namespace App\Orchid\Screens\Shop\Color;

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

use App\Models\Shop\Color;
use App\Orchid\Layouts\Shop\Color\ColorListLayout;
use App\Orchid\Layouts\Shop\Color\ColorDeleteModalLayout;

class ColorListScreen extends Screen
{

    public $name = 'Danh Sách Color';

    public function query(): array
    {

        return [
            'colors' => Color::filters()->defaultSort('id', 'asc')->paginate(10),
        ];

    }

    public function commandBar(): array
    {

        return [
            Link::make('Thêm')
                ->icon('plus')
                ->route('admin.color.edit')
        ];

    }

    public function layout(): array
    {

        return [

            ColorListLayout::class,

            Layout::modal('deleteModal', [
                ColorDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ];

    }

    public function delete(Color $color)
    {
        $color->delete();

        Toast::info('Xóa thành công: ' . $color['name']);

        return redirect()->route('admin.color.list');
    }

}
