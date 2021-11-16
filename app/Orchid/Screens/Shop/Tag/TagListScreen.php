<?php

namespace App\Orchid\Screens\Shop\Tag;

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

use App\Models\Shop\Tag;
use App\Orchid\Layouts\Shop\Tag\TagListLayout;
use App\Orchid\Layouts\Shop\Tag\TagDeleteModalLayout;

class TagListScreen extends Screen
{

    public $name = 'Danh Sách Danh Mục';

    public function query(): array
    {

        return [
            'tags' => Tag::filters()->defaultSort('id', 'asc')->paginate(10),
        ];

    }

    public function commandBar(): array
    {

        return [
            Link::make('Thêm Danh Mục')
                ->icon('plus')
                ->route('admin.tag.edit')
        ];

    }

    public function layout(): array
    {

        return [

            TagListLayout::class,

            Layout::modal('deleteModal', [
                TagDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ];

    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        Toast::info('Xóa thành công: ' . $tag['name']);

        return redirect()->route('admin.tag.list');
    }

}
