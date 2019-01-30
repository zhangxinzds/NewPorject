<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GoodsAdd extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'company' =>'required',
            'pic' => 'required',
            'content' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请输入用户名',
            'price.required' => '请输入价格',
            'stock.required' => '请输入库存',
            'company.required' => '请输入厂家',
            'pic.required' => '请添加图片',
            'content.required' => '请添加内容',        
        ];
    }
}
