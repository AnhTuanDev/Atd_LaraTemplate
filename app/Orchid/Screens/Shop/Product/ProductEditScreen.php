<?php

namespace App\Orchid\Screens\Shop\Product;

use App\Orchid\Layouts\Shop\Product\ProducEditContentLayout;
use App\Orchid\Layouts\Shop\Product\ProductEditOptionLayout;
use App\Orchid\Layouts\Shop\Product\ProductEditMetaLayout;
use App\Orchid\Layouts\Shop\Product\ProductEditCoverLayout;
use App\Orchid\Layouts\Shop\Product\ProductEditPhotosLayout;
use App\Orchid\Layouts\Shop\Product\ProductEditDataLayout;
use App\Orchid\Layouts\Shop\Product\ProductDeleteModalLayout;

use App\Http\Requests\Shop\StoreProductRequest;

use App\Orchid\Atd\Support\Facades\AtdLayout;
//use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;

use Illuminate\Validation\Rule;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\Product;
use App\Models\Shop\Category;
use App\Models\Shop\Tag;

//use Orchid\Attachment\File;
use Orchid\Screen\Screen;
use Orchid\Screen\Action;
use Orchid\Support\Color;

class ProductEditScreen extends Screen
{

    //Tiêu đề của trang product.
    public $name = 'Sản Phẩm Mới';

    public $tags = [];

    public $product = [];

    public $productName = '';

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

            //Gán gía trị cho $productTitle.
            $this->productName = $product->name;

        }

        return [

            'product' => $this->product,

            'name' => $this->productName,

            'tags' => $this->tags,

        ];
    }

    public function commandBar(): array
    {
        return [
            //Link::make('Danh Sách Sản Phẩm')->type(Color::DEFAULT())->icon('modules')->route('admin.product.list'),
            Button::make('Đăng')->type(Color::DARK())->icon('pencil')->method('createOrUpdate')->canSee(!$this->exists),
            Button::make('Cập nhật')->type(Color::DARK())->icon('note')->method('createOrUpdate')->canSee($this->exists),

            ModalToggle::make('Xóa Sản Phẩm')
                ->modal('deleteModal')
                ->method('delete')
                ->icon('trash')
                ->canSee($this->exists),
        ];
    }

    public function layout(): array
    {
        return [
            AtdLayout::columns([
                'col-md-8 body-content' => [
                    ProducEditContentLayout::class,
                    ProductEditMetaLayout::class,
                ],
                'col-md-4 right-content' => [
                    ProductEditOptionLayout::class,
                    ProductEditCoverLayout::class,
                    ProductEditPhotosLayout::class,
                    ProductEditDataLayout::class,
                ],
            ]),

            //Modal delete
            AtdLayout::modal('deleteModal', [
                ProductDeleteModalLayout::class,
            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ]; //End return
    }//End Layout.

    //Function Create Or Update.
    public function createOrUpdate(Product $product, StoreProductRequest $request) {
        //ddd($request->all());
        $data = $request->validated();
        //ddd($data['cover_image']);

        $productData = $data['product'];

        $productData['cover_image'] = $productData['cover_image'][0];

        $productData['price'] = Str::slug($productData['price'], '');

        $productData['discount'] = Str::slug($productData['discount'], '');

        if($productData['discount'] == null) {
            $productData['discount'] = 0;
        }

        $productData = array_merge($productData, [
                'name' => $data['name'],
                'slug' => $data['slug'],
        ]);

        //ddd($productData);
        
        $product->fill($productData)->save();

        //Attach vao table database attachment de dong bo voi post
        $product->attachment()->syncWithoutDetaching(
            $request->input('product.cover_image', [])
        );

        //Attach vao table database attachment de dong bo voi post
        $product->attachment()->syncWithoutDetaching(
            $request->input('product.photos', [])
        );

        //Dong bo post va tag
        if($request->get('tags'))
        {
            $product->tags()->sync($request->get('tags'));
        }

        Toast::info('Lưu thành công: ' . $productData['name']);

        return redirect()->route('admin.product.list');

    }//End createOrUpdate.

    public function delete(Product $product)
    {
        $product->delete();

        Toast::info('Xóa thành công: ' . $product['name']);

        return redirect()->route('admin.product.list');
    }
}







