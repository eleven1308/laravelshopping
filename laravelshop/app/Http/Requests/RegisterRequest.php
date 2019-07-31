<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:255',
            're-password' => 'required|same:password'
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Họ và tên không được bỏ trống',
            'name.min' => 'Họ và tên phải có tối thiểu 2 ký tự',
            'name.max' => 'Họ và tên tối đa có 255 ký tự',
            'email.required' => 'Địa chỉ email không được bỏ trống',
            'email.email' => 'Địa chỉ email nhập không đúng định dạng',
            'email.unique' => 'Đã tồn tại địa chỉ email trong hệ thống',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa có 255 ký tự',
            're-password.required' => 'Chưa nhập mật khẩu nhập lại',
            're-password.same' => 'Mật khẩu nhập lại không đúng'
        ];

    }
}
