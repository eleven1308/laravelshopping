<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class SlideRequest extends FormRequest
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
          'name' => 'required|min:3|max:200',
          'images' => 'required',
          'title' => 'required',
          'price' => 'required',
          'description' => 'required'
        ];
    }

    public function messages() 
    {
        return [
          'name.required' => 'Bạn chưa nhập tên danh mục',
          'name.min' => 'Tên danh mục phải ít nhất phải chứa 2 kí tự',
          'name.max' => 'Tên danh mục tối đa 200 kí tự',
          'images.required' => 'Bạn chưa chọn ảnh',
          'title.required' => 'Bạn chưa nhập tiêu đề',
          'price.required' => 'Bạn chưa nhập  giá',
          'description.required' => 'Bạn chưa chọn mô tả cho danh mục',
        ];

    }
}
