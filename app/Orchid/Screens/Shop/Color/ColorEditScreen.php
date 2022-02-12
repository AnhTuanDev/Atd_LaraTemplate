<?php

namespace App\Orchid\Screens\Shop\Color;


use App\Orchid\Layouts\Shop\Color\ColorDeleteModalLayout;
use App\Orchid\Layouts\Shop\Color\ColorEditLayout;

use App\Http\Requests\Shop\StoreColorRequest;

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

use App\Models\Shop\Color as ProductColor;

use Orchid\Screen\Action;
use Orchid\Support\Color;

class ColorEditScreen extends Screen
{

    public $name = 'Color Mới';

    public $colorName;

    public $productColor = [];

    public function query(ProductColor $productColor): array
    {

        $this->exists = $productColor->exists;

        if($this->exists)
        {

            //Thay đổi trường name của trang.
            $this->name = 'Chỉnh sửa';

            //Gán giá trị cho $color
            $this->productColor = $productColor;

            $this->colorName = $productColor->name;

        }

        return [

            'name' => $this->colorName,

            'color' => $this->productColor,

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

                ColorEditLayout::class,

            ]),

            //Modal delete
            Layout::modal('deleteModal', [

                ColorDeleteModalLayout::class,

            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ]; //End return
    }

    //Function Create Or Update.
    public function createOrUpdate(ProductColor $color, StoreColorRequest $request) {

        $data = $request->validated();
        
        //ddd($data);

        $colorData = $data['color'];

        $colorData = array_merge($colorData, [
                'name' => $data['name'],
                'slug' => $data['slug'],
        ]);
        
        $color->fill($colorData)->save();

        Toast::info('Lưu thành công: ' . $colorData['value']);

        return redirect()->route('admin.color.list');

    }//End createOrUpdate.

    public function delete(ProductColor $color)
    {
        $color->delete();

        Toast::info('Xóa thành công: ' . $color['value']);

        return redirect()->route('admin.color.list');
    }

}
