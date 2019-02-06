<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserEdit extends FormRequest
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
            'name' => 'required|regex:/\w{6,16}/',
            'tname' => 'required|regex:/\p{Han}/u',
            'address' => 'required',
            'email' =>'email',
            'phone' => 'regex:/1[3456789]\d{9}/'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.regex' => '用户名格式不正确',
            'tname.regex' => '请输入正确姓名',
            'tname.required' => '请填写姓名',
            'email' => '邮箱格式不正确',
            'phone.regex' => '手机号码格式不正确'
        ];
    }
}
