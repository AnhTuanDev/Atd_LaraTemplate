<?php

namespace App\Orchid\Screens\Shop\Tag;


use App\Orchid\Layouts\Shop\Tag\TagDeleteModalLayout;
use App\Orchid\Layouts\Shop\Tag\TagEditLayout;

use App\Http\Requests\Shop\StoreTagRequest;

use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\Tag;

use Orchid\Screen\Action;
use Orchid\Support\Color;

class TagEditScreen extends Screen
{

    public $name = 'Thẻ Tag Mới';

    public $tag = [];

    public $tagName = '';

    public function query(Tag $tag): array
    {

        $this->exists = $tag->exists;

        if($this->exists)
        {

            //Thay đổi trường name của trang.
            $this->name = 'Chỉnh Sửa Thẻ Tag';

            //Gán giá trị cho $tag
            $this->tag = $tag;

            //Gán gía trị cho $tagName.
            $this->tagName = $tag->name;

        }

        return [

            'tag' => $this->tag,
            'name' => $this->tagName,

        ];
    }

    public function commandBar(): array
    {
        return [

            Button::make('Tạo')->type(Color::DARK())->icon('pencil')->method('createOrUpdate')->canSee(!$this->exists),
            Button::make('Cập nhật')->type(Color::DARK())->icon('note')->method('createOrUpdate')->canSee($this->exists),

            ModalToggle::make('Xóa danh mục')
                ->modal('deleteModal')
                ->method('delete')
                ->icon('trash')
                ->canSee($this->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::columns([

                TagEditLayout::class,

            ]),

            //Modal delete
            Layout::modal('deleteModal', [

                TagDeleteModalLayout::class,

            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ]; //End return
    }

    //Function Create Or Update.
    public function createOrUpdate(Tag $tag, StoreTagRequest $request) {

        $data = $request->validated();
        
        //ddd($data);

        $tag->fill($data)->save();

        Toast::info('Lưu thành công: ' . $data['name']);

        return redirect()->route('admin.tag.list');

    }//End createOrUpdate.

    public function delete(Tag $tag)
    {
        $tag->delete();

        Toast::info('Xóa thành công: ' . $tag['name']);

        return redirect()->route('admin.tag.list');
    }

}
