<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ManagerAdd extends FormRequest
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
            'name'=>'required|regex:/\w{4,16}/',
            'password' => 'required|regex:/\w{6,12}/',
            'repassword' => 'same:password',
            'tname' => 'required|regex:/\p{Han}/u'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.regex' => '用户名格式不正确',
            'password.required'=>'请输入密码',
            'repassword.same'=>'输入密码不一致',
            'password.regex'=>'密码格式不正确',
            'tname.regex' => '请填写真实姓名',
            'tname.required' => '请填写姓名'
        ];
    }
}
