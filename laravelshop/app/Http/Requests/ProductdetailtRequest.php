<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductdetailtRequest extends FormRequest
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
          'color_id' => 'required',
        ];
    }

    public function messages() 
    {
        return [
          'color_id.required' => 'Bạn chưa chọn màu sắc cho sản phẩm',
         
        ];

    }
}
