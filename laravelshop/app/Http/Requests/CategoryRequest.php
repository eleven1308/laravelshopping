<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
          'name' => 'required|min:3|max:200|unique:category,name',
          'status' => 'required',
        ];
    }

    public function messages() 
    {
        return [
          'name.required' => 'Bạn chưa nhập tên danh mục',
          'name.min' => 'Tên danh mục phải ít nhất phải chứa 2 kí tự',
          'name.max' => 'Tên danh mục tối đa 200 kí tự',
          'name.unique' => 'Tên danh mục đã bị trùng',
        ];

    }
}
