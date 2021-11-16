<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\Tag;

class StoreTagRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::user()->id == 1;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }

    //ngừng xác thực tất cả các thuộc tính sau khi một lỗi xác thực xảy ra.
    protected $stopOnFirstFailure = true;

    public function rules()
    {

        $name = $this->get('name');
        
        $id = Tag::where('name', $name)->first()->id ?? null;

        return [

            'name' => ['required', Rule::unique('tags', 'name')->ignore($id)], 
            'slug' => [Rule::unique('tags', 'name')->ignore($id)], 

        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Trường Tên sản phẩm: Đang trống.', 

            'name.unique'   => 'Tên sản phẩm: Đã tồn tại', 

            'slug.unique'   => 'Tên sản phẩm: Đã tồn tại', 

        ];
    }
}
