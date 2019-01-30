<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserAdd extends FormRequest
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
            'name' => 'required|unique:user|regex:/\w{6,16}/',
            'password' => 'required|regex:/\w{6,12}/',
            'repassword' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已被使用',
            'name.regex' => '用户名格式不正确',
            'password.required' =>'密码不能为空',
            'password.regex' => '密码格式不正确',
            'repassword.same' =>'两次输入密码不一致'
        ];
    }
}
