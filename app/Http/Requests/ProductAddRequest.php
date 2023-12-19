<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255|min:3',
            'price' => 'required',
            'category_id' => 'required',
            'detail' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không để trống',
            'name.unique' => 'Tên không để trùng',
            'name.max' => 'Tên không điền quán 255 ký tự',
            'name.min' => 'Tên không điền dưới 10 ký tự',
            'price.required'  => 'Số tiền không để trống',
            'category_id.required'  => 'Danh mục không để trống',
            'detail.required'  => 'Mô tả chi tết không để trống'
        ];
    }
}
