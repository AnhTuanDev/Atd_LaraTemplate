<?php

namespace App\Orchid\Screens\Shop\Attribute;


use App\Orchid\Layouts\Shop\Attribute\AttributeDeleteModalLayout;
use App\Orchid\Layouts\Shop\Attribute\AttributeEditLayout;

use App\Http\Requests\Shop\StoreAttributeRequest;

use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\Attribute;

use Orchid\Screen\Action;
use Orchid\Support\Color;

class AttributeEditScreen extends Screen
{

    public $name = 'Thêm Thuộc Tính';

    public $attribute;

    public $exists;

    public $attributeName;


    public function query(Attribute $attribute): array
    {

        $this->exists = $attribute->exists;

        if($this->exists)
        {

            //Thay đổi trường name của trang.
            $this->name = 'Chỉnh Sửa Thuộc Tính';

            //Gán giá trị cho $attribute
            $this->attribute = $attribute;

            //Gán gía trị cho $attributeName.
            $this->attributeName = $attribute->name;

        }

        return [

            'attribute' => $this->attribute,
            'name' => $this->attributeName,

        ];
    }

    public function commandBar(): array
    {
        return [

            Button::make('Tạo')->type(Color::DARK())->icon('pencil')->method('createOrUpdate')->canSee(!$this->exists),
            Button::make('Cập nhật')->type(Color::DARK())->icon('note')->method('createOrUpdate')->canSee($this->exists),

            ModalToggle::make('Xóa')
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

                AttributeEditLayout::class,

            ]),

            //Modal delete
            Layout::modal('deleteModal', [

                AttributeDeleteModalLayout::class,

            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ]; //End return
    }

    //Function Create Or Update.
    public function createOrUpdate(Attribute $attribute, StoreAttributeRequest $request) {

        $data = $request->validated();
        
        //ddd($data);

        $attribute->fill($data)->save();

        Toast::info('Lưu thành công: ' . $data['name']);

        return redirect()->route('admin.attribute.list');

    }//End createOrUpdate.

    public function delete(Attribute $attribute)
    {
        $attribute->delete();

        Toast::info('Xóa thành công: ' . $attribute['name']);

        return redirect()->route('admin.attribute.list');
    }

}
