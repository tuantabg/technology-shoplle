<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'image_path' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không để trống',
            'name.unique' => 'Tên không để trùng',
            'name.max' => 'Tên không điền quán 255 ký tự',
            'name.min' => 'Tên không điền dưới 10 ký tự',
            'image_path.image' => 'Loại tệp được tải lên phải là hình ảnh.',
            'image_path.uploaded' => 'Không tải được hình ảnh lên. Kích thước tối đa của hình ảnh là 2MB.',
        ];
    }
}
