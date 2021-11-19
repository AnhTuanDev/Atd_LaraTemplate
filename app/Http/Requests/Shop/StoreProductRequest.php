<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\Product;

class StoreProductRequest extends FormRequest
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
        
        $id = Product::where('name', $name)->first()->id ?? null;

        return [

            'name'                       => ['required', Rule::unique('products', 'name')->ignore($id)], 
            'slug'                       => [Rule::unique('products', 'name')->ignore($id)], 
            'product.category_id'        => ['required'], 
            'product.description'        => ['required'], 
            'product.meta_description'   => ['required'], 

            'product.meta_keywords'      => ['nullable'], 
            'product.sku'                => ['nullable'], 

            'product.price'              => ['required'], 
            'product.quantity'           => ['required'],
            'product.stock'              => ['required'], 
            'product.status'             => ['required'], 
            'product.cover_image'        => ['required'], 

            'product.discount'           => ['nullable'], 
            'product.photos'             => ['nullable'], 
            'product.featured'           => ['nullable'],
            'product.home_banner'        => ['nullable'],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường Tên sản phẩm: Đang trống.', 
            'name.unique'   => 'Tên sản phẩm: Đã tồn tại', 
            'slug.unique'   => 'Tên sản phẩm: Đã tồn tại', 
            'product.category_id.required' => 'Chửa chọn danh mục', 
            'product.description.required' => 'Trường mô tả sản phẩm: đang trống', 
            'product.meta_description.required' => 'Trường seo Meta description: đang trống', 
            //'product.meta_keywords.required' => 'Trường seo Meta keywords: đang trống', 
            //'product.sku.required' => 'Trường mã sku: đang trống', 
            'product.price.required' => 'Trường gía: đang trống', 
            'product.quantity.required' => 'Trường số lượng: đang trống', 
            'product.stock.required' => 'Trường số lượng trong kho: đang trống', 
            'product.status.required' => 'Trường trạng thái: đang trống', 
            //'product.discount.required' => 'Trường giá giảm: đang trống', 
            'product.cover_image.required' => 'Trường hình cover: đang trống', 
            //'product.photos             .required' => 'Trường hình ảnh sản phẩm: đang trống', 
        ];
    }
}
