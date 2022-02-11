<?php

namespace App\Orchid\Screens\Shop\AttributeValue;


use App\Orchid\Layouts\Shop\AttributeValue\AttributeValueDeleteModalLayout;
use App\Orchid\Layouts\Shop\AttributeValue\AttributeValueEditLayout;

use App\Http\Requests\Shop\StoreAttributeValueRequest;

use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

use Illuminate\Validation\Rule;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\AttributeValue;

use Orchid\Screen\Action;
use Orchid\Support\Color;

class AttributeValueEditScreen extends Screen
{

    public $name = 'Danh Mục Mới';

    public $attributeValue = [];

    public function query(AttributeValue $attributeValue): array
    {

        $this->exists = $attributeValue->exists;

        if($this->exists)
        {

            //Thay đổi trường name của trang.
            $this->name = 'Chỉnh sửa danh mục';

            //Gán giá trị cho $attributeValue
            $this->attributeValue = $attributeValue;

        }

        return [

            'attributeValue' => $this->attributeValue,

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

                AttributeValueEditLayout::class,

            ]),

            //Modal delete
            Layout::modal('deleteModal', [

                AttributeValueDeleteModalLayout::class,

            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ]; //End return
    }

    //Function Create Or Update.
    public function createOrUpdate(AttributeValue $attributeValue, StoreAttributeValueRequest $request) {

        $data = $request->validated();
        
        //ddd($data);

        $attributeValueData = $data['attributeValue'];
        
        $attributeValue->fill($attributeValueData)->save();

        Toast::info('Lưu thành công: ' . $attributeValueData['value']);

        return redirect()->route('admin.attribute-value.list');

    }//End createOrUpdate.

    public function delete(AttributeValue $attributeValue)
    {
        $attributeValue->delete();

        Toast::info('Xóa thành công: ' . $attributeValue['value']);

        return redirect()->route('admin.attribute-value.list');
    }

}
