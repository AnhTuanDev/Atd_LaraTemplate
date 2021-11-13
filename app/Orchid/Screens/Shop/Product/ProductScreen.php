<?php

namespace App\Orchid\Screens\Shop\Product;

use Orchid\Screen\Screen;
use Orchid\Screen\Action;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
//use Orchid\Screen\Fields\Group;

use Orchid\Attachment\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Orchid\Support\Color;

use App\Models\Shop\Product;
use App\Models\Shop\Category;
use App\Models\Shop\Tag;

class ProductScreen extends Screen
{
    public $name = 'Sản Phẩm Mới';

    //public $description = 'Trang Thêm Sản Phẩm Mới';

    public $exists = false;

    public function query(Product $product): array
    {
        $this->exists = $product->exists;

        if($this->exists)
        {
            $this->name = 'Chỉnh sửa Sản Phẩm';

            //$this->description = 'Trang Chỉnh sửa Sản Phẩm';
        }

        return [
            'products' => Product::all(),
        ];
    }

    public function commandBar(): array
    {
        return [

            Link::make('Danh Sách Sản Phẩm')->type(Color::DEFAULT())->icon('modules')->route('admin.product.list'),

            Button::make('Đăng')->type(Color::DARK())->icon('pencil')->method('createOrUpdate')->canSee(!$this->exists),

            Button::make('Cập nhật')->type(Color::DARK())->icon('note')->method('createOrUpdate')->canSee($this->exists),

            /**
            ModalToggle::make('Xóa bài đăng')
                ->modal('deleteModal')
                ->method('delete')
                ->icon('trash'),
             */
        ];
    }

    public function layout(): array
    {
        return [
        ];
    }
}
