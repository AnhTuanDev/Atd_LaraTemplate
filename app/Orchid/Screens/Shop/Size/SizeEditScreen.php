<?php

namespace App\Orchid\Screens\Shop\Size;


use App\Orchid\Layouts\Shop\Size\SizeDeleteModalLayout;
use App\Orchid\Layouts\Shop\Size\SizeEditLayout;

use App\Http\Requests\Shop\StoreSizeRequest;

use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\Size;

use Orchid\Screen\Action;
use Orchid\Support\Color;

class SizeEditScreen extends Screen
{

    public $name = 'Thêm Size';

    public $size;

    public $exists;

    public $sizeName;


    public function query(Size $size): array
    {

        $this->exists = $size->exists;

        if($this->exists)
        {

            //Thay đổi trường name của trang.
            $this->name = 'Chỉnh Sửa Size';

            //Gán giá trị cho $size
            $this->size = $size;

            //Gán gía trị cho $sizeName.
            $this->sizeName = $size->name;

        }

        return [

            'size' => $this->size,
            'name' => $this->sizeName,

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

                SizeEditLayout::class,

            ]),

            //Modal delete
            Layout::modal('deleteModal', [

                SizeDeleteModalLayout::class,

            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ]; //End return
    }

    //Function Create Or Update.
    public function createOrUpdate(Size $size, StoreSizeRequest $request) {

        $data = $request->validated();
        
        //ddd($data);

        $size->fill($data)->save();

        Toast::info('Lưu thành công: ' . $data['name']);

        return redirect()->route('admin.size.list');

    }//End createOrUpdate.

    public function delete(Size $size)
    {
        $size->delete();

        Toast::info('Xóa thành công: ' . $size['name']);

        return redirect()->route('admin.size.list');
    }

}
