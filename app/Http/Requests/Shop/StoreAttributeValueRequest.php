<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\AttributeValue;

class StoreAttributeValueRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::user()->id == 1;
    }

    //ngừng xác thực tất cả các thuộc tính sau khi một lỗi xác thực xảy ra.
    protected $stopOnFirstFailure = true;

    public function rules()
    {

        return [

            'attributeValue.product_id'          => ['nullable'], 

            'attributeValue.attribute_id'          => ['nullable'], 

            'attributeValue.value'          => ['nullable'], 


        ];
    }

   // public function messages()
   // {
   //     return [
   //         //
   //     ];
   // }
}
