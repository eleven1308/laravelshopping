<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:product,name',
            'title' => 'required|min:2|max:255',
            'description' => 'required|min:2',
            'trademark' => 'required|min:2|max:255',
            'util_price' => 'required|numeric',
            'promotion_price' => 'required|numeric',
            'category_id' => 'required',
            'is_hot' => 'required',
            'producttype_id' => 'required',
            'images' => 'required',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 2 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'numeric' => ':attribute phải là một số ',
            'image' => ':attribute không là hình ảnh',
            'unique' => ':attributes đã tồn tại'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên sản phẩm',
            'title' => 'Tiêu đề tả sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'trademark' => 'Xuất xứ sản phẩm',
            'util_price' => 'Giá sản phẩm',
            'promotion_price' => 'Giá khuyến mại sản phẩm',
            'category_id' => 'Thể loại sản phẩm',
            'producttype_id' => 'Danh mục sản phẩm',
            'images' => 'Hỉnh ảnh mô tả',
            'is_hot' => 'Sản phẩm hot',
        ];
    }
}
