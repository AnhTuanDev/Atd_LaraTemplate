<?php

namespace App\Orchid\Screens\Shop\Category;


use App\Orchid\Layouts\Shop\Category\CategoryDeleteModalLayout;
use App\Orchid\Layouts\Shop\Category\CategoryEditLayout;

use App\Http\Requests\Shop\StoreCategoryRequest;

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

use App\Models\Shop\Category;

use Orchid\Screen\Action;
use Orchid\Support\Color;

class CategoryEditScreen extends Screen
{

    public $name = 'Danh Mục Mới';

    public $category = [];

    public $categoryName = '';

    public function query(Category $category): array
    {

        $this->exists = $category->exists;

        if($this->exists)
        {

            //Thay đổi trường name của trang.
            $this->name = 'Chỉnh sửa danh mục';

            //Gán giá trị cho $category
            $this->category = $category;

            //Gán gía trị cho $categoryName.
            $this->categoryName = $category->name;

        }

        return [

            'category' => $this->category,
            'name' => $this->categoryName,

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

                CategoryEditLayout::class,

            ]),

            //Modal delete
            Layout::modal('deleteModal', [

                CategoryDeleteModalLayout::class,

            ])->async('asyncGetDeletePost') 
              ->applyButton('Xóa') 
              ->title('Xác nhận xóa'),

        ]; //End return
    }

    //Function Create Or Update.
    public function createOrUpdate(Category $category, StoreCategoryRequest $request) {

        $data = $request->validated();
        
        //ddd($data);

        $categoryData = $data['category'];

        $categoryData = array_merge($categoryData, [

                'name' => $data['name'],
                'slug' => $data['slug'],
        ]);

        //ddd($categoryData);
        
        $category->fill($categoryData)->save();

        Toast::info('Lưu thành công: ' . $categoryData['name']);

        return redirect()->route('admin.category.list');

    }//End createOrUpdate.

    public function delete(Category $category)
    {
        $category->delete();

        Toast::info('Xóa thành công: ' . $category['name']);

        return redirect()->route('admin.category.list');
    }

}
