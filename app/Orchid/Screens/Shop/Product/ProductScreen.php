<?php

namespace App\Orchid\Screens\Shop\Product;

use Orchid\Screen\Screen;
use Orchid\Screen\Action;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
//use Orchid\Support\Facades\Layout;
use App\Orchid\Atd\Support\Facades\AtdLayout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
//use Orchid\Screen\Fields\Group;

use Orchid\Attachment\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Orchid\Support\Color;

use App\Orchid\Layouts\Shop\Product\ProducContentLayout;
use App\Orchid\Layouts\Shop\Product\ProductOptionLayout;

use App\Models\Shop\Product;
use App\Models\Shop\Category;
use App\Models\Shop\Tag;

class ProductScreen extends Screen
{

    //Tiêu đề của trang product.
    public $name = 'Sản Phẩm Mới';

    public $tags = [];

    public $product = [];

    public $exists = false;

    public function query(Product $product): array
    {

        $this->exists = $product->exists;

        if($this->exists)
        {

            //Thay đổi trường name của trang.
            $this->name = 'Chỉnh sửa Sản Phẩm';

            //Gán giá trị cho $product
            $this->product = $product;

            //Gán giá trị cho $tags
            $this->tags = $product->tags;

        }

        return [

            'product' => $this->product,

            'tags' => $this->tags,

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

            //Content layout use static funtion columns.
            //AtdLayout::columns([
            AtdLayout::columns([

                //Left content
                'col-md-8 body-content' => [
                    ProducContentLayout::class,
                ],

                //Right content
                'col-md-4 right-content' => [

                    ProductOptionLayout::class,

                    AtdLayout::accordion([
                    ]),
                ],

            ]),

            //Modal delete
            AtdLayout::modal('deleteModal', [
                //PostDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Delete') 
              ->title('Xác nhận xóa'),

        ]; //End return
    }
}
