<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shop\Color;

class StoreColorRequest extends FormRequest
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
        
        $id = Color::where('name', $name)->first()->id ?? null;

        return [

            'name'                       => ['required', Rule::unique('colors', 'name')->ignore($id)], 
            'slug'                       => [Rule::unique('colors', 'name')->ignore($id)], 
            'color.value'                => ['required'], 

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường Tên không được để trống',
            'color.value.required' => 'Trường Giá trị không được để trống',
        ];
    }
}
