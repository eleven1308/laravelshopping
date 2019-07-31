<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducttypeRequest extends FormRequest
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
          'name' => 'required|min:3|max:200|unique:producttype,name',
          'images' => 'required',
          'status' => 'required',
          'category_id' => 'required'
        ];
    }

    public function messages() 
    {
        return [
          'name.required' => 'Bạn chưa nhập tên danh mục',
          'name.min' => 'Tên danh mục phải ít nhất phải chứa 2 kí tự',
          'name.max' => 'Tên danh mục tối đa 200 kí tự',
          'name.unique' => 'Tên danh mục đã bị trùng',
          'images.required' => 'Bạn chưa chọn ảnh',
          'status.required' => 'Bạn chưa chọn trạng thái cho danh mục',
          'category_id.required' => 'Bạn chưa chọn thể loại'
        ];

    }
}
